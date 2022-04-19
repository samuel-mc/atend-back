<?php  
	class Problems extends Admin
	{
		
		function __construct()
		{
			parent::__construct();
		}

		public function SaveProblem(Request $data)
		{
			session_start();
			$data->put("date","CURRENT_TIME()");
			$data->put("user_id",isset($_SESSION['user'])?$_SESSION['user']['id']:0);
			$data->put("status",1);
			$d = $data->extract(["delivery_id","description","date","user_id","status"]);
			$this->Insert(self::TABLE_PROBLEMS,$d);
		}

		public function GetDeliveryProblems(Request $data)
		{
			return $this->ViewList(self::TABLE_PROBLEMS,"delivery_id = ".$data->get("delivery_id")." AND status = 1");
		}

		public function DeleteProblem(Request $data)
		{
			$this->Save(self::TABLE_PROBLEMS,["status"=>2],$data->id);
		}
	}

?>