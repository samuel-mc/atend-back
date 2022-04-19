<?php

class Deliveries extends Admin
{

	public $logModel;
	public $commModel;
	public $dhlModel;

	function __construct()
	{
		parent::__construct();
		$this->logModel = new Log;
		$this->commModel = new Communication;
		$this->dhlModel = new DHL($this);
	}



	public function Create(Request $data)
	{
		//$this->logModel->Create(new Request(["type"=>1,"description"=>"peticion para crear pedido","data"=>json_encode($data->obj)]));
		session_start();
		$data->put("user_id",$_SESSION['user']['id']);

		if ($data->get("u_id") != null) {
			$d_p = $data->extract(["u_id", "name", "address","address_reference","address_reference_int","address_place","address_municipality","address_suburb","address_townhall", "city", "state_code", "postal_code", "country_code", "email", "phone"]);
			
			//if ($data->get("patient_id") == 0) {
				$patient = $this->Insert(self::TABLE_PATIENTS, $d_p, "id");
				$data->put("patient_id", $patient['id']);
			//}else{
			//	$patient = $this->Save(self::TABLE_PATIENTS, $d_p, $data->get("patient_id"));
			//}

			$data->put("token",uniqid());
			
			$d = $data->extract(["patient_id", "folio", "schedule", "date", "token","user_id"]);
			$d['timestamp'] = "CURRENT_TIMESTAMP()";
			
			$insert = $this->Insert(self::TABLE_DELIVERIES, $d, "id");

			$delivery_id = $insert['id'];
			$this->Insert(self::TABLE_DELIVERY_STATUS, ["delivery_id" => $delivery_id, "status" => 1, "timestamp" => "CURRENT_TIMESTAMP()"]);
			
			$auths = json_encode($data->get("auths"));
			$insert['auths'] = json_decode($auths);

			foreach ($insert['auths'] as $au) {
				$this->Insert(self::TABLE_AUTH_USERS, [
					"delivery_id" => $delivery_id,
					"name" => $au->name,
					"phone" => $au->phone,
				]);
			}

			$drs = json_encode($data->get("drugs"));
			$insert['drugs'] = json_decode($drs);

			foreach ($insert['drugs'] as $dr) {
				$da = ["delivery_id" => $delivery_id, "drug_id" => $dr->id, "quantity" => $dr->quantity];
				$insert = $this->Insert(self::TABLE_DELIVERY_DRUGS, $da, "id");
				
				$insert_summary = $this->Insert(self::TABLE_SUMMARY_LOG,[
					"date" => "CURRENT_TIMESTAMP()",
					"quantity" => $dr->quantity,
					"type" => 2,
					"user_id" => 1,
					"drug_id" => $dr->id,
					"delivery_id" => $delivery_id
				]);

				$select = $this->query->select("*",self::TABLE_SUMMARY,"drug_id = ".$dr->id);
				$current =  $this->GetFirst($select);
				$q = $current['quantity']-$dr->quantity;;
				$update = $this->Save(self::TABLE_SUMMARY,["quantity"=>$q],["drug_id",$dr->id]);
			}

			return $this->success($this->GetDetails($delivery_id));
		} else {
			return $this->success(null);
		}

	}

	public function ChangeDate(Request $data)
	{
		$del = $this->GetById(self::TABLE_DELIVERIES, $data->get("delivery_id"));
		$date1 = strtotime($data->get("date")); 
		$date2 = strtotime($del['date']); 
		$days = abs($date1 - $date2)/60/60/24;
		if ($days<30){
			$u = $this->Save(self::TABLE_DELIVERIES, $data->extract(["date"]), $data->get("delivery_id"));
			$this->commModel->SendChangeDateInfoToPatient($data);
			$this->commModel->SendChangeDateSMSToPatient($data);
			return ["success"=>true];
		}else{
			return ["success"=>false,"message"=>"No puedes solicitar un cambio de fecha de más de 30 días, esta fecha dista ".$days." de la anterior"];
		}
	}



