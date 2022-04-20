<?php  

	/**
	 * 
	 */
	class Payments extends Admin
	{
		
		function __construct()
		{
			parent::__construct();
		}

		public function GetByClient(Request $request)
		{
			$res = array();
			$payments = $this->ViewList(self::TABLE_CLIENT_PAYMENTS,"client_id = ".$request->get("client_id"));
			foreach ($payments as $pay) {
				$pay['patient'] = $this->getById(self::TABLE_PATIENTS,$pay['patient_id']);
				$pay['method'] = $this->getById(self::TABLE_CAT_PAYMENT_METHODS,$pay['method_id'])['name'];
				$res[] = $pay;
			}
			return $res;
		}

		public function GetByPatient(Request $request)
		{
			$res = array();
			$payments = $this->ViewList(self::TABLE_CLIENT_PAYMENTS,"patient_id = ".$request->get("patient_id"));
			foreach ($payments as $pay) {
				$pay['method'] = $this->getById(self::TABLE_CAT_PAYMENT_METHODS,$pay['method_id'])['name'];
				$res[] = $pay;
			}
			return $res;
		}

		public function GetPatientBalance(Request $request)
		{
			$balance = $this->GetByCondition(self::TABLE_CLIENT_BALANCE,"patient_id = ".$request->get("patient_id"));
			return $balance;
		}
	}

?>