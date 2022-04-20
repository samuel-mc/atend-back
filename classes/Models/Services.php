<?php 
	class Services extends Admin
	{		
		function __construct()
		{
			parent::__construct();
		}

		public function GetTable()
		{
			$services = $this->ViewList(self::TABLE_SERVICES);
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
	}

?>