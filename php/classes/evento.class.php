<?php
	//include 'config.php';
	//require("config.php");
	class Eventos{

		private $pdo;

		
		public function __construct(){
			$this->pdo = new PDO("mysql:dbname=u270517400_ag;host=sql177.main-hosting.eu","u270517400_iwebw","ag61218work");
			//$this->pdo = new PDO("mysql:dbname=u270517400_ag;host=127.0.0.1;charset=utf8","root","");
		}

		//Dados dos Eventos
		//id_evento, titulo = Vacina,Banho e tosa, color (Se for: 1 = Vacina(Amarelo). 2 = Banho e tosa(Azul)), dia/mes/ano hora_inicio,
		//dia/mes/ano hora_termino(Opcional), info_add,status(0 = aberto, 1 = finalizado) ,pet

		private $id_evento;
		private $titulo; //Vacina, Banho e tosa
		private $color; // Vacina = Amarelo, Banho e tosa = Azul
		private $start;
		private $fim;
		private $info_add;
		private $status; // 0 = aberto, 1 = finalizado
		private $pet; // id do pet



		public function getItens(){
			$sql = "SELECT * FROM events";
			$sql = $this->pdo->query($sql);
			if($sql->rowCount() > 0){
				print_r($this->$itens = $sql->fetchAll());
			}
		}

		
		public function insertEvents($titulo,$dataI,$horaI,$dataT,$horaT,$info,$status,$pet){
			
			if(!empty($pet) && (!empty($dataI) && !empty($horaI)) ){
				//$dthrI = date('Y-m-d',$dataI).strftime('h:m:s',$horaI);
				//$dthrT = date('Y-m-d',$dataT).$horaT;
				$dthrI = $dataI." ".$horaI;
				$dthrT = $dataT." ".$horaT;

				if(!empty($titulo)){
					if ($titulo == 1) {
						$evento = "Vacina";
						$cor = "#FFFF00";//Amarelo

					}else if($titulo == 2){
						$evento = "Banho e tosa";
						$cor = "#0000FF";//Azul

					}
					$sql = "INSERT INTO events (title,color,start,fim,info_add,status,pet) VALUES (:evento, :cor, :dthrI, :$dthrT, :info_add,:status,:pet)";
					$sql = $this->pdo->prepare($sql);

					echo $evento." ".$cor." ".$dthrI." ".$dthrT." ".$info." ".$status." ".$pet;
					$sql->bindValue(':evento',$evento);
					$sql->bindValue(':cor',$cor);
					$sql->bindValue(':dthrI',$dthrI);
					$sql->bindValue(':dthrT',$dthrT);
					$sql->bindValue(':info_add',$info);
					$sql->bindValue(':status',$status);
					$sql->bindValue(':pet',$pet);
					//if($sql->execute()){
						//echo "Funcionou";
					//}else{
						//echo "Erro";
					//}
					
				}else {
					echo "Erro, valor desconhecido";
				}

			}else{
				echo "Por favor os campos evento e data de inicio são obrigatorios";
			}

		}


	}

?>
















