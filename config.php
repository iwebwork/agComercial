<?php
	
	$dsn = "mysql:dbname=agcomercial;host=127.0.0.1";
	$dbuser = "root";
	$dbpass = "";

	try{
		$pdo = new PDO($dsn, $dbuser, $dbpass);
	}catch(PDOException $e){
		echo "Falhou: ".$e->getMessage();
		exit;
	}

?>
