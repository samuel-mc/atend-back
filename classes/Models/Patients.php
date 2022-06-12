<?php 
	class Patients extends Admin
	{
		
		function __construct()
		{
			parent::__construct();
		}

		public function NewPatient(Request $data)
		{
			$user = $this->Insert(self::TABLE_USERS,["name"=>$data->get("name"),"email"=>"patient@mail.com","password"=>"null","type"=>6,"status"=>1],"id");

			$dr = $this->GetByCondition(self::TABLE_DOCTORS,"name = '".$data->get("doctor")."'");
			if ($dr==null){
				$user = $this->Insert(self::TABLE_USERS,["name"=>$data->get("doctor"),"email"=>"doctor@mail.com","password"=>"null","type"=>4,"status"=>1],"id");
				$dr = $this->Insert(self::TABLE_DOCTORS,["name"=>$data->get("doctor")],"id");
			}

			$data->put("user_id",$user['id']);
			$data->put("doctor_id",$dr['id']);
			$d = $data->extract(["user_id","client_id","name","diagnosis","birthdate","gender","weight","height","ailments","want_reanimation","care_plan","comments","allergies","medical_order","doctor_id","emergency_contact","emergency_phone","emergency_phone2"]);
			$insert = $this->Insert(self::TABLE_PATIENTS,$d,"id");


			$zc = $this->GetByCondition(self::TABLE_CAT_ZIPCODES,["zipcode",$data->get("zipcode")])['id'];
			$data->put("country_id", 1);
			$data->put("zipcode_id",$zc);
			$data->put("type",2);
			$data->put("related_id",$insert['id']);
			$add = $data->extract(["street","exterior","interior","suburb","zipcode_id","country_id","type","related_id"]);
			
			$fi = $this->Insert(self::TABLE_ADDRESSES,$add,"id");

			return $this->success($insert);
		}

		public function UpdatePatient(Request $data)
		{
			$d = $data->extract(["user_id","client_id","name","diagnosis","birthdate","gender","weight","height","ailments","want_reanimation","care_plan","comments","allergies","medical_order","doctor_id","emergency_contact","emergency_phone","emergency_phone2"]);
			$update = $this->Save(self::TABLE_PATIENTS,$d,$data->id);
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
			$pat['doctor'] = $this->getById(self::TABLE_DOCTORS,$pat['doctor_id']);
			$pat['services'] = $this->ViewList(self::TABLE_SERVICES,"patient_id IN (".$pat['id'].")");
			
			foreach ($pat['services'] as $key => $value) {
				$pat['services'][$key]['provider'] = $this->getById(self::TABLE_PROVIDERS, $value['id']);
				if($pat['services'][$key]['service_type'] != null) {
					$pat['services'][$key]['service_type'] = $this->getById(self::TABLE_CAT_SERVICE_TYPES, $pat['services'][$key]['service_type']);
				}
				$pat['services'][$key]['duration'] = $this->getById(self::TABLE_CAT_SERVICE_DURATIONS, $pat['services'][$key]['duration']);
				$pat['services'][$key]['costs'] = $this->GetByCondition(self::TABLE_SERVICE_COSTS, "service_id = " . $pat['services'][$key]['id']);

			}


			if ($pat['ailments']){
				$pat['ailments'] = $this->ViewList(self::TABLE_CAT_AILMENTS,"id IN ".$pat['ailments']); 
			}
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
