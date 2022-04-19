<?php  

	class Users extends Admin
	{
		public $logModel;
		
		function __construct()
		{
			parent::__construct();
			$this->logModel = new Log;
		}

		public function Save(Request $data)
		{
			$d = $data->extract(["name","email","type"]);
			$user = $this->GetFirst($this->query->select("*",self::TABLE_USERS,"email = '".$data->get("email")."'"));
			$d["status"] = 1;
			if ($user!=null && $data->get("email")!=$user['email'])
				return ["success"=>false,"message"=>"Ya existe un usuario registrado con este correo"];
			$pass = md5($data->get("password"));
			$d["password"] = $pass;

			$usr = $this->Insert(self::TABLE_USERS,$d,"all");
			return ["success"=>true,"data"=>$usr['data']];

			/*if ($data->id==null){
				$d["status"] = 4;
				$d["type"] = 1;
				if ($data->get("name")!=null){
					$usr = $this->Insert(self::TABLE_USERS,$d,"all");
					return ["success"=>true,"data"=>$usr['data']];
				}else{
					return ["success"=>false,""];
				}
			}else{*/
				//$this->Save(self::TABLE_USERS,$d,$data->id);
				//return ["success"=>true];
			//}
		}

		public function Login($data)
		{
			$user = $this->query->select("*",self::TABLE_USERS,"email = '".$data->get('email')."' AND password = '".md5($data->get("password"))."' AND (status = 1 OR status = 4)");
			$user = $this->GetFirst($user);
			if ($user==null){
				return ["login"=>false,"message"=>"Datos incorrectos"];
			}else{
				if ($user["status"]!=4){
					$_SESSION['login'] = 1;
					$_SESSION['start'] = time();
					$user['pass'] = "Qué miras, puto";
					$user['password'] = $user['pass'];
				}
				if (session_status() !== PHP_SESSION_ACTIVE)
						session_start();
				$_SESSION['user'] = $user;
				$user['login'] = true;
				return $user;
			}
		}

		public function List()
		{
			$us = $this->ViewList(self::TABLE_USERS,"status != 3");
			/*$res = array();
			foreach ($us as $u) {
				$u['company'] = $this->GetById(self::TABLE_COMPANIES,$u['company_id'])['name'];
				$res[] = $u;
			}*/
			return $us;
		}

		public function Read(Request $data)
		{
			return $this->success($this->GetById(self::TABLE_USERS,$data->id));
		}
		
		public function Delete(Request $data)
		{
			$delete = $this->Save(self::TABLE_USERS,[
				"status"=>3
			],$data->id);
			return $this->success($delete);
		}

		public function Update(Request $data)
		{	
			$d = $data->extract(["name","email","type"]);
			$update = $this->Save(self::TABLE_USERS,$d,$data->id);
			return $this->success($update);
		}

		public function ChangePassword(Request $data)
		{
			if (session_status() !== PHP_SESSION_ACTIVE)
				session_start();
			$user_id = $_SESSION['user']['id'];
			$user = $this->GetFirst("SELECT * FROM ".self::TABLE_USERS." WHERE id = ".$user_id);
			$pass_md5 = md5($data->get("password"));
			$this->Save(self::TABLE_USERS,["password"=>$pass_md5,"status"=>1],$user_id);
			
			$_SESSION['login'] = 1;
			$_SESSION['start'] = time();
			$user['pass'] = "Qué miras, puto";
			$user['password'] = $user['pass'];
			return $user;
		}



	}

?>