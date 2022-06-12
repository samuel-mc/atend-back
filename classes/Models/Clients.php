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

		public function List()
		{
			$cl = $this->ViewList(self::TABLE_CLIENTS);
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

		public function SaveClient(Request $data)
		{
			$d = $data->extract(["user_id","type_id","name","lastname","phone","email","require_billing","comments","photo"]);
			$this->Save(self::TABLE_CLIENTS,$d,$data->id);
		}

		public function NewBillingInfo(Request $data)
		{
			$data->put("status",1);
			$d = $data->extract(["bussines_name","billing_scheme_id","rfc","email","use_id","billing_regime_id","status"]);
			$finantial_info = $this->Insert(self::TABLE_FINANTIAL_INFORMATION,$d,"all");

			$zc = $this->GetByCondition(self::TABLE_CAT_ZIPCODES,["zipcode",$data->get("zipcode")])['id'];
			$data->put("country_id", 1);
			$data->put("zipcode_id",$zc);
			$data->put("type",3);
			$data->put("related_id",$finantial_info['id']);
			$add = $data->extract(["street","exterior","interior","suburb","zipcode_id","country_id","type","related_id"]);
			
			$fi = $this->Insert(self::TABLE_ADDRESSES,$add,"id");

			return $finantial_info;
		}

		public function SaveBillingInfo(Request $data)
		{
			$d = $data->extract(["bussines_name","billing_scheme_id","rfc","email","use_id","billing_regime_id","status"]);
			$this->Save(self::TABLE_FINANTIAL_INFORMATION,$d,$data->id);
			$zc = $this->GetByCondition(self::TABLE_CAT_ZIPCODES,["zipcode",$data->get("zipcode")])['id'];
			$data->put("country_id", 1);
			$data->put("zipcode_id",$zc);
			$data->put("type",3);
			$data->put("related_id",$data->id);
			$add = $data->extract(["street","exterior","interior","suburb","zipcode_id","country_id","type","related_id"]);
			$add_id =  $this->GetByCondition(self::TABLE_ADDRESSES,["related_id",$data->id])['id'];

			$this->Save(self::TABLE_ADDRESSES,$add,$add_id);
		}

		
	}

?>