<?php  
	class Model
	{
		public $services;

		function __construct()
		{
			require "admin.php";
			require "Models/Services.php";
			$this->services = new Services;
		}
	}

?>