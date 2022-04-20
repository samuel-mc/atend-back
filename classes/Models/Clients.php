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
			$fullname = $data->get("name")." ".$data->get("lastname");
			$user = $this->Insert(self::TABLE_USERS,["name"=>$fullname,"email"=>$data->get("email"),"password"=>md5("usuario"),"type"=>5,"status"=>1],"id");
			$data->put("user_id",$user['id']);
			$data->put("status",1);
			$d = $data->extract(["user_id","type_id","name","lastname","phone","email","require_billing","comments","photo"]);
			$cl = $this->Insert(self::TABLE_CLIENTS,$d,"all");
			return $cl; 
		}

		public function NewBillingInfo(Request $data)
		{
			$data->put("status",1);
			$d = $data->extract(["bussines_name","billing_scheme_id","rfc","email","use_id","billing_regime_id","status"]);
			$finantial_info = $this->Insert(self::TABLE_FINANTIAL_INFORMATION,$d,"all");

			$zc = $this->GetByCondition(self::TABLE_CAT_ZIPCODES,["zipcode",$data->get("zipcode")])['id'];
			$data->put("country_id", 1);
			$data->put("zipcode_id",$zc);
			$data->put("type",2);
			$data->put("related_id",$finantial_info['id']);
			$add = $data->extract(["street","exterior","interior","suburb","zipcode_id","country_id"]);
			
			$fi = $this->Insert(self::TABLE_ADDRESSES,$add,"id");

			return $finantial_info;
		}

		
	}

?>