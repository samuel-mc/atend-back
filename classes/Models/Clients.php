<?php 

	/**
	 * 
	 */
	class Clients extends Admin
	{
		
		function __construct()
		{
			parent::__construct();
		}

		public function GetClientById(Request $request)
		{
			$cl = $this->GetById(self::TABLE_CLIENTS,$request->id);
			return $cl;
		}

		public function NewClient(Request $data)
		{
			$fullname = $data->get("name")." "-$data->get("lastname");
			$user = $this->Save(self::TABLE_USERS,["name"=>$fullname,"email"=>$data->get("email"),"password"=>md5("usuario"),"type"=>5,"status"=>1],"id");
			$data->put("user_id",$user['id']);
			$data->put("status",1);
			$d = $data->extract(["user_id","type_id","name","lastname","phone","email","require_billing","comments","photo"]);
			$cl = $this->Save(self::TABLE_CLIENTS,$d,"all");
			return $cl; 
		}

		
	}

?>