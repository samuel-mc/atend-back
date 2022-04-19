<?php 
	class Companies extends Admin
	{		
		function __construct()
		{
			parent::__construct();
		}

		public function Create(Request $data)
		{
			$insert = $this->Insert(self::TABLE_COMPANIES,[
				"name"=>$data->get("name")
			],"id");
			return $this->success($insert);
		}

		public function Read(Request $data)
		{
			return $this->success($this->GetById(self::TABLE_COMPANIES,$data->id));
		}

		public function Update(Request $data)
		{
			$update = $this->Save(self::TABLE_COMPANIES,[
				"name"=>$data->get("name"),
				"status"=>$data->get("status")
			],$data->id);
			return $this->success($update);
		}

		public function Delete(Request $data)
		{
			$delete = $this->Save(self::TABLE_COMPANIES,[
				"status"=>3
			],$data->id);
			return $this->success($delete);
		}
	}

?>