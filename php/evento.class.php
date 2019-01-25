<?php
	//include 'config.php';
	//require("config.php");
	class Eventos{

		private $pdo;
		
		public function __construct(){
			$this->pdo = new PDO("mysql:dbname=u270517400_ag;host=sql177.main-hosting.eu","u270517400_iwebw","ag61218work");
		}

		public function getItens(){
			$sql = "SELECT * FROM events";
			$sql = $this->pdo->query($sql);
			if($sql->rowCount() > 0){
				print_r($this->$itens = $sql->fetchAll());
			}
		}

		
		public function insertEvents($texto,$dataI,$horaI,$dataT,$horaT,$color){
			
			if(!empty($texto) && !empty($dataI)){
				$dthrI = date('Y-m-d',$dataI).strftime('h:m:s',$horaI);
				$dthrT = date('Y-m-d',$dataT).$horaT;
				$sql = "INSERT INTO events (title,color,start,end) VALUES (:texto, :color, :dthrI, :$dthrT)";
				$sql = $this->pdo->prepare($sql);
				$sql->bindValue(':texto',$texto);
				$sql->bindValue(':color',$color);
				$sql->bindValue(':dthrI',$dthrI);
				$sql->bindValue(':dthrT',$dthrT);
				$sql->execute();
				return true;
			}else{
				echo "Por favor os campos evento e data de inicio são obrigatorios";
				return false;
			}
			



		}


	}

?>
















