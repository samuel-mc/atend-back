<?php  


	/**
	 * 
	 */
	class Binnacle extends Admin
	{
		
		function __construct()
		{
			parent::__construct();
		}


		public function GetData($id,$table)
		{
			$data = $this->ViewList($table,"binnacle_id = ".$id);
			$res = array();

			foreach ($data as $d) {
				if ($table==self::TABLE_BINNACLE_BREATH_HELP){
					$d['type'] = $this->GetById(self::TABLE_CAT_BREATH_HELP,$d['type_id'])['name'];
				}
				if ($table==self::TABLE_BINNACLE_DRUGS){
					$d['way'] = $this->GetById(self::TABLE_CAT_DRUG_WAYS,$d['way_id'])['name'];
				}
				if ($table==self::TABLE_BINNACLE_IO){
					$d['category'] = $d['category_id']==1?"Ingreso":"Egreso";
					$d['type'] = $this->GetById(self::TABLE_CAT_IO_TYPES,$d['type_id'])['name'];
				}
				if ($table==self::TABLE_BINNACLE_MOVEMENTS){
					$d['type'] = $this->GetById(self::TABLE_CAT_MOVEMENTS,$d['type_id'])['name'];
				}
				if ($table==self::TABLE_SCALE_GLASGOW){
					$d['eyes_open'] = $this->getById(self::TABLE_CAT_OPEN_EYES,$d['eyes_open_id'])['name'];
					$d['verbal_response'] = $this->getById(self::TABLE_CAT_VERBAL_RESPONSE,$d['verbal_response_id'])['name'];
					$d['motor_response'] = $this->getById(self::TABLE_CAT_MOTOR_RESPONSE,$d['motor_response_id'])['name'];
				}
				if ($table==self::TABLE_SCALE_NORTON){
					$d['state_of_mind'] = $this->GetById(self::TABLE_CAT_STATE_OF_MIND,$d['state_of_mind_id'])['name'];
					$d['activity'] = $this->GetById(self::TABLE_CAT_ACTIVITY,$d['activity_id'])['name'];
					$d['movility'] = $this->GetById(self::TABLE_CAT_MOVILITY,$d['movility_id'])['name'];
					$d['incontinence'] = $this->GetById(self::TABLE_CAT_INCONTINENCE,$d['incontinence_id'])['name'];
					$d['general_status'] = $this->GetById(self::TABLE_CAT_GENERAL_STATUS,$d['general_status_id'])['name'];
					$d['affected_zone'] = $this->GetById(self::TABLE_CAT_AFFECTED_ZONE,$d['affected_zone_id'])['name'];
				}
				if ($table==self::TABLE_SCALE_PAIN){
					
				}
				if ($table==self::TABLE_SCALE_PERIMETERS){
					
				}
				if ($table==self::TABLE_SCALE_PUPILAR){
					
				}


				$res[] = $d;
			}

			return $res;
		}

	}


?>