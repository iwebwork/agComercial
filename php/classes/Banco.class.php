<?php
	class Banco{
		protected $pdo;
		
		public function __construct(){
			$this->pdo = new PDO("mysql:host=127.0.0.1;dbname=u270517400_ag;charset=utf8","root","");
		}

	}

	            