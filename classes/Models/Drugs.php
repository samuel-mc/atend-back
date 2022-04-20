<?php
class Drugs extends Admin
{

	function __construct()
	{
		parent::__construct();
	}

	public function Create(Request $data)
	{
		$d = $data->extract(["name_id", "lote", "concentration_id", "expiration_date"]);
		$insert = $this->Insert(self::TABLE_DRUGS, $d, "id");
		return $this->success($insert);
	}

	public function Read(Request $data)
	{
		return $this->success($this->GetById(self::TABLE_DRUGS, $data->id));
	}

	public function Update(Request $data)
	{
		$d = $data->extract(["name_id", "lote", "concentration_id", "expiration_date"]);
		$update = $this->Save(self::TABLE_DRUGS, $d, $data->id);
		return $this->success($update);
	}

	public function Delete(Request $data)
	{
		$delete = $this->Save(self::TABLE_DRUGS, [
			"status" => 3
		], $data->id);
		return $this->success($delete);
	}

	public function List()
	{
		$drugs = $this->ViewList(self::TABLE_DRUG_NAMES, 1,"name");
		return $this->success($drugs);
	}

	public function ListConcentrations()
	{
		$cons = $this->ViewList(self::TABLE_DRUG_CONCENTRATION,1,"name");
		return $this->success($cons);
	}

	public function GetDetails(Request $request)
	{
		$d = $this->GetById(self::TABLE_DRUGS, $request->id);
		$d['concentration'] = $this->GetById(self::TABLE_DRUG_CONCENTRATION, $d['concentration_id']);
		
		$d['name'] = $this->GetById(self::TABLE_DRUG_NAMES, $d['name_id']);
		return $this->success($d);
	}

	public function ListDetails(Request $data)
	{
		$drugs = $this->ViewList(self::TABLE_DRUGS);
		$res = array();
		foreach ($drugs as $d) {
			$d['concentration'] = $this->GetById(self::TABLE_DRUG_CONCENTRATION, $d['concentration_id']);
			//$d['summary'] = $this->summaryModel->GetByDrugId($d['id']);
			if ($data->get("existent")=="1"){
				/*if ($d['summary']['quantity']>0){
					$d['name'] = $this->GetById(self::TABLE_DRUG_NAMES, $d['name_id']);
					$res[] = $d;
				}*/
			}else{
				$d['name'] = $this->GetById(self::TABLE_DRUG_NAMES, $d['name_id']);
				$res[] = $d;
			}
		}
		return $this->success($res);
	}

	public function GetByLote(Request $data)
	{
		$select = $this->query->select("*", self::TABLE_DRUGS, "lote = '" . $data->get("lote") . "'");
		$current = $this->GetFirst($select);
		if ($current!=null)
			$current['quantity'] = $this->GetFirst($this->query->select("*",self::TABLE_SUMMARY,"drug_id = ".$current['id']))['quantity'];
		return $current;
	}

	public function GetConcentrations(Request $data)
	{
		$res = array();
		$s = $this->query->select("*", self::TABLE_DRUGS, "name_id = ".$data->get("name_id"));
		$drugs = $this->GetAllRows($s);
		foreach ($drugs as $c) {
			$s2 = $this->query->select("*", self::TABLE_SUMMARY, "drug_id = ".$c["id"]." AND quantity > 0");
			if ($this->GetFirst($s2)!=null){
				$con = $this->GetById(self::TABLE_DRUG_CONCENTRATION, $c['concentration_id']);
				if (!in_array($con, $res)) {
					$res[] = $con;
				}
			}
		}
		return $res;
	}

	public function GetLotes(Request $data)
	{
		$this->Insert(self::TABLE_LOG,["type"=>1,"description"=>"Listar Lotes","data"=>json_encode($data->obj)]);
		$s = $this->query->select("*", self::TABLE_DRUGS, "name_id = ".$data->get("name_id")." AND concentration_id = " . $data->get("concentration_id"));
		$res = $this->GetAllRows($s);
		$drugs = array();
		foreach ($res as $dr) {
			$s = $this->query->select("*", self::TABLE_SUMMARY, "drug_id = ".$dr["id"]." AND quantity > 0");
			$dr['quantity'] = $this->GetFirst($s);
			if ($dr['quantity']!=null){
				$dr['quantity'] = $dr['quantity']['quantity'];
				$drugs[] = $dr;
			}else{
				$dr['quantity'] = 0;
				$drugs[] = $dr;
			}
		}
		return $drugs;
	}

	public function GetQuantity(Request $data)
	{
		$s = $this->query->select("*", self::TABLE_SUMMARY, "drug_id = ".$data->get("drug_id")." AND quantity > 0");
		$drugs = $this->GetAllRows($s);
		return $drugs;
	}
}
