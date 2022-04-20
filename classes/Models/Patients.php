<?php 
	class Patients extends Admin
	{
		
		function __construct()
		{
			parent::__construct();
		}

		public function Create(Request $data)
		{
			$d = $data->extract(["name","diagnosis","birthdate","gender","weight","height","ailments","want_reanimation","care_plan","comments","allergies","medical_order","doctor_id","emergency_contact","emergency_phone","emergency_phone2"]);
			$insert = $this->Insert(self::TABLE_PATIENTS,$d,"id");
			return $this->success($insert);
		}

		public function GetPatientById(Request $data)
		{
			$pat = $this->GetById(self::TABLE_PATIENTS,$data->id);
			$pat['address'] = $this->getByCondition(self::TABLE_ADDRESSES,"related_id = ".$data->id." AND type = 2 AND status = 1");
			if ($pat['address']!=null){
				$pat['address']['zipcode'] = $this->getById(self::TABLE_CAT_ZIPCODES,$pat["address"]['zipcode_id']);
				$pat['address']['state'] = $this->getById(self::TABLE_CAT_STATES,$pat["address"]['zipcode']['state_id']);
				$pat['address']['municipality'] = $this->getById(self::TABLE_CAT_MUNICIPALITIES,$pat["address"]['zipcode']['municipality_id']);
			}
			$pat['doctor'] = $this->getById(self::TABLE_USERS,$pat['doctor_id']);
			$pat['ailments'] = $this->ViewList(self::TABLE_CAT_AILMENTS,"id IN ".$pat['ailments']);
			return $pat;
		}

		public function List()
		{
			return $this->success($this->ViewList(self::TABLE_PATIENTS));
		}

		public function Delete(Request $data)
		{
			$delete = $this->Save(self::TABLE_PATIENTS,[
				"status"=>3
			],$data->id);
			return $this->success($delete);
		}
	}

?>
