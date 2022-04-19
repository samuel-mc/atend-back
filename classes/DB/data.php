<?php
class Data
{
	public $production = false;

	public $mail = array(
		"host" => 'hazclink.com',  // Specify main and backup SMTP servers
		"username" => 'promociones@hazclink.com',                 // SMTP username
		"password" => 'Shiosaki.0',                           // SMTP password
		"from" => 'promociones@hazclink.com',
		"from_name" => 'Clink!'
	);

	public $database = array(
		"host" => "127.0.0.1",
		"name" => "admin_logisticatest",
		"user" => "admin_logistica",
		"password" => "Shiosaki.0",
	);

	public $databaseDev = array(
		"host" => "127.0.0.1",
		"name" => "atend_db",
		"user" => "root",
		"password" => ""
	);

	public $costs = array(
		"shipping" => "0"
	);
}