	public function Update(Request $data)
	{
		$d = $data->extract(["patient_id", "folio", "schedule", "date", "token"]);
		$update = $this->Save(self::TABLE_DELIVERIES, $d, $data->id);
		return $this->success($update);
	}



	public function SetStatus(Request $data)
	{
		$delivery_id = $data->get("delivery_id");
		$status = $data->get("status");
		$insert = $this->Insert(self::TABLE_DELIVERY_STATUS, ["delivery_id" => $delivery_id, "status" => $status, "timestamp" => "CURRENT_TIMESTAMP()"]);
		$update = $this->Save(self::TABLE_DELIVERIES, ["status" => $status], $delivery_id);
		return $this->success($insert);
	}



	public function GetAllStatus(Request $req)

	{

		$delivery_id = $req->get("delivery_id");

		$sel_st = $this->query->select("*", self::TABLE_DELIVERY_STATUS, "delivery_id = " . $delivery_id, "status ASC");

		return $this->success($this->GetAllRows($sel_st));

	}



	public function GetDetails($delivery_id)

	{
		if (is_a($delivery_id, "Request")){
			$delivery_id = $delivery_id->get('delivery_id');
		}
		
		$del = $this->GetById(self::TABLE_DELIVERIES, $delivery_id);
		$sel_dr = $this->query->select("*", self::TABLE_DELIVERY_DRUGS, "delivery_id = " . $delivery_id);
		$drugs = array();
		foreach ($this->GetAllRows($sel_dr) as $dr) {
			$d = $this->GetById(self::TABLE_DRUGS, $dr['drug_id']);
			$d['name'] = $this->GetById(self::TABLE_DRUG_NAMES, $d['name_id']);
			$d['concentration'] = $this->GetById(self::TABLE_DRUG_CONCENTRATION, $d['concentration_id']);
			$d['summary'] = $this->GetById(self::TABLE_SUMMARY, $dr['drug_id']);
			$d['quantity'] = $dr['quantity'];
			$drugs[] = $d;
		}

		$sel_auth =  $this->query->select("*", self::TABLE_AUTH_USERS, "delivery_id = " . $delivery_id);
		$del['auth_user'] = $this->GetAllRows($sel_auth);
		$sel_docs =  $this->query->select("*", self::TABLE_DOCUMENTS, "delivery_id = " . $delivery_id,"type");
		$del['documents'] = $this->GetAllRows($sel_docs);
		$sel_estatus =  $this->query->select("*", self::TABLE_DELIVERY_STATUS, "delivery_id = " . $delivery_id);
		$del['status'] = $this->GetAllRows($sel_estatus);
		$del['drugs'] = $drugs;
		$del['patient'] = $this->GetById(self::TABLE_PATIENTS, $del['patient_id']);
		return $this->success($del);
	}



	public function ListDetails(Request $data)
	{
		$filter = "status != 6 AND status != 5 AND status!=4";
		if ($data->get("type")=="all"){
			$filter = "true";
		}
		if ($data->get("type")=="history"){
			$filter = "patient_id = ".$data->get("user_id");
		}
		if ($data->get("filter")){
			$f = $data->get("filter");
			$type = $f['type'];
			if ($type=='date'){
				$filter .= " AND date BETWEEN '".$f['dateStart']."' AND '".$f['dateEnd']."'";
			}
		}
		$list =  $this->ViewList(self::TABLE_DELIVERIES, $filter, "id DESC");
		$res = array();
		foreach ($list as $del) {
			$sel_dr = $this->query->select("*", self::TABLE_DELIVERY_DRUGS, "delivery_id = " . $del['id']);
			$sel_docs = $this->query->select("*", self::TABLE_DOCUMENTS, "delivery_id = " . $del['id']);
			$sel_auth =  $this->query->select("*", self::TABLE_AUTH_USERS, "delivery_id = " . $del['id']);
			$sel_problems =  $this->query->select("*", self::TABLE_PROBLEMS, "delivery_id = " . $del['id']." AND status = 1");
			$del['patient'] = $this->GetById(self::TABLE_PATIENTS, $del['patient_id']);
			$del['documents'] = $this->GetAllRows($sel_docs);
			$del['auth_users'] = $this->GetAllRows($sel_auth);
			$del['problems'] = $this->GetAllRows($sel_problems);
			$drugs = array();

			foreach ($this->GetAllRows($sel_dr) as $dr) {
				$d = $this->GetById(self::TABLE_DRUGS, $dr['drug_id']);
				$d['name'] = $this->GetById(self::TABLE_DRUG_NAMES, $d['name_id'])['name'];
				$d['concentration'] = $this->GetById(self::TABLE_DRUG_CONCENTRATION, $d['concentration_id'])['name'];
				$d['quantity'] = $dr['quantity'];
				$drugs[] = $d;

			}
			$del['drugs'] = $drugs;
			$res[] = $del;

		}
		return $res;
	}



