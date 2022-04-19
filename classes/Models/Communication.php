<?php  

	class Communication extends Admin
	{
		public $apiInstance;

		function __construct()
		{
			parent::__construct();
			require_once(__DIR__ . '/../sendinblue/vendor/autoload.php');
			$config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');
			$this->apiInstance = new SendinBlue\Client\Api\TransactionalEmailsApi(
			    new GuzzleHttp\Client(),
			    $config
			);
		}

		public function SMS($phone="+525514790052",$content="CONTENIDO DE PRUEBA")
		{
			require_once(__DIR__ . '/../sendinblue/vendor/autoload.php');
			$config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');

			$apiInstance = new SendinBlue\Client\Api\TransactionalSMSApi(
			    new GuzzleHttp\Client(),
			    $config
			);
			if (strlen($phone)>10&&strlen($phone)!=13){
				$phone = str_replace(" ", "", $phone);
			}
			if (strlen($phone)==10){
				$phone = "+52".$phone;
			}
			$sendTransacSms = new \SendinBlue\Client\Model\SendTransacSms();
			$sendTransacSms['sender'] = 'ATEND';
			$sendTransacSms['recipient'] = $phone;
			$sendTransacSms['content'] = $content;
			$sendTransacSms['type'] = 'transactional';
			//$sendTransacSms['webUrl'] = 'https://example.com/notifyUrl';
			$success = false;
			try {
			    $result = $apiInstance->sendTransacSms($sendTransacSms);
			    //print_r($result);
			    $success = true;
			} catch (Exception $e) {
			    //echo 'Exception when calling TransactionalSMSApi->sendTransacSms: ', $e->getMessage(), PHP_EOL;
				$result = $e->getMessage();
			}
			return ["success"=>$success,"message"=>$result];
		}



		public function Email($email,$name, $content, $subject)
		{
			$sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail();
			$sendSmtpEmail['subject'] = $subject;
			$sendSmtpEmail['htmlContent'] = $content;
			$sendSmtpEmail['sender'] = array('name' => 'ATEND Logistica', 'email' => 'logistica@atend.mx');
			if (is_array($email)){
				$a = array();
				foreach ($email as $em) {
					array_push($a,['email'=>$em,"name"=>$name]);
				}
				$sendSmtpEmail['to'] = $a;
			}else{
				$sendSmtpEmail['to'] = array(
				    array('email' => $email, 'name' => $name)
				);
			}

			$sendSmtpEmail['replyTo'] = array('email' => 'replyto@domain.com', 'name' => 'John Doe');
			$sendSmtpEmail['headers'] = array('almacen' => uniqid());
			//$sendSmtpEmail['params'] = array('parameter' => 'My param value', 'subject' => 'New Subject');
			$success = false;
			try {
			    $result = $this->apiInstance->sendTransacEmail($sendSmtpEmail);
			    //print_r($result);
			    $success = true;
			} catch (Exception $e) {
			    //echo 'Exception when calling TransactionalEmailsApi->sendTransacEmail: ', $e->getMessage(), PHP_EOL;
				$result = $e->getMessage();
			}
			return ["success"=>$success,"message"=>$result];

		}

		public function rand_pass( $length ) {
		    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		    return substr(str_shuffle($chars),0,$length);
		}

		public function SendRestorePassword(Request $data)
		{
			$email = $data->get("email");
			$pass = $this->rand_pass(6);
			$pass_md5 = md5($pass);
			$user = $this->query->select("*", self::TABLE_USERS, "email = '".$email."'");
			$user = $this->GetFirst($user);
			if ($user!=null){
				$content = '<html><body>
					<span>Hola '.$user['name'].'</span>
					<br>
					<span>Te enviamos una contraseña temporal, utilízala y cuando inicies sesión te pediremos que la cambies por una nueva.</span>
					<br><br>
					Tu contraseña temporal es: <h5>'.$pass.'</h5>
					Ingresa a <a href="https://attend.mx/porti/admin/login">este link</a> para cambiar tu contraseña.
					<span>Esperamos tengas un gran dia.</span>
					<br>
					<span>Por Ti</span>
					<span>Roche</span>
				</body></html>';
				$res = $this->Email($user['email'],$user['name'],$content,'Recuperar contraseña');
				$this->Save(self::TABLE_USERS,["password"=>$pass_md5,"status"=>4],$user['id']);
				return $res;	
			}else{
				return ["success"=>false,"message"=>"No existe el correo solicitado"];
			}
		}


		public function SendSMSToPatient(Request $data)
		{
			$delivery_id = $data->get("delivery_id");
			$delivery = $this->query->select("*", self::TABLE_DELIVERIES, "id = ".$delivery_id);
			$data = $this->GetFirst($delivery);
			$url = 'https://attend.mx/porti/recept-vials/'.$delivery_id;
			$content = 'Se ha programado una entrega "Por ti" de Roche para el dia '.$data['date'].'. Al recibirlo, favor de subir evidencia de recepcion en: '.$url;
			$delivery = $this->query->select("*", self::TABLE_DELIVERIES, "id = ".$delivery_id);
			$data = $this->GetFirst($delivery);
			$data['patient'] = $this->GetById(self::TABLE_PATIENTS,$data['patient_id']);
			$res = $this->SMS($data['patient']['phone'],$content);
			return $res;
		}



		public function SendChangeDateSMSToPatient(Request $data)
		{
			$delivery_id = $data->get("delivery_id");
			$delivery = $this->query->select("*", self::TABLE_DELIVERIES, "id = ".$delivery_id);
			$data = $this->GetFirst($delivery);
			$url = 'https://attend.mx/porti/recept-vials/'.$delivery_id;
			$content = 'Tu fecha de entrega para el programa "Por Ti" de Roche ha sido cambiada a '.$data['date'].'. Al recibirlo, favor de subir evidencia de recepcion en: '.$url;
			$delivery = $this->query->select("*", self::TABLE_DELIVERIES, "id = ".$delivery_id);
			$data = $this->GetFirst($delivery);
			$data['patient'] = $this->GetById(self::TABLE_PATIENTS,$data['patient_id']);
			$this->SMS($data['patient']['phone'],$content);
		}



		public function SendCancelSMSToPatient(Request $data)
		{
			$delivery_id = $data->get("delivery_id");
			$delivery = $this->query->select("*", self::TABLE_DELIVERIES, "id = ".$delivery_id);
			$data = $this->GetFirst($delivery);
			$url = 'https://attend.mx/porti/recept-vials/'.$delivery_id;
			$content = 'Se ha cancelado el envio programado para el programa "Por Ti" de Roche. Cualquier duda comunicarse al 800 909 8500.';
			$delivery = $this->query->select("*", self::TABLE_DELIVERIES, "id = ".$delivery_id);
			$data = $this->GetFirst($delivery);
			$data['patient'] = $this->GetById(self::TABLE_PATIENTS,$data['patient_id']);
			$this->SMS($data['patient']['phone'],$content);
		}





		public function SendInfoToStore(Request $data)
		{

			$delivery_id = $data->get("delivery_id");
			$delivery = $this->query->select("*", self::TABLE_DELIVERIES, "id = ".$delivery_id);
			$data = $this->GetFirst($delivery);
			$sent = $data['email_sent'];
			$delivery_drugs = $this->query->select("*", self::TABLE_DELIVERY_DRUGS, "delivery_id = ".$data['id']);
			foreach ($this->GetAllRows($delivery_drugs) as $delivery_drug) {
				$drug = $this->GetById(self::TABLE_DRUGS, $delivery_drug['drug_id']);
				$drug['name'] = $this->GetById(self::TABLE_DRUG_NAMES, $drug['name_id']);
				$drug['concentration'] = $this->GetById(self::TABLE_DRUG_CONCENTRATION, $drug['concentration_id']);
				$drug['quantity'] = $delivery_drug['quantity'];
				$drugs[] = $drug;
			}

			$sel_docs = $this->query->select("*", self::TABLE_DOCUMENTS, "type = 20 AND delivery_id = " . $delivery_id);
			$guide = $this->GetFirst($sel_docs);
			$sel_docs = $this->query->select("*", self::TABLE_DOCUMENTS, "type != 20 AND delivery_id = " . $delivery_id);
			$docs = $this->GetAllRows($sel_docs);
			$auth_user =  $this->query->select("*", self::TABLE_AUTH_USERS, "delivery_id = ".$data['id']);
			$data['auth_users'] = $this->GetAllRows($auth_user);
			$data['drugs'] = $drugs;
			$data['patient'] = $this->GetById(self::TABLE_PATIENTS,$data['patient_id']);
			$dr_subject = "";

			$content = '<html><body>
				<span>Se ha creado una nueva solicitud de medicamento. A continuación el detalle del medicamento:</span>
				<br>
				<ul>';
			foreach ($drugs as $dr) {
				$dr_subject = $dr['name']['name'];
				$content.='<li>'.$dr['quantity'].' pza - '.$dr['name']['name'].' '.$dr['concentration']['name'].' - Lote '.$dr['lote'].'</li>';
			}
			$content.='</ul>
			<br>
			<span><strong>El No. de Reserva en SAP es:</strong> '.$data['folio'].'</span>
			<br>
			<br>
			<span><strong>Entrega en:</strong> '.$data['patient']['address_place'].
			'<ul>
				<li><strong>Calle: </strong>'.$data['patient']['address'].'</li>
				<li><strong>Colonia: </strong>'.$data['patient']['address_suburb'].'</li>
				<li><strong>Ciudad: </strong>'.$data['patient']['city'].'</li>
				<li><strong>Municipio: </strong>'.$data['patient']['address_municipality'].'</li>
				<li><strong>Delegacion: </strong>'.$data['patient']['address_townhall'].'</li>
				<li><strong>Estado: </strong>'.$data['patient']['state_code'].'</li>
				<li><strong>C.P.: </strong>'.$data['patient']['postal_code'].'</li>
				<li><strong>Referencia interna: </strong>'.$data['patient']['address_reference_int'].'</li>
			</ul><br>';
			$c = 1;
			foreach ($data['auth_users'] as $au) {
				$content.='<strong>Persona Autorizada para recibir '.$c.': </strong>'.$au['name'].'<br>';
				$c++;
			}

			$diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");
			$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
			$fecha_sin_formato = strtotime($data['date']); 
			$fecha_formato = $diassemana[date('w',$fecha_sin_formato)]." ".date('d',$fecha_sin_formato)." de ".$meses[date('n',$fecha_sin_formato)-1]. " ".date('Y',$fecha_sin_formato);

			$content.='<br>
			<span><strong>Fecha entrega esperada:</strong> '.$fecha_formato.'</span>
			<span><strong> Horario</strong>: '.$data['schedule'].'</span><br> 
			<br>
			Cualquier cosa, favor de dirigirse al teléfono 800 909 8500.
			<br>
			<br>
			<span>A continuación los documentos relacionados::</span>
			<br>
			<strong>A imprimir:</strong>
			<br>
			<span>Guias DHL para incluir en la caja (2 copias):<a href="https://attend.mx/porti/'.$guide['url'].'">https://attend.mx/porti/'.$guide['url'].'</a></span>
			<br>
			<span>Instrucciones para programar recoleccion:<a href="https://attend.mx/porti/assets/data/dhl/recoleccion.pdf">https://attend.mx/porti/assets/data/dhl/recoleccion.pdf</a></span>
			<br>
			<br>
			<span><strong>Para registro: </strong></span><br>';
			foreach ($docs as $doc) {
				$content.= '<span style="text-transform:capitalize">'.$doc['name'].': </span> <a href="https://attend.mx/porti/'.$doc['url'].'" target="_blank"> https://attend.mx/porti/'.$doc['url'].'</a><br>';
			}
			$content.='</body></html>';


			$emails = ["edgar.genis@roche.com","amorales@pen.com.mx","ana.garcia@pen.com.mx","christian.alba@pen.com.mx","lesly.munoz@businesspartner.roche.com","maria.pimentel.mp1@businesspartner.roche.com","laura.hernandez@businesspartner.roche.com","aidee.contreras@businesspartner.roche.com","noe.armendariz@contractors.roche.com","bernardo@atend.mx","karen.vazquez@pen.com.mx"];
			$emails_prueba = ["marshal_ico@hotmail.com","marshiozamudio@gmail.com"];

			if ($sent==0){
				$result = $this->Email($emails,"Almacen",$content,'RESERVA #'.$data['folio'].' - '.$dr_subject. ' - Formato de salida de medicamento no destinado a venta ');
				if ($result['success']==true){
					$this->Save(self::TABLE_DELIVERIES,["email_sent"=>true],$delivery_id);
				}
			}else{
				$result = ["success"=>$true,"message"=>"El email ya había sido enviado"];
			}			

			return $result;

		}



		public function SendInfoToPatient(Request $data)

		{

			$delivery_id = $data->get("delivery_id");
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

			$sel_docs = $this->query->select("*", self::TABLE_DOCUMENTS, "type = 20 AND delivery_id = " . $delivery_id);
			$docs = $this->GetFirst($sel_docs);

			$auth_user =  $this->query->select("*", self::TABLE_AUTH_USERS, "delivery_id = ".$data['id']);
			$data['auth_user'] = $this->GetFirst($auth_user);
			$data['drugs'] = $drugs;
			$data['patient'] = $this->GetById(self::TABLE_PATIENTS,$data['patient_id']);

			$content = '<html><body>
				<span>Hola '.$data['patient']['name'].'</span>
				<br>
				<span>Se ha programado una entrega por parte del programa "Por Ti" de Roche para el dia '.$data['date'].'. Se estara entregando lo siguiente:</span>
				<br>
				<ul>';
			foreach ($drugs as $dr) {
				$content.='<li>'.$dr['quantity'].' pza - '.$dr['name']['name'].' '.$dr['concentration']['name'].' Lote '.$dr['lote'].'</li>';
			}
			$content.='</ul>
				<span><u>Es muy importante que, una vez recibido el empaque, nos ayudes a subir una foto al siguiente enlace: <a href="https://attend.mx/porti/recept-vials/'.$data['id'].'">https://attend.mx/porti/recept-vials/'.$data['id'].'.</a></u></span>
				<br>
				<span>Se tiene programada la entrega en un horario de  '.$data['schedule'].', en el siguiente domicilio: '.$data['patient']['address'].' '.$data['patient']['city'].' '.$data['patient']['state_code'].' C.P  '.$data['patient']['postal_code'].'</span>
				<br>';
			if ($data['auth_user']!=null)
				$content .= '<span>Los unicos que pueden recibirlo son: '.$data['auth_user']['name'].'</span>';
			$content.='<br>
				<br><br>	
				Estamos a sus ordenes para asesorarle en relacion al manejo y resguardo del medicamento, le invitamos a revisar el instructivo anexo y/o llamar al numero 800 90 98 500 en donde le podremos asesorar. 
				<br><br>
				<span>¡Excelente dia!</span>
				<br><br>
				<span>Por Ti</span>
				<span>Roche</span>
				<br><br>
				1) Las piezas de medicamento etiquetado como "Original de Obsequio prohibida su venta" fueron entregadas en las condiciones optimas de temperatura, sin muestras evidentes de alteracion y/o  manipulacion que haga dudar de la autenticidad
				<br>
				2) Reconoce y acepta que la permanencia en el programa de adherencia POR TI, esta en vigilancia por su medico tratante quien le indicara en todo momento la mejor terapia disponible para usted
				<br>
				3) Se comprometio a resguardar el material de empaque original, para programar la recoleccion de dicho material por medio de un representante de Roche, quien en su presencia inhabilitara el material y dispondra de el para su destruccion. En caso de no resguardar el material reconocio y acepto  que el beneficio podra ser suspendido de manera indefinida.
				<br><br>
				</body></html>';


				//{{params.parameter}}


				$res = $this->Email($data['patient']['email'],$data['patient']['name'],$content,'Nueva entrega Roche "Por ti"');




				return $res;

		}



		public function SendChangeDateInfoToPatient(Request $data)

		{

			$delivery_id = $data->get("delivery_id");

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



			$sel_docs = $this->query->select("*", self::TABLE_DOCUMENTS, "type = 20 AND delivery_id = " . $delivery_id);

			$docs = $this->GetFirst($sel_docs);



			$auth_user =  $this->query->select("*", self::TABLE_AUTH_USERS, "delivery_id = ".$data['id']);

			$data['auth_user'] = $this->GetFirst($auth_user);

			$data['drugs'] = $drugs;

			$data['patient'] = $this->GetById(self::TABLE_PATIENTS,$data['patient_id']);



			$content = '<html><body>

				<span>Hola '.$data['patient']['name'].'</span>

				<br>

				<span>Se ha reprogramado la entrega por parte del programa "Por Ti" de Roche. La nueva fecha de entrega estimada es para el dia '.$data['date'].'. Se estara entregando lo siguiente:</span>

				<br>

				<ul>';

				foreach ($drugs as $dr) {

					$content.='<li>'.$dr['quantity'].' pza - '.$dr['name']['name'].' '.$dr['concentration']['name'].' Lote '.$dr['lote'].'</li>';

				}

				$content.='</ul>

				<span><u>Es muy importante que, una vez recibido el empaque, nos ayudes a subir una foto al siguiente enlace: <a href="https://attend.mx/porti/recept-vials/'.$data['id'].'">https://attend.mx/porti/recept-vials/'.$data['id'].'.</a></u></span>

				<br>

				<span>Se tiene programada la entrega en un horario de  '.$data['schedule'].', en el siguiente domicilio: '.$data['patient']['address'].' '.$data['patient']['city'].' '.$data['patient']['state_code'].' C.P  '.$data['patient']['postal_code'].'</span>

				<br>';

				if ($data['auth_user']!=null)

					$content .= '<span>Los unicos que pueden recibirlo son: '.$data['auth_user']['name'].'</span>';

				$content.='<br>

				<br>

				<br>
				Estamos a sus ordenes para asesorarle en relacion al manejo y resguardo del medicamento, le invitamos a revisar el instructivo anexo y/o llamar al numero 800 90 98 500 en donde le podremos asesorar. 

				<br>
				<br>
				
				<span>¡Excelente dia!</span>

				<br><br>

				<span>Por Ti</span>

				<span>Roche</span>

				<br><br>

				1) Las piezas de medicamento etiquetado como "Original de Obsequio prohibida su venta" fueron entregadas en las condiciones optimas de temperatura, sin muestras evidentes de alteracion y/o  manipulacion que haga dudar de la autenticidad

				<br>

				2) Reconoce y acepta que la permanencia en el programa de adherencia POR TI, esta en vigilancia por su medico tratante quien le indicara en todo momento la mejor terapia disponible para usted

				<br>

				3) Se comprometio a resguardar el material de empaque original, para programar la recoleccion de dicho material por medio de un representante de Roche, quien en su presencia inhabilitara el material y dispondra de el para su destruccion. En caso de no resguardar el material reconocio y acepto  que el beneficio podra ser suspendido de manera indefinida.

				<br><br>


			</body></html>';



			//{{params.parameter}}



			$this->Email($data['patient']['email'],$data['patient']['name'],$content,'Cambio de fecha entrega Roche "Por ti"');





			return $this->success($content);

		}



		public function SendCancelToPatient(Request $data)
		{
			$delivery_id = $data->get("delivery_id");
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


			$sel_docs = $this->query->select("*", self::TABLE_DOCUMENTS, "type = 20 AND delivery_id = " . $delivery_id);
			$docs = $this->GetFirst($sel_docs);
			$auth_user =  $this->query->select("*", self::TABLE_AUTH_USERS, "delivery_id = ".$data['id']);
			$data['auth_user'] = $this->GetFirst($auth_user);
			$data['drugs'] = $drugs;
			$data['patient'] = $this->GetById(self::TABLE_PATIENTS,$data['patient_id']);

			$content = '<html><body>
				<span>Hola '.$data['patient']['name'].'</span>
				<br>
				<span>Lamentamos los problemas que esto pueda causar. En caso de haber algun error o de tener alguna duda, favor de dirigirte al telefono 800 909 8500 para resolverlo lo antes posible.</span>
				<br><br>';
				$content.='<span>Esperamos tengas un gran dia.</span>
				<br>
				<span>Por Ti</span>
				<span>Roche</span>
			</body></html>';
			//$this->Email($data['patient']['email'],$data['patient']['name'],$content,'Nueva entrega Roche "Por ti"');
			return $this->success($content);
		}

	}



?>