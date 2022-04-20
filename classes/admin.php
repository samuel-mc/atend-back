<?php
class Admin
{

	const TABLE_ADDRESSES = "addresses";
	const TABLE_BILLING_RECEIVES = "billing_receives";
	const TABLE_BINNACLE = "binnacle";
	const TABLE_BINNACLE_BREATH_HELP = "binnacle_breath_help";
	const TABLE_BINNACLE_DRUGS = "binnacle_drugs";
	const TABLE_BINNACLE_IO = "binnacle_io";
	const TABLE_BINNACLE_MOVEMENTS = "binnacle_movements";
	const TABLE_BINNACLE_VITAL_SIGNS = "binnacle_vital_signs";
	const TABLE_CAT_AFFECTED_ZONE = "cat_affected_zone";
	const TABLE_CAT_AILMENTS = "cat_ailments";
	const TABLE_CAT_ATEND_PROFILES = "cat_atend_profiles";
	const TABLE_CAT_BILLING_REGIMES = "cat_billing_regime";
	const TABLE_CAT_BILLING_SCHEMES = "cat_billing_scheme";
	const TABLE_CAT_BILLING_USES = "cat_billing_use";
	const TABLE_CAT_BREATH_HELP = "cat_breath_help";
	const TABLE_CAT_CARE_TYPE = "cat_care_type";
	const TABLE_CAT_CLIENT_TYPE = "cat_client_type";
	const TABLE_CAT_COMPLEXION = "cat_complexion";
	const TABLE_CAT_DRUG_WAYS = "cat_drug_ways";
	const TABLE_CAT_GENERAL_STATUS = "cat_general_status";
	const TABLE_CAT_HR_STEPS = "cat_hr_steps";
	const TABLE_CAT_INCONTINENCE = "cat_incontinence";
	const TABLE_CAT_IO_NAMES = "cat_io_names";
	const TABLE_CAT_LOCUTION = "cat_locution";
	const TABLE_CAT_MOTOR_RESPONSE = "cat_motor_response";
	const TABLE_CAT_MOVEMENTS = "cat_movements";
	const TABLE_CAT_MOVILITY = "cat_movility";
	const TABLE_CAT_MUNICIPALITIES = "cat_municipalities";
	const TABLE_CAT_OPEN_EYES = "cat_open_eyes";
	const TABLE_CAT_PAIN_NAMES = "cat_pain_names";
	const TABLE_CAT_PAYMENT_METHODS = "cat_payment_methods";
	const TABLE_CAT_SERVICE_TYPES = "cat_service_type";
	const TABLE_CAT_SERVICE_DURATIONS = "cat_service_duration";
	const TABLE_CAT_SERVICE_FREQUENCIES = "cat_service_frequencies";
	const TABLE_CAT_STATES = "cat_states";
	const TABLE_CAT_STATE_OF_MIND = "cat_state_of_mind";
	const TABLE_CAT_VERBAL_RESPONSE = "cat_verbal_response";
	const TABLE_CAT_ZIPCODES = "cat_zipcodes";
	const TABLE_CAT_STATUS = "cat_status";
	const TABLE_CLIENTS = "clients";
	const TABLE_CLIENT_BALANCE = "client_balance";
	const TABLE_CLIENT_BALANCE_LOG = "client_balance_log";
	const TABLE_DOCTORS = "doctors";
	const TABLE_FINANTIAL_INFORMATION = "finantial_information";
	const TABLE_HR_CONTROL = "hr_control";
	const TABLE_PATIENTS = "patients";
	const TABLE_CLIENT_PAYMENTS = "client_payments";
	const TABLE_PROVIDERS = "provider";
	const TABLE_PROVIDER_FINANTIAL_INFORMATION = "provider_finantial_information";
	const TABLE_PROVIDER_PAYMENTS = "provider_payments";
	const TABLE_PROVIDER_SKILLS = "provider_skills";
	const TABLE_PROVIDER_SKILLS_LEVEL = "provider_skills_level";
	const TABLE_PROVIDER_STATUS = "provider_status";
	const TABLE_SCALE_GLASLOW = "scale_glaslow";
	const TABLE_SCALE_NORTON = "scale_norton";
	const TABLE_SCALE_PAIN = "scale_pain";
	const TABLE_SCALE_PERIMETERS = "scale_perimeters";
	const TABLE_SCALE_PUPILAR = "scale_pupilar";
	const TABLE_SERVICES = "services";
	const TABLE_SERVICE_COSTS = "service_costs";
	const TABLE_SERVICE_FREQUENCY = "service_frequency";
	const TABLE_SERVICE_STATUS = "service_status";
	const TABLE_CAT_USER_TYPES = "user_types";
	const TABLE_USERS = "users";
	
