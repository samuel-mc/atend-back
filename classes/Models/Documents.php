<?php 
	class Documents extends Admin
	{
		
		function __construct()
		{
			parent::__construct();
		}

		public function Create(Request $data)
		{
			$d = $data->extract(["delivery_id","type","name"]);
			$d['timestamp'] = "CURRENT_TIMESTAMP()";
			$insert = $this->Insert(self::TABLE_DOCUMENTS,$d,"id");
			return $this->success($insert);
		}

		public function Read(Request $data)
		{
			return $this->success($this->GetById(self::TABLE_DOCUMENTS,$data->id));
		}

		public function Update(Request $data)
		{	
			$d = $data->extract(["delivery_id","type","name"]);
			$update = $this->Save(self::TABLE_DOCUMENTS,$d,$data->id);
			return $this->success($update);
		}

		public function Delete(Request $data)
		{
			$delete = $this->Save(self::TABLE_DOCUMENTS,[
				"status"=>3
			],$data->id);
			return $this->success($delete);
		}

		public function List()
		{
			return $this->success($this->ViewList(self::TABLE_DOCUMENTS));
		}
	}

?>