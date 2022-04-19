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
				// $row['service'] = $this->GetById(self::TABLE_SERVICES,$row['service_id']);
				$row['provider'] = $this->GetById(self::TABLE_PROVIDERS,$row['provider_id']);
				$row['cost'] = $this->GetByCondition(self::TABLE_SERVICE_COSTS,["service_id",$row['id']],"id DESC");
				$res[] = $row;
			}
			return $res;
		}
	}

?>