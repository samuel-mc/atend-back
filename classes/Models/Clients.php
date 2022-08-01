<?php 

	/**
	 * 
	 */
	class Clients extends Admin
	{
		
		function __construct()
		{
			parent::__construct();
		}

		public function GetClientById(Request $request)
		{
			$cl = $this->GetById(self::TABLE_CLIENTS,$request->id);
			return $cl;
		}

		public function List()
		{
			$res = [];
			$cls = $this->ViewList(self::TABLE_CLIENTS);
			foreach ($cls as $cl) {
				$pats = [];
				$cl['patients'] = $this->ViewList(self::TABLE_PATIENTS,"client_id = ".$cl['id']);
				foreach ($cl['patients'] as $pat) {
					$pat['balance'] = $this->GetByCondition(self::TABLE_CLIENT_BALANCE,"client_id = ".$cl['id']." AND patient_id = ".$pat['id']);
					$pats[] = $pat;
				}
				$cl['patients'] = $pats;
				$res[] = $cl;
			}
			return $res;
		}

		public function NewClient(Request $data)
		{
			$fullname = $data->get("name")." ".$data->get("lastname");
			$user = $this->Insert(self::TABLE_USERS,["name"=>$fullname,"email"=>$data->get("email"),"password"=>md5("usuario"),"type"=>5,"status"=>1],"id");
			$data->put("user_id",$user['id']);
			$data->put("status",1);
			
			if ($data->get("comments")=="")
				$data->put("comments",null);
			$d = $data->extract(["user_id","type_id","name","lastname","phone","email","require_billing","comments","photo"]);
			$cl = $this->Insert(self::TABLE_CLIENTS,$d,"all");
			return $cl;
		}

		public function SaveClient(Request $data)
		{
			$d = $data->extract(["user_id","type_id","name","lastname","phone","email","require_billing","comments","photo"]);
			$this->Save(self::TABLE_CLIENTS,$d,$data->id);
		}

		public function NewBillingInfo(Request $data)
		{
			$data->put("status",1);
			$d = $data->extract(["bussines_name","billing_scheme_id","rfc","email","use_id","billing_regime_id","status"]);
			$finantial_info = $this->Insert(self::TABLE_FINANTIAL_INFORMATION,$d,"all");

			$zc = $this->GetByCondition(self::TABLE_CAT_ZIPCODES,["zipcode",$data->get("zipcode")])['id'];
			$data->put("country_id", 1);
			$data->put("zipcode_id",$zc);
			$data->put("type",3);
			$data->put("related_id",$finantial_info['id']);
			$add = $data->extract(["street","exterior","interior","suburb","zipcode_id","country_id","type","related_id"]);
			if($data->get("interior") != ""){
				$add['interior'] = $data->get("interior");
			}
			$fi = $this->Insert(self::TABLE_ADDRESSES,$add,"id");

			return $finantial_info;
		}

		public function SaveBillingInfo(Request $data)
		{
			$d = $data->extract(["bussines_name","billing_scheme_id","rfc","email","use_id","billing_regime_id","status"]);
			$this->Save(self::TABLE_FINANTIAL_INFORMATION,$d,$data->id);
			$zc = $this->GetByCondition(self::TABLE_CAT_ZIPCODES,["zipcode",$data->get("zipcode")])['id'];
			$data->put("country_id", 1);
			$data->put("zipcode_id",$zc);
			$data->put("type",3);
			$data->put("related_id",$data->id);
			$add = $data->extract(["street","exterior","interior","suburb","zipcode_id","country_id","type","related_id"]);
			$add_id =  $this->GetByCondition(self::TABLE_ADDRESSES,["related_id",$data->id])['id'];

			$this->Save(self::TABLE_ADDRESSES,$add,$add_id);
		}

		public function NewBillingReceives(Request $data)
		{
			$d = $data->extract(["start_period", "end_period", "emisor", "amount", "file_1", "file_2"]);
			$billing_receives = $this->Insert(self::TABLE_BILLING_RECEIVES,$d,"all");
			return $billing_receives;
		}
		
		public function GetBillingReceives()
		{
			$cl = $this->ViewList(self::TABLE_BILLING_RECEIVES);
			return $cl;
		}

		public function AddNewClientPayment(Request $data)
		{
			$data->put("status", 1);
			$d = $data->extract(["client_id", "patient_id", "date", "bank", "method_id", "amount", "comments", "status"]);
			$cl = $this->Insert(self::TABLE_CLIENT_PAYMENTS,$d,"all");
			$balance = $this->GetByCondition(self::TABLE_CLIENT_BALANCE,"client_id = ".$data->get("client_id")." AND patient_id = ".$data->get("patient_id"));
			if ($balance!=null){
				$up = $this->Save(self::TABLE_CLIENT_BALANCE,["amount"=>$balance['amount']+$data->get("amount")],$balance['id'],"all");
			}else{
				$up = $this->Insert(self::TABLE_CLIENT_BALANCE,["client_id"=>$data->get("client_id"),"patient_id"=>$data->get("patient_id"),"amount"=>$data->get("amount")],"all");
			}
			return $up;
		}

		public function SaveClientPayment(Request $data)
		{
			$d = $data->extract(["date", "bank","method_id","amount","comments"]);
			$pa = $this->GetById(self::TABLE_CLIENT_PAYMENTS,$data->id);
			$f = "client_id = ".$pa["client_id"]." AND patient_id = ".$pa["patient_id"];
			$balance = $this->GetByCondition(self::TABLE_CLIENT_BALANCE,$f);
			if ($balance!=null){
				$n = $balance['amount']-$pa['amount']+$data->get("amount");
				$this->Save(self::TABLE_CLIENT_BALANCE,["amount"=>$n],$balance['id']);
			}
			$this->Save(self::TABLE_CLIENT_PAYMENTS,$d,$data->id);
		}

		public function DeleteClientPayment(Request $data)
		{
			$pa = $this->GetById(self::TABLE_CLIENT_PAYMENTS,$data->id);
			$f = "client_id = ".$pa["client_id"]." AND patient_id = ".$pa["patient_id"];
			$balance = $this->GetByCondition(self::TABLE_CLIENT_BALANCE,$f);
			if ($balance!=null){
				$n = $balance['amount']-$pa['amount'];
				$this->Save(self::TABLE_CLIENT_BALANCE,["amount"=>$n],$balance['id']);
			}
			$this->Save(self::TABLE_CLIENT_PAYMENTS,["status"=>0], $data->id);
		}

		public function AddNewClientBalanceLog(Request $data) {
			$d = $data->extract(["client_id","patient_id","type","amount"]);
			$logBalance = $this->Insert(self::TABLE_CLIENT_BALANCE_LOG,$d,"all");
			return $logBalance;
		}
	}

?>