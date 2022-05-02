<?php  

	class Nurses extends Admin
	{
		
		function __construct()
		{
			parent::__construct();
		}


		public function List()
		{
			$d = $this->ViewList(self::TABLE_PROVIDERS);
			$res = array(); 
			foreach ($d as $p) {
				$p['atend_profile'] = $this->GetById(self::TABLE_CAT_ATEND_PROFILES,$p['atend_profile_id'])['name'];
				$p['profile_level'] = $this->GetById(self::TABLE_CAT_PROFILE_LEVEL,$p['level'])['name'];
				$p['zone'] = $this->GetByCondition(self::TABLE_ADDRESSES,"type = 1 && related_id = ".$p['id'])['suburb'];
				$res[] = $p;
			}
			return $this->success($res);
		}


		public function NewNurse(Request $data)
		{
			$user = $this->Insert(self::TABLE_USERS,["name"=>$data->get("name"),"email"=>"nurse@mail.com","password"=>"null","type"=>3,"status"=>1],"id");

			$password = md5($data->get("password"));
			$pro = $this->Insert(self::TABLE_PROVIDERS,["user_id"=>$user['id'],"name"=>$data->get("name"),"lastname"=>$data->get("lastname"),"gender"=>$data->get("gender"),"phone"=>$data->gat("phone"),"type"=>$data->gat("type"),"birthdate"=>$data->gat("birthdate"),"height"=>$data->gat("height"),"weight"=>$data->gat("weight"),"mobile"=>$data->gat("mobile"),"email"=>$data->gat("email"),"password"=>$password,"availability"=>$data->gat("availability"),"professional_profile"=>$data->gat("professional_profile"),"atend_profile_id"=>$data->gat("profile_id"),"level"=>$data->gat("level"),"signature"=>$data->gat("signature_url"),"comment"=>$data->gat("comment"),"status"=>1],"all");

			$zc = $this->GetByCondition(self::TABLE_CAT_ZIPCODES,["zipcode",$data->get("zipcode")])['id'];
			$data->put("country_id", 1);
			$data->put("zipcode_id",$zc);
			$data->put("type",1);
			$data->put("related_id",$user['id']);
			$add = $data->extract(["street","exterior","interior","suburb","zipcode_id","country_id","type","related_id"]);

			$finantial_info = $data->extract(["rfc","bank_id","curp","clabe","tax_regime_id","bank_account","sat_status_id","santander_status_id","has_e_signature","provider_id"]);
			$finantial_info = $this->Insert(self::TABLE_PROVIDER_FINANTIAL_INFORMATION,$finantial_info,"id");

			$fi = $this->Insert(self::TABLE_ADDRESSES,$add,"id");

			$skills = [];
			foreach ($skills as $sk) {
				$this->Insert(self::TABLE_PROVIDER_SKILLS_LEVEL,["skill_id"=>$sk['id'],"teorical_level"=>$sk['teorical'],"practical_level"=>$sk['practical'],"provider_id"=>$pro['id']]);
			}

			return $pro;
		}

		public function GetAllProvidersSkills()
		{
			return $this->ViewList(self::TABLE_PROVIDER_SKILLS);
		}

	}

?>