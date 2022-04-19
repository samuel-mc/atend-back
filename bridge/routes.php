<?php
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
	header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
	error_reporting(E_ALL); error_reporting(-1); ini_set('error_reporting', E_ALL);
	require "../classes/utils.php";
	$router = new Router;

	$router->New("newUser", "users/Save"); //email, password
	$router->New("login", "users/Login"); //email, password
	$router->New("getUsers", "users/List");
	$router->New("getUser", "users/Read");
	$router->New("deleteUser", "users/Delete"); //id
	$router->New("changePassword", "users/ChangePassword");
	$router->New("savePatient", "patients/Create");
	$router->New("getPatient", "patients/Read");
	$router->New("getPatients", "patients/List");
	$router->New("deletePatient", "patients/Delete");




	$router->New("getPatientHistory", "patients/GetDeliveryHistory"); // u_id


	$router->New("getSummaryLog", "summary/GetLog"); // drug_id, type (1|2)
	$router->New("summaryEntrance", "summary/RegisterEntrance"); //drug_id, quantity, annexed (nombre del archivo adjunto)
	$router->New("deleteFromSummary", "summary/DeleteRegister"); //id

	$router->New("uploadDocument", "documents/Upload");


	$router->Group("services",[
		"get_services_table"=>"GetTable"
		]
	);


	$router->Group("drugs",[
		"getDrugs"=>"List",
		"getConcentrations"=>"ListConcentrations",
		"getDrugConcentrations"=>"GetConcentrations",
		"getDrugLotes"=>"GetLotes",
		"getDrugByLote"=>"GetByLote",
		"getDrugQuantity"=>"GetQuantity",
		"getDrugsDetails"=>"ListDetails",
		"getDrugDetails"=>"GetDetails"]
	);

	$router->Group("deliveries",[
		"getDeliveryDetails"=>"GetDetails",
		"getDeliveriesDetails"=>"ListDetails",
		"newDelivery"=>"Create",
		"deleteDelivery"=>"Delete",
		"uploadEvidence"=>"UploadEvidence",
		"UploadDocuments"=>"UploadDocuments",
		"getUrlForPatient"=>"GetURL",
		"setDeliveryStatus"=>"SetStatus",
		"getDeliveryStatus"=>"GetAllStatus",
		"DeleteDelivery"=>"Delete",
		"changeDateDelivery"=>"ChangeDate",
		"getDeliveryDate"=>"GetDate"
	]);

	$router->New("createShipment", "dhl/createShipment"); //delivery_id
	$router->New("trackingShipment", "dhl/trackingShipment"); //delivery_id
	$router->New("deleteShipment", "dhl/deleteShipment");//deliver_id
	$router->New("updateDeliveryStatus","dhl/UpdateDeliveryStatus");
	$router->New("getDHLLabel","dhl/GetDeliveryLabel");

	$router->New("sendPatientSMS", "communication/SendSMSToPatient");
	$router->New("sendPatientEmail", "communication/SendInfoToPatient");
	$router->New("sendStoreEmail", "communication/SendInfoToStore");
	
	$router->New("passwordForgotten", "communication/SendRestorePassword");
	
	$router->New("saveProblem", "problems/SaveProblem");
	$router->New("getDeliveryProblems", "problems/GetDeliveryProblems");
	$router->New("deleteProblem", "problems/DeleteProblem");
	

	$router->New("updateAllDeliveries", "dhl/UpdateAllStatus");


	/*$router->New("getDeliveryDetails", "deliveries/GetDetails");
	$router->New("getDeliveriesDetails", "deliveries/ListDetails");
	$router->New("newDelivery", "deliveries/Create"); //patient_id, folio, schedule, date, token, drugs
	$router->New("deleteDelivery", "deliveries/Delete"); //patient_id, folio, schedule, date, token, drugs
	$router->New("uploadEvidence", "deliveries/UploadEvidence"); // u_id
	$router->New("UploadDocuments", "deliveries/UploadDocuments"); // u_id
	$router->New("getUrlForPatient", "deliveries/GetURL"); // u_id
	$router->New("setDeliveryStatus", "deliveries/SetStatus");
	$router->New("getDeliveryStatus", "deliveries/GetAllStatus");
	$router->New("DeleteDelivery", "deliveries/Delete");
	$router->New("getDrugs", "drugs/List");
	$router->New("getDrugsDetails", "drugs/ListDetails");
	$router->New("getDrugDetails", "drugs/GetDetails");
	$router->New("getConcentrations", "drugs/ListConcentrations");
	$router->New("getDrugConcentrations", "drugs/GetConcentrations");
	$router->New("getDrugLotes", "drugs/GetLotes");
	$router->New("getDrugQuantity", "drugs/GetQuantity");*/


	$router->RUN();
?>
