<?php 
	class Log extends Admin
	{
		
		function __construct()
		{
			parent::__construct();
		}

		public function Create(Request $data)
		{
			$d = $data->extract(["type","description","data"]);
			$d['timestamp'] = "CURRENT_TIMESTAMP()";
			$insert = $this->Insert(self::TABLE_LOG,$d,"id");
			return $this->success($insert);
		}

		public function Read(Request $data)
		{
			return $this->success($this->GetById(self::TABLE_LOG,$data->id));
		}

		public function Update(Request $data)
		{	
			$d = $data->extract(["u_id","name","email","phone","address"]);
			$update = $this->Save(self::TABLE_LOG,$d,$data->id);
			return $this->success($update);
		}

		public function Delete(Request $data)
		{
			$delete = $this->Save(self::TABLE_LOG,[
				"status"=>3
			],$data->id);
			return $this->success($delete);
		}

		public function List()
		{
			return $this->success($this->ViewList(self::TABLE_LOG));
		}
	}

?>