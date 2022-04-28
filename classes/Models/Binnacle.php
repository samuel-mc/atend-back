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