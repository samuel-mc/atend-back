<?php
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
	header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
	include '../classes/LoadModels.php';
	$admin = new Model;
	$res = $admin->files->UploadImage();
	echo json_encode($res);