	public function List()
	{
		return $this->success($this->ViewList(self::TABLE_DELIVERIES,"status"));
	}



	public function Delete(Request $data)

	{

		$update = $this->Save(self::TABLE_DELIVERIES, ["status" => 6], $data->id);
		//$this->commModel->SendCancelSMSToPatient(new Request(["delivery_id"=>$data]));
		$update = $this->commModel->SendCancelToPatient(new Request(["delivery_id"=>$data->id]));
		
		$delivery_drugs = $this->query->select("*", self::TABLE_DELIVERY_DRUGS, "delivery_id = ".$data->id);
		foreach ($this->GetAllRows($delivery_drugs) as $delivery_drug) {
			$insert_summary = $this->Insert(self::TABLE_SUMMARY_LOG,[
				"date" => "CURRENT_TIMESTAMP()",
				"quantity" => $delivery_drug['quantity'],
				"type" => 1,
				"user_id" => 1,
				"drug_id" => $delivery_drug['drug_id']

			]);
			$select = $this->query->select("*",self::TABLE_SUMMARY,"drug_id = ".$delivery_drug['drug_id']);
			$current =  $this->GetFirst($select);
			$q = $current['quantity']+$delivery_drug['quantity'];
			$update = $this->Save(self::TABLE_SUMMARY,["quantity"=>$q],["drug_id",$delivery_drug['drug_id']]);
		}
		return $this->success($update);

	}


	public function GetDate(Request $data)
	{
		$del = $this->GetById(self::TABLE_DELIVERIES, $data->id);
		return $del['date'];
	}


	public function UploadEvidence(Request $req)

	{

		$d = $req->extract(["delivery_id", "name", "url"]);
		if ($this->GetFirst("SELECT * FROM ".self::TABLE_DOCUMENTS." where delivery_id = ".$req->get("delivery_id")." AND url = '".$req->get("url")."'")==null){
			$d['timestamp'] = "CURRENT_TIMESTAMP()";
			$d['type'] = 8;
			$insert = $this->Insert(self::TABLE_DOCUMENTS, $d, "id");
			$update_delivery = $this->Save(self::TABLE_DELIVERIES,["status"=>2],$req->get("delivery_id"));
			return $this->success($insert);
		}

		return $this->success(null);	

	}



	public function UploadDocuments(Request $req)
	{
		$d = $req->extract(["delivery_id", "type", "name", "url"]);
		$insert = null;

		if ($this->GetFirst("SELECT * FROM ".self::TABLE_DOCUMENTS." where delivery_id = ".$req->get("delivery_id")." AND type = ".$req->get("type"))==null){
			$d['timestamp'] = "CURRENT_TIMESTAMP()";
			$insert = $this->Insert(self::TABLE_DOCUMENTS, $d, "id");
		}

		return $this->success($insert);	
	}



	public function GetURL(Request $req)
	{
		$delivery_id = $req->get("delivery_id");
		$s = $this->query->select("*", self::TABLE_DELIVERIES, "id = " . $delivery_id);
		$d = $this->GetFirst($s);
		$token = $d['token'];
		return $this->success($token);
	}



	public function GetDeliveryByURL(Request $req)
	{
		$url = $req->get("url");
		$s = $this->query->select("*", self::TABLE_DELIVERIES, "url = '" . $url . "'");
		$d = $this->GetFirst($s);
		return $this->success($d);
	}

}

