<?php
	
	$dsn = "mysql:dbname=u270517400_ag;host=sql177.main-hosting.eu";
	$dbuser = "u270517400_iwebw";
	$dbpass = "ag61218work";

	try{
		$pdo = new PDO($dsn, $dbuser, $dbpass);
	}catch(PDOException $e){
		echo "Falhou: ".$e->getMessage();
		exit;
	}

?>
