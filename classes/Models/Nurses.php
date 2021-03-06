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
				$z = $this->GetByCondition(self::TABLE_ADDRESSES,"type = 1 && related_id = ".$p['id']);
				$p['zone'] = $z!=null?$z['suburb']:null;
				$res[] = $p;
			}
			return $this->success($res);
		}


		public function NewNurse(Request $data)
		{
			//return $data->obj;
			$user = $this->Insert(self::TABLE_USERS,["name"=>$data->get("name"),"email"=>"nurse@mail.com","password"=>"null","type"=>3,"status"=>1],"id");

			$password = md5($data->get("password"));
			$data->put("type",1);

			$pro = $this->Insert(self::TABLE_PROVIDERS,["user_id"=>$user['id'],"name"=>$data->get("name"),"lastname"=>$data->get("lastname"),"gender"=>$data->get("gender"),"phone"=>$data->get("phone"),"type"=>$data->get("type"),"birthdate"=>$data->get("birthdate"),"height"=>$data->get("height"),"weight"=>$data->get("weight"),"mobile"=>$data->get("mobile"),"email"=>$data->get("email"),"password"=>$password,"availability"=>$data->get("availability"),"professional_profile"=>$data->get("professional_profile"),"atend_profile_id"=>$data->get("profile_id"),"level"=>$data->get("level"),"signature"=>$data->get("signature_url"),"profile_photo"=>$data->get("profile_photo"),"comment"=>$data->get("comment"),"status"=>1],"all");
			//echo "AQUI";
			//echo $pro;

			$zc = $this->GetByCondition(self::TABLE_CAT_ZIPCODES,["zipcode",$data->get("zipcode")])['id'];
			$data->put("country_id", 1);
			$data->put("zipcode_id",$zc);
			$data->put("type",$data->get("is_business"));
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

		public function NewBinnIO(Request $data) {
			$info = $this->Insert(self::TABLE_BINNACLE_IO, [
				"binnacle_id"=>$data->get("binnacle_id"),
				"category_id"=>$data->get("category_id"),
				"type_id"=>$data->get("type_id"),
				"solution"=>$data->get("solution"),
				"quantity"=>$data->get("quantity"),
				"timestamp" =>'CURRENT_TIMESTAMP()',
				"status"=>1
			],"all");
			return $info;
		}

		public function UpdateBinnIO(Request $data) {

			$d = $data->extract([
				"category_id",
				"type_id",
				"solution",
				"quantity"
			]);
			$update = $this->Save(self::TABLE_BINNACLE_IO,$d,$data->id);
			return $update;
		}

		public function UpdateBinnVitalSigns (Request $data) {
			$d = $data->extract([
				"pressure_mm",
				"pressure_hg",
				"heart_rate",
				"breath_frequency",
				"temperature",
				"o2_saturation",
				"capillary"
			]);
			$update = $this->Save(self::TABLE_BINNACLE_VITAL_SIGNS,$d,$data->id);
			return $update;
		}

		public function UpdateBinnMov (Request $data) {
			$d = $data->extract([
				"type_id",
			]);
			$update = $this->Save(self::TABLE_BINNACLE_MOVEMENTS,$d,$data->id);
			return $update;
		}

		public function UpdateBinnHelp (Request $data) {
			$d = $data->extract([
				"type_id",
				"liters_per_hour"
			]);
			$update = $this->Save(self::TABLE_BINNACLE_BREATH_HELP,$d,$data->id);
			return $update;
		}

		public function UpdateBinnDrugs (Request $data) {
			$d = $data->extract([
				"name",
				"dosis",
				"way_id",
				"frequency",
				"observations"
			]);
			$update = $this->Save(self::TABLE_BINNACLE_DRUGS,$d,$data->id);
			return $update;
		}

		public function UpdateScalePain (Request $data) {
			$d = $data->extract([
				"ena_eva",
				"evera_id",
				"conductual_id",
				"pain_type_id",
				"treatment"
			]);
			$update = $this->Save(self::TABLE_SCALE_PAIN,$d,$data->id);
			return $update;
		}

		public function UpdateScalePupilar (Request $data) {
			$d = $data-> extract([
				"pupilar_left",
				"pupilar_right"
			]);
			$update = $this->Save(self::TABLE_SCALE_PUPILAR,$d,$data->id);
			return $update;
		}

		public function UpdateScaleGlasgow (Request $data) {
			$d = $data->extract([
				"eyes_open_id",
				"verbal_response_id",
				"motor_response_id",
				"glasgow_scale"
			]);
			$update = $this->Save(self::TABLE_SCALE_GLASGOW,$d,$data->id);
			return $update;
		}

		public function UpdateScalePerimeters (Request $data) {
			$d = $data->extract([
				"location_id",
				"perimeter"
			]);
			$update = $this->Save(self::TABLE_SCALE_PERIMETERS,$d,$data->id);
			return $update;
		}

		public function UpdateScaleNorton (Request $data) {
			$d = $data->extract([
				"state_of_mind_id",
                "activity_id",
                "movility_id",
                "incontinence_id",
                "general_status_id",
                "affected_zone_id",
                "norton_scale"
			]);
			$update = $this->Save(self::TABLE_SCALE_NORTON,$d,$data->id);
			return $update;
		}

		public function NewBinnVitalSigns(Request $data) {
			$info = $this->Insert(self::TABLE_BINNACLE_VITAL_SIGNS, [
				"binnacle_id"=>$data->get("binnacle_id"),
				"pressure_mm"=>$data->get("pressure_mm"),
				"pressure_hg"=>$data->get("pressure_hg"),
				"heart_rate"=>$data->get("heart_rate"),
				"breath_frequency"=>$data->get("breath_frequency"),
				"temperature"=>$data->get("temperature"),
				"o2_saturation"=>$data->get("o2_saturation"),
				"capillary"=>$data->get("capillary"),
				"timestamp" =>'CURRENT_TIMESTAMP()',
				"status"=>1
			],"all");
			return $info;
		}
		
		public function NewBinnMov(Request $data) {
			$info = $this->Insert(self::TABLE_BINNACLE_MOVEMENTS, [
				"binnacle_id"=>$data->get("binnacle_id"),
				"type_id"=>$data->get("type_id"),
				"timestamp" =>'CURRENT_TIMESTAMP()',
				"status"=>1
			],"all");
			return $info;
		}
		
		public function NewBinnHelp(Request $data) {
			$info = $this->Insert(self::TABLE_BINNACLE_BREATH_HELP, [
				"binnacle_id"=>$data->get("binnacle_id"),
				"type_id"=>$data->get("type_id"),
				"liters_per_hour"=>$data->get("liters_per_hour"),
				"timestamp" =>'CURRENT_TIMESTAMP()',
				"status"=>1
			],"all");
			return $info;
		}

		public function NewBinnDrugs(Request $data) {
			$info = $this->Insert(self::TABLE_BINNACLE_DRUGS, [
				"binnacle_id"=>$data->get("binnacle_id"),
				"name"=>$data->get("name"),
				"dosis"=>$data->get("dosis"),
				"way_id"=>$data->get("way_id"),
				"frequency"=>$data->get("frequency"),
				"observations"=>$data->get("observations"),
				"timestamp" =>'CURRENT_TIMESTAMP()',
				"status"=>1
			],"all");
			return $info;
		}
		
		public function NewScalePain(Request $data) {
			$info = $this->Insert(self::TABLE_SCALE_PAIN, [
				"binnacle_id"=>$data->get("binnacle_id"),
				"ena_eva"=>$data->get("ena_eva"),
				"evera"=>$data->get("evera"),
				"conductual"=>$data->get("conductual"),
				"pain_type"=>$data->get("pain_type"),
				"treatment"=>$data->get("treatment"),
				"drug_id"=>$data->get("drug_id"),
				"timestamp" =>'CURRENT_TIMESTAMP()',
				"status"=>1
			],"all");
			return $info;
		}
		
		public function NewScalePupilar(Request $data) {
			$info = $this->Insert(self::TABLE_SCALE_PUPILAR, [
				"binnacle_id"=>$data->get("binnacle_id"),
				"pupilar_left"=>$data->get("pupilar_left"),
				"pupilar_right"=>$data->get("pupilar_right"),
				"timestamp" =>'CURRENT_TIMESTAMP()',
				"status"=>1
			],"all");
			return $info;
		}
	
		public function NewScaleGlasgow(Request $data) {
			$info = $this->Insert(self::TABLE_SCALE_GLASGOW, [
				"binnacle_id"=>$data->get("binnacle_id"),
				"eyes_open_id"=>$data->get("eyes_open_id"),
				"verbal_response_id"=>$data->get("verbal_response_id"),
				"motor_response_id"=>$data->get("motor_response_id"),
				"timestamp" =>'CURRENT_TIMESTAMP()',
				"glasgow_scale"=>$data->get("glasgow_scale"),
				"status"=>1
			],"all");
			return $info;
		}

		public function NewScalePerimeters(Request $data) {
			$info = $this->Insert(self::TABLE_SCALE_PERIMETERS, [
				"binnacle_id"=>$data->get("binnacle_id"),
				"locution_id"=>$data->get("locution_id"),
				"timestamp" =>'CURRENT_TIMESTAMP()',
				"perimeter"=>$data->get("perimeter"),
				"status"=>1
			],"all");
			return $info;
		}

		public function NewScaleNorton(Request $data) {
			$info = $this->Insert(self::TABLE_SCALE_NORTON, [
				"binnacle_id"=>$data->get("binnacle_id"),
				"state_of_mind_id"=>$data->get("state_of_mind_id"),
				"activity_id"=>$data->get("activity_id"),
				"movility_id"=>$data->get("movility_id"),
				"incontinence_id"=>$data->get("incontinence_id"),
				"general_status_id"=>$data->get("general_status_id"),
				"affected_zone_id"=>$data->get("affected_zone_id"),
				"timestamp" =>'CURRENT_TIMESTAMP()',
				"norton_scale"=>$data->get("norton_scale"),
				"status"=>1
			],"all");
			return $info;
		}

		public function GetAllProvidersSkills()
		{
			return $this->ViewList(self::TABLE_PROVIDER_SKILLS);
		}

		public function GetRecommendedProvider(Request $data)
		{
			$serv = $this->GetById(self::TABLE_SERVICES,$data->get("service_id"));
			$gen = $serv['provider_gender']==0?"(gender = 1 || gender = 2)":"(gender = ".$serv['provider_gender'].")";
			$f = $gen." AND atend_profile_id = ".$serv['service_type'];
			$pos_prov = $this->ViewList(self::TABLE_PROVIDERS,$f);
			$recommended = array();
			$not_recommended = array();
			foreach ($pos_prov as $prov) {
				$se = $this->GetByCondition(self::TABLE_SERVICES,"provider_id = ".$prov['id']." AND DATE(date) = DATE('".$serv['date']."')");
				if ($se!=null){
					$not_recommended[] = $prov;
				}else{
					$recommended[] = $prov;
				}
			}

			return ["recommended"=>$recommended,"not_recommended"=>$not_recommended,"filter"=>$f];
		}

	}

?>