<?php

	class DHL extends Admin

	{

		public $reqs;

		public $deliveryModel;



		function __construct($deliveryModel = null) {

			parent::__construct();

			$this->reqs = new DHLJSON;

			if ($deliveryModel!=null)

				$this->deliveryModel = $deliveryModel;

			else

				$this->deliveryModel = new Deliveries;

		}



		public function createShipment(Request $req) {

			$drugs = array();

			$delivery_id = $req->get("delivery_id");
			$delivery = $this->query->select("*", self::TABLE_DELIVERIES, "id = ".$delivery_id);
			$data = $this->GetFirst($delivery);
			$delivery_drugs = $this->query->select("*", self::TABLE_DELIVERY_DRUGS, "delivery_id = ".$data['id']);

			foreach ($this->GetAllRows($delivery_drugs) as $delivery_drug) {
				$drug = $this->GetById(self::TABLE_DRUGS, $delivery_drug['drug_id']);
				$drug['name'] = $this->GetById(self::TABLE_DRUG_NAMES, $drug['name_id']);
				$drug['concentration'] = $this->GetById(self::TABLE_DRUG_CONCENTRATION, $drug['concentration_id']);
				$drug['quantity'] = $delivery_drug['quantity'];
				$drugs[] = $drug;
			}

			$auth_user =  $this->query->select("*", self::TABLE_AUTH_USERS, "delivery_id = ".$data['id']);
			$data['auth_user'] = $this->GetFirst($auth_user);
			$data['drugs'] = $drugs;
			$data['patient'] = $this->GetById(self::TABLE_PATIENTS,$data['patient_id']);

			$result = $this->DHLShipmentRequest($data);
			return $this->success($result);

		}


		public function UpdateAllStatus()
		{
			$d = Array();
			$d['type'] = 2;
			$d['description'] = "Intentado Update de Deliveries";
			$d['data'] = "data";
			$d['timestamp'] = "CURRENT_TIMESTAMP()";
			$insert = $this->Insert(self::TABLE_LOG,$d,"id");

			$delivery = $this->query->select("*", self::TABLE_DELIVERIES, "status = 2");
			$data = $this->GetAllRows($delivery);
			foreach ($data as $del) {
				$this->UpdateDeliveryStatus(new Request(["delivery_id"=>$del['id']]));
				echo "UPDATE ".$del['id'];
			}
		}



		public function UpdateDeliveryStatus(Request $data)

		{

			$r = $this->trackingShipment($data);

			$status = 0;
			$timestamp = $r['datetime'] != null?("'".$r['datetime']."'"):"CURRENT_TIMESTAMP()";

			if ($r['eventCode']=='OK'){

				//Cuando ya fue entregado

				$status = 4;

			}

			if ($r['eventCode']=='WC'){

				//Cuando ya está en camino

				$status = 3;

			}

			if ($r['eventCode']=='PU'){

				//Cuando ya fue recogido 

				$status = 2;

			}


			if ($status!=0){
				if ($status == 4){
					$sel_1 = "SELECT * FROM ".self::TABLE_DELIVERY_STATUS." WHERE delivery_id = ".$data->get("delivery_id")." AND status = 3";
					//echo $sel_1;
					if($this->GetFirst($sel_1)==null){
						$in_1 = $this->query->insert(self::TABLE_DELIVERY_STATUS,["delivery_id"=>$data->get("delivery_id"),"status"=>3,"timestamp"=>$timestamp]);
						$this->RunQuery($in_1);
						//echo $in_1;
					}
				}

				if($this->GetFirst("SELECT * FROM ".self::TABLE_DELIVERY_STATUS." WHERE delivery_id = ".$data->get("delivery_id")." AND status = ".$status)==null){
					$this->RunQuery($this->query->insert(self::TABLE_DELIVERY_STATUS,["delivery_id"=>$data->get("delivery_id"),"status"=>$status,"timestamp"=>$timestamp]));
				}

			}

			return $this->success($r);

		}



		public function trackingShipment(Request $req) {
			$delivery_id = $req->get("delivery_id");
			$delivery = $this->query->select("tracking_number, shipment_id_number, message_reference", self::TABLE_DELIVERIES, "id = ".$delivery_id);
			$data = $this->GetFirst($delivery);
			$result = $this->DHLTrackingShipmentRequest($data);
			return $result;
		}



		public function deleteShipment(Request $req) {

			$delivery_id = $req->get("delivery_id");



			$delivery = $this->query->select("tracking_number, shipment_id_number, timestamp", self::TABLE_DELIVERIES, "id = ".$delivery_id);

			$data = $this->GetFirst($delivery);



			$result = $this->DHLDeleteShipmentRequest($data);



			return $this->success($result);

		}



		public function DHLShipmentRequest($args) {

			//$url = 'https://wsbexpress.dhl.com/rest/sndpt/ShipmentRequest';

			$url = 'https://wsbexpress.dhl.com/rest/gbl/ShipmentRequest';



			$delivery_id = $args["id"];

			$data = $this->reqs->ShipmentData($args);



			$resultAPI = $this->callAPI('POST', $url, json_encode($data));

			$resultAPI = str_replace("@code","code", $resultAPI);

			$resultAPI = str_replace("@number","number", $resultAPI);

			$resultAPI = json_decode($resultAPI);





			$response = $resultAPI->ShipmentResponse;

			$code = $response->Notification[0]->code;

			$message = $response->Notification[0]->Message;



			if ($code != 0) {

				$message = $response->Notification[0]->Message;

				return [

					"success" => false,

					"message" => $message,

					"data"=> $data

				];

			} else {

				$trackingNumber = $response->PackagesResult->PackageResult[0]->TrackingNumber;

				$shipmentIdNumber = $response->ShipmentIdentificationNumber;

				$graphicImage = $response->LabelImage[0]->GraphicImage;

				$url = $this->convertToPDF($graphicImage, $delivery_id);



				$str=rand();

				$messageReference = md5($str);



				$dataToUpdate = [

					"tracking_number" => $trackingNumber,

					"shipment_id_number" => $shipmentIdNumber,

					"message_reference" => $messageReference,

				];



				$update = $this->Save(self::TABLE_DELIVERIES, $dataToUpdate, $delivery_id);



				$res = [

					"trackingNumber" => $trackingNumber,

					"shipment_id_number" => $shipmentIdNumber,

					"url" => $url

				];

				return $res;

			}

		}



		public function DHLTrackingShipmentRequest($args) {

			try {

				//$url = 'https://wsbexpress.dhl.com/rest/sndpt/TrackingRequest';

				$url = 'https://wsbexpress.dhl.com/rest/gbl/TrackingRequest';
				$data = $this->reqs->TrackingShipmentData($args);
				$resultAPI = $this->callAPI('POST', $url, json_encode($data));
				$resultAPI = json_decode($resultAPI);



				$isArray = $status = $resultAPI->trackShipmentRequestResponse->trackingResponse->TrackingResponse->AWBInfo->ArrayOfAWBInfoItem;
				$status = is_array($isArray) ? $isArray[0]->Status->ActionStatus : $isArray->Status->ActionStatus;
				$message = is_array($isArray) ?
					$isArray[0]->Status->Condition->ArrayOfConditionItem->ConditionData
					: $isArray->Status->Condition->ArrayOfConditionItem->ConditionData;

				$eventCode = $resultAPI->trackShipmentRequestResponse->trackingResponse->TrackingResponse->AWBInfo->ArrayOfAWBInfoItem->Pieces->PieceInfo->ArrayOfPieceInfoItem->PieceEvent->ArrayOfPieceEventItem->ServiceEvent

				? $resultAPI->trackShipmentRequestResponse->trackingResponse->TrackingResponse->AWBInfo->ArrayOfAWBInfoItem->Pieces->PieceInfo->ArrayOfPieceInfoItem-> PieceEvent->ArrayOfPieceEventItem->ServiceEvent->EventCode

				: 'No se encontraron datos';

				$date = $resultAPI->trackShipmentRequestResponse->trackingResponse->TrackingResponse->AWBInfo->ArrayOfAWBInfoItem->Pieces->PieceInfo->ArrayOfPieceInfoItem->PieceEvent->ArrayOfPieceEventItem
				? $resultAPI->trackShipmentRequestResponse->trackingResponse->TrackingResponse->AWBInfo->ArrayOfAWBInfoItem->Pieces->PieceInfo->ArrayOfPieceInfoItem-> PieceEvent->ArrayOfPieceEventItem->Date
				: null;

				$time = $resultAPI->trackShipmentRequestResponse->trackingResponse->TrackingResponse->AWBInfo->ArrayOfAWBInfoItem->Pieces->PieceInfo->ArrayOfPieceInfoItem->PieceEvent->ArrayOfPieceEventItem
				? $resultAPI->trackShipmentRequestResponse->trackingResponse->TrackingResponse->AWBInfo->ArrayOfAWBInfoItem->Pieces->PieceInfo->ArrayOfPieceInfoItem-> PieceEvent->ArrayOfPieceEventItem->Time
				: null;

				$description = $resultAPI->trackShipmentRequestResponse->trackingResponse->TrackingResponse->AWBInfo->ArrayOfAWBInfoItem->Pieces->PieceInfo->ArrayOfPieceInfoItem->PieceEvent->ArrayOfPieceEventItem->ServiceEvent

				? $resultAPI->trackShipmentRequestResponse->trackingResponse->TrackingResponse->AWBInfo->ArrayOfAWBInfoItem->Pieces->PieceInfo->ArrayOfPieceInfoItem->PieceEvent->ArrayOfPieceEventItem->ServiceEvent->Description

				: 'No se encontraron datos';


				$datetime = ($date!=null && $time!=null)?($date." ".$time):null;


				return [
					"json" =>json_encode($data),
					"status" => $status,
					"message" => $message,
					"eventCode" => $eventCode,
					"dateTime" => $datetime,
					"result" => $resultAPI->trackShipmentRequestResponse->trackingResponse->TrackingResponse->AWBInfo->ArrayOfAWBInfoItem,
					"response" => $resultAPI->trackShipmentRequestResponse
				];

			} catch (\Exception $e) {

				throw new \Exception("Error Processing Request: ". $e);

			}

		}



		public function DHLDeleteShipmentRequest($args) {

			try {

				$url = 'https://wsbexpress.dhl.com/rest/sndpt/TrackingRequest';

				$data = $this->reqs->DeleteShipmentData($args);



				$resultAPI = $this->callAPI('POST', $url, json_encode($data));

				$resultAPI = json_decode($resultAPI);



				$code = $resultAPI->DeleteResponse->Notification[0]->code;

				$message = $resultAPI->DeleteResponse->Notification[0]->Message;



				return [

					"code" => $status,

					"message" => $message,

				];

			} catch (\Exception $e) {

				throw new \Exception("Error Processing Request: ". $e);

			}

		}


		public function GetDeliveryLabel(Request $data)
		{
			$doc = $this->GetFirst($this->query->select("*",self::TABLE_DOCUMENTS,"delivery_id = ".$data->get("delivery_id")." AND type = 20"));
			return $doc;
		}


		public function convertToPDF($b64, $delivery_id) {

			//TODO: Guardar en base de datos la url del archivo que regresa DHL

			$target_dir = "../assets/data/dhl/";

			if (!file_exists($target_dir)) {

			    //mkdir($target_dir, 0777, true);

			}



			$id_name = uniqid();

			$userfile_extn = "pdf";

			$name = $id_name.".".$userfile_extn;



			$target_file = $target_dir . $name;

			$bin = base64_decode($b64, true);



			if (strpos($bin, '%PDF') !== 0) {

				throw new Exception('Missing the PDF file signature');

			}



			if (file_put_contents($target_file, $bin)) {

				//$request = new Request(["delivery_id" => $delivery_id, "type" => 20, "name" => $target_file]);

				//$this->deliveryModel->UploadDocuments($request);

			} else {

				throw new Exception('No se pudo guardar archivo');

			}



			$target_file = str_replace("../", "", $target_file);

			return $target_file;

		}



		private function callAPI($method, $url, $data) {

			$username = 'productosroMX';

			$password = 'I#0jD#0vY#3b';

			$key = 'cHJvZHVjdG9zcm9NWDpJIzBqRCMwdlkjM2I=';//Esta key me la generó POSTMAN



			$curl = curl_init();

			curl_setopt_array($curl, [

				CURLOPT_URL => $url,

				CURLOPT_RETURNTRANSFER => true,

			  CURLOPT_ENCODING => '',

			  CURLOPT_MAXREDIRS => 10,

			  CURLOPT_TIMEOUT => 0,

			  CURLOPT_FOLLOWLOCATION => true,

			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

			  CURLOPT_CUSTOMREQUEST => 'POST',

			  CURLOPT_POSTFIELDS =>$data,

			  CURLOPT_HTTPHEADER => [

			    'Authorization: Basic cHJvZHVjdG9zcm9NWDpJIzBqRCMwdlkjM2I=',

			    'Content-Type: application/json',

			    'Cookie: BIGipServer~WSB~pl_wsb-express-ash.dhl.com_443=1516276124.64288.0000'//No estoy seguro que sea necesario

			  ],

			]);



			$response = curl_exec($curl);

			$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);



			curl_close($curl);



			if ($status === 200) {

				return $response;

			} else {

				return $status; //Puede ser 500, 404,  u otro error de respuesta de HTTP

			}

		}

	}



	class DHLJSON {

		public function ShipmentData($args) {

			$RequestedPackages = array();

			$NumberOfPieces = count($args["drugs"]);

			$totalQuantity = 0;

			$patient = $args["patient"];



			$timezone = -5;

			$addDays = 10;

			$today = gmDate("Y-m-d H:i:s", time() + 3600*($timezone+date("I")));

			//echo $today;

			$tmp = new DateTime($today);

			$newDate = $tmp->add(new DateInterval("P".$addDays."D"));

			$newDate = $newDate->format("Y-m-d\TH:i:s")."GMT-05:00";







			foreach ($args['drugs'] as $drug) {

				$tmp = [];

				$totalQuantity += $drug["quantity"];



				$tmp['@number'] = $drug["quantity"];

				$tmp['Weight'] = '0.500';

				$tmp['CustomerReferences'] = $drug["lote"];

				$tmp["Dimensions"] = array(

					'Length' => '100',

					'Width' => '250',

					'Height' => '100',

				);



				array_push($RequestedPackages, $tmp);

			};




			return array (

				'ShipmentRequest' => array (

					'RequestedShipment' => array (

						'ShipmentInfo' =>

						array (

							'DropOffType' => 'REGULAR_PICKUP',

			        'ServiceType' => 'N',

			        'Account' => '988235478',
			        'Currency' => 'MXN',

			        'UnitOfMeasurement' => 'SI',

			        'LabelType' => 'PDF',

			        'SpecialServices' => array (

								'Service' => array (

									0 => array (

										'ServiceType' => 'PT',

									),

								),

							),

						),

						'ShipTimestamp' => $newDate,

						'PaymentInfo' => 'DAP',

						'InternationalDetail' => array (

							'Commodities' => array (

								'NumberOfPieces' => $NumberOfPieces,

			          'Description' => 'Medicamentos',

			          'Quantity' => $totalQuantity,

			          'UnitPrice' => '1',

			          'CustomsValue' => '1',

							),

						),

						'Ship' => array (

							'Shipper' => array (

								'Contact' => array (

									'PersonName' => $patient["name"],

			            'CompanyName' => "No company",

			            'PhoneNumber' => $patient["phone"],

			            'EmailAddress' => empty($patient["email"]) ? "recolecciones@atend.mx" : $patient["email"],

								),

								'Address' => array (

									'StreetLines' => $patient["address"],

									'City' => $patient["city"],

									'PostalCode' => $patient["postal_code"],

									'CountryCode' => $patient["country_code"],

								),

							),

							'Recipient' => array (

								'Contact' => array (

									'PersonName' => 'Atend',

			            'CompanyName' => 'Atend',

			            'PhoneNumber' => '5512091787',

			            'EmailAddress' => 'admin@atend.mx',

								),

								'Address' => array (

									'StreetLines' => "Mariano Escobedo 506",

			            'City' => 'Ciudad de México',

			            'StateOrProvinceCode' => 'CDMX',

			            'PostalCode' => '11590',

			            'CountryCode' => 'MX',

								),

							),

						),

						'Packages' => array (

							'RequestedPackages' => $RequestedPackages,

						),

					),

				),

			);

		}



		public function TrackingShipmentData($args) {



			return array (

				'trackShipmentRequest' => array (

					'trackingRequest' => array (

						'TrackingRequest' => array (

							'Request' => array (

								'ServiceHeader' => array (

									'MessageTime' => gmDate("Y-m-d\TH:i:s\Z", time() + 3600*($timezone+date("I"))),

									'MessageReference' => $args["message_reference"],

								),

							),

							'AWBNumber' => array (

								'ArrayOfAWBNumberItem' => array (

									0 => $args["shipment_id_number"],

								),

							),

							'LevelOfDetails' => 'LAST_CHECK_POINT_ONLY',

							'PiecesEnabled' => 'B',

						),

					),

				),

			);

		}



		public function DeleteShipmentData($args) {

			$timestamp = $args['timestamp'];

			$datetime = new DateTime($timestamp);

			$pickupDate = $datetime->format('Y-m-d\TH:i:s')."-05:00";

			return array (

				'DeleteRequest' =>

				array (

					'PickupDate' => $pickupDate,

					'PickupCountry' => 'MX',

					'DispatchConfirmationNumber' => $args['shipment_id_number'],

					'RequestorName' => 'Atend',

				),

			);

		}

	}

?>

