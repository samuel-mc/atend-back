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

		public function GetClientBalance(Request $request)
		{
			$balance = $this->ViewList(self::TABLE_CLIENT_BALANCE,"client_id = ".$request->get("client_id"));
			$total = 0;
			foreach ($balance as $bal) {
				$total += $bal['amount'];
			}
			return ["amount"=>$total];
		}

		public function GetPaymentMethods()
		{
			$res = array();
			$methods = $this->ViewList(self::TABLE_CAT_PAYMENT_METHODS);
			foreach ($methods as $method) {
				$res[] = $method;
			}
			return $res;
		}
	}
?>