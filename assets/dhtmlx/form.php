<?php

	include ("codebase/connector/form_connector.php");

	include ("codebase/connector/db_pdo.php");



	$dbtype = "pgsql";								// mysql or pgsql

	$dbhost = "localhost";

	$port	= "5432";								// database server

	$dbname = "dhtmlx";							// database name

	$dbuser = "miracle";							// database user

	$dbpassword = "1q2w3e4r";						// database password 

	$dbcharset = "utf8";							// database charset

	

	//$dsn = "{$dbtype}:host={$dbhost};port={$port};dbname={$dbname};user={$dbuser};password={$dbpassword};charset={$dbcharset}";



	$dbconn = new PDO("{$dbtype}:dbname={$dbname};host={$dbhost}", $dbuser, $dbpassword);

	

	//$dbconn = new PDO($dsn);	



	$data = new FormConnector($dbconn, "PDO");



	function doOnDBError($action, $ex) {

		

		$error_message = $ex->getMessage();

		

		$action->set_response_text($error_message);



	}



	$data->event->attach("OnDBError", doOnDBError);

	

	$data->render_table("alamat", "id", "nama,alamat");