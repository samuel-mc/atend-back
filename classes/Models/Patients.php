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

		public function Read(Request $data)
		{
			return $this->success($this->GetById(self::TABLE_PATIENTS,$data->id));
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
