<?php 
	class Services extends Admin
	{		
		function __construct()
		{
			parent::__construct();
		}
		//frequency: "0"
		
		public function SaveService(Request $data)
		{
			$user_id = 1;
			$data->put("status",1);
			$d = $data->extract(["client_id","patient_id","service_type","provider_id","service_status","duration","schedule","insurance","complexion_id","care_type_id","provider_gender","status"]);			

			$ds = array();
			if ($data->get("frequency")!=3){
				$i = 1;
				foreach ($data->get("frequency_days") as $day) {
					$days = ["","monday","tuesday","wednesday","thursday","friday","saturday","sunday"];
					$date = new DateTime($data->get("start_date"));
					while ($date <= new DateTime($data->get("end_date"))) {
						$date->modify('next '.$days[$day]);
						if ($date <= new DateTime($data->get("end_date"))){
							$ds[]=$date->format('Y-m-d');
							$i++;
						}
					}
				}
			}else{
				$ds[] = $data->get("start_date");
			}

			foreach ($ds as $date) {
				$d['date'] = $date;
				$service = $this->Insert(self::TABLE_SERVICES,$d,"all");
				$service_id = $service['id'];
				$days = null;
				if ($data->get("frequency_days")) $days = "(".implode(",", $data->get("frequency_days")).")";
				$dt = ["service_id"=>$service_id,"start_date"=>$data->get("start_date"),"frequency_id"=>$data->get("frequency"),"days"=>$days];
				if ($data->get("frequency")!=3) $dt["end_date"]=$data->get("end_date");
				$this->Insert(self::TABLE_SERVICE_FREQUENCY,$dt);
				$this->Insert(self::TABLE_SERVICE_COSTS,[
					"service_id"=>$service_id,
					"cost"=>$data->get("cost"),
					"eca_cost"=>$data->get("eca_cost"),
					"extra_cost"=>0,
					"timestamp"=>"CURRENT_TIMESTAMP()",
					"user_id"=>$user_id
				]);
			}
			return $ds;
		}

		public function GetTable()
		{
			$services = $this->ViewList(self::TABLE_SERVICES,"true","date desc");
			$res = array();
			foreach ($services as $row) {
				$row['client'] = $this->GetById(self::TABLE_CLIENTS,$row['client_id']);
				$row['patient'] = $this->GetById(self::TABLE_PATIENTS,$row['patient_id']);
				$row['service'] = $this->GetById(self::TABLE_CAT_SERVICE_TYPES,$row['service_type']);
				$row['duration'] = $this->GetById(self::TABLE_CAT_SERVICE_DURATIONS,$row['duration'])['name'];
				$row['provider'] = $this->GetById(self::TABLE_PROVIDERS,$row['provider_id']);
				$row['cost'] = $this->GetByCondition(self::TABLE_SERVICE_COSTS,["service_id",$row['id']],"id DESC");
				$res[] = $row;
			}
			return $res;
		}

		public function GetByClientId(Request $request)
		{
			$services = $this->ViewList(self::TABLE_SERVICES,"client_id = ".$request->get("client_id"));
			$res = array();
			foreach ($services as $row) {
				$row['client'] = $this->GetById(self::TABLE_CLIENTS,$row['client_id']);
				$row['patient'] = $this->GetById(self::TABLE_PATIENTS,$row['patient_id']);
				$row['status'] = $this->GetById(self::TABLE_CAT_STATUS,$row['status']);
				$row['provider'] = $this->GetById(self::TABLE_PROVIDERS,$row['provider_id']);
				$row['cost'] = $this->GetByCondition(self::TABLE_SERVICE_COSTS,["service_id",$row['id']],"id DESC");
				$row['service'] = $this->GetById(self::TABLE_CAT_SERVICE_TYPES,$row['service_type']);
				$row['duration'] = $this->GetById(self::TABLE_CAT_SERVICE_DURATIONS,$row['duration'])['name'];
				$res[] = $row;
			}
			return $res;
		}

		public function GetByPatientId(Request $request)
		{
			$services = $this->ViewList(self::TABLE_SERVICES,"patient_id = ".$request->get("patient_id"));
			$res = array();
			foreach ($services as $row) {
				$row['client'] = $this->GetById(self::TABLE_CLIENTS,$row['client_id']);
				$row['patient'] = $this->GetById(self::TABLE_PATIENTS,$row['patient_id']);
				$row['status'] = $this->GetById(self::TABLE_CAT_STATUS,$row['status']);
				$row['provider'] = $this->GetById(self::TABLE_PROVIDERS,$row['provider_id']);
				$row['cost'] = $this->GetByCondition(self::TABLE_SERVICE_COSTS,["service_id",$row['id']],"id DESC");
				$row['service'] = $this->GetById(self::TABLE_CAT_SERVICE_TYPES,$row['service_type']);
				$row['duration'] = $this->GetById(self::TABLE_CAT_SERVICE_DURATIONS,$row['duration'])['name'];
				$row['frequency'] = $this->GetByCondition(self::TABLE_SERVICE_FREQUENCY,["service_id",$row['id']]);
				$row['frequency']['frequency'] = $this->GetById(self::TABLE_CAT_SERVICE_FREQUENCIES,$row['frequency']['frequency_id'])['name'];
				$res[] = $row;
			}
			return $res;
		}

		public function GetServiceTypes()
		{
			return $this->ViewList(self::TABLE_CAT_SERVICE_TYPES);
		}

		public function GetServiceStatus()
		{
			return $this->ViewList(self::TABLE_CAT_STATUS);
		}

		public function SaveCosts(Request $data)
		{	
			$d = $data->extract(["cost","eca_cost","extra_cost","reason"]);
			return $this->Save(self::TABLE_SERVICE_COSTS,$d,$data->id);
		}
		
		public function SaveProvider(Request $data)
		{	
			$d = $data->extract(["provider_id"]);
			return $this->Save(self::TABLE_SERVICES,$d,$data->id);
		}
	}

?>