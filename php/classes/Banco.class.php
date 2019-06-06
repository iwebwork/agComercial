<?php
	class Banco{
		protected $pdo;
		
		public function __construct(){
			//$this->pdo = new PDO("mysql:dbname=u270517400_ag;host=sql177.main-hosting.eu","u270517400_iwebw	","ag61218work");
			$this->pdo = new PDO("mysql:dbname=u270517400_ag;host=127.0.0.1","root","");
		}

	}

	            