	/*const TABLE_AUTH_USERS = "auth_users";
	const TABLE_COMPANIES = "companies";
	const TABLE_DELIVERIES = "deliveries";
	const TABLE_DELIVERY_DRUGS = "delivery_drugs";
	const TABLE_DELIVERY_STATUS = "delivery_status";
	const TABLE_DOCUMENTS = "documents";
	const TABLE_DRUGS = "drugs";
	const TABLE_DRUG_CONCENTRATION = "drug_concentrations";
	const TABLE_DRUG_NAMES = "drug_names";
	const TABLE_LOG = "log";
	const TABLE_PATIENTS = "patients";
	const TABLE_SUMMARY = "summary";
	const TABLE_SUMMARY_LOG = "summary_log";
	const TABLE_PROBLEMS = "problems";*/

	public $db;
	public $utils;
	public $query;

	function __construct()
	{
		require_once 'utils.php';
		require_once 'DB/connection.php';
		require_once 'DB/queryBuilder.php';
		require_once "session.php";
		$this->conn = new Connection;
		$this->utils = new Utils;
		$this->query = new QueryBuilder;
		$this->db = $this->conn->Connect();
	}

	public function GetLastId($table)
	{
		$query = $this->query->select("id", $table, "true", "id DESC");
		$q = $this->db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
		$q->execute();
		$row = $q->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_LAST);
		$ultimo_id = $row[0];
		return $ultimo_id;
	}

	public function RunQuery($query)
	{
		$q = null;
		try {
			$q = $this->db->prepare($query);
			$q->execute();
		} catch (PDOException $error) {
			throw new PDOException('Mysql Resource failed: ' . $error->getMessage());
		}

		return $q;
	}

	public function Insert($table, $values, $return = null)
	{
		$res = array();
		$res['query'] = $this->query->insert($table, $values);
		if ($return == "query")
			return $res['query'];
		$this->RunQuery($res['query']);
		if ($return != null) {
			$res['id'] = $this->GetLastId($table);
			if ($return == "all") {
				$s = $this->query->select("*", $table, "id = " . $res['id']);
				$res['data'] = $this->GetFirst($s);
			} else {
			}
		}
		return $res;
	}

	public function Save($table, $values, $cond, $return = null)
	{
		$res = array();
		if (is_array($cond)) {
			$res['query'] = $this->query->update($table, $values, $cond[0] . " = " . $cond[1]);
		} else {
			$res['query'] = $this->query->update($table, $values, "id = " . $cond);
		}
		if ($return=="only_query")
			return $res['query'];
		$this->RunQuery($res['query']);
		return $res;
	}

	public function GetById($table, $id)
	{
		if ($id == null)
			return null;
		$select = $this->query->select("*", $table, "id = " . $id);
		return $this->GetFirst($select);
	}

	public function GetByCondition($table, $cond, $order = 'id')
	{
		if (is_array($cond)) {
			$res['query'] = $this->query->select("*", $table, $cond[0] . " = " . $cond[1],$order);
		} else {
			$res['query'] = $this->query->select("*", $table,$cond,$order);
		}
		return $this->GetFirst($res['query']);
	}

	public function ViewList($table, $cond = 1, $order = "id")
	{
		$res = $this->query->select("*", $table, $cond,$order);
		$res = $this->GetAllRows($res);
		return $res;
	}

	public function GetFirst($select)
	{
		$res = $this->RunQuery($select);
		while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
			return $row;
		}
	}

	public function GetAllRows($select)
	{
		$r = array();
		$res = $this->RunQuery($select);
		while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
			$r[] = $row;
		}
		return $r;
	}

	public function Success($data)
	{
		return $data;
	}

	public function Error($data)
	{
		return ["success" => false, "data" => $data];
	}
}
