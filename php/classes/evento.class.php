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
		private $start_date;
		private $start_hora;
		private $fim_date;
		private $fim_hora;
		private $info_add;
		private $status; // 0 = aberto, 1 = finalizado
		private $pet; // id do pet
		private $itens;



		public function getItens(){
			$sql = "SELECT * FROM eventos";
			$sql = $this->pdo->query($sql);
			if($sql->rowCount() > 0){
				print_r($this->$itens = $sql->fetchAll());
			}
		}

		
		public function insertEvents($titulo,$dataI,$horaI,$dataT,$horaT,$info,$status,$pet){
			
			if(!empty($pet) && (!empty($dataI) && !empty($horaI)) ){
				//$dthrI = date('Y-m-d',$dataI).strftime('h:m:s',$horaI);
				//$dthrT = date('Y-m-d',$dataT).$horaT;
				//$dthrI = $dataI."".$horaI;
				//$dthrT = $dataT."".$horaT;

				if(!empty($titulo)){
					if ($titulo == 1) {
						$evento = "Vacina";
						$cor = "#FFFF00";//Amarelo

					}else if($titulo == 2){
						$evento = "Banho e tosa";
						$cor = "#0000FF";//Azul

					}
					$sql = "INSERT INTO eventos (title,color,start_date,start_hora,fim_date,fim_hora,info_add,status,id_pet) VALUES (:evento, :cor, :dtI, :hrI,:dtT,:hrT, :info_add,:status,:pet)";
					$sql = $this->pdo->prepare($sql);

					//echo $evento." ".$cor." ".$dthrI." ".$dthrT." ".$info." ".$status." ".$pet;
					$sql->bindValue(':evento',$evento);
					$sql->bindValue(':cor',$cor);
					$sql->bindValue(':dtI',$dataI);
					$sql->bindValue(':hrI',$horaI);
					$sql->bindValue(':dtT',$dataT);
					$sql->bindValue(':hrT',$horaT);
					$sql->bindValue(':info_add',$info);
					$sql->bindValue(':status',$status);
					$sql->bindValue(':pet',$pet);
					//$sql->execute();
					if ($sql->execute()) {
						header("Location: ../index.php");
					}else{
						echo "Erro";
					}
					
				}else {
					echo "Erro, valor desconhecido";
				}

			}else{
				echo "Por favor os campos evento e data de inicio são obrigatorios";
			}

		}

		public function eventosDoDia(){
			date_default_timezone_set('UTC');
			date_default_timezone_get('America/Sao_Paulo');

			$ano_mes_dia = date("o-m-d");

			//echo $ano_mes_dia.'<br>';
			
			$sql = "SELECT * FROM eventos WHERE start_date = :data ORDER BY start_date";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':data',$ano_mes_dia);
			//echo "Checou aqui primeiro";
			$sql->execute();
			if($sql->rowCount() > 0){
				//echo "Chegou aqui";
				$values = $sql->fetchAll();
				if (!empty($values)) {
					return $values;
					
				}else{
					echo "A busca falhou";
				}
				
			}

		}

		public function eventosDaHora(){

			//$dia_atual = date("d");
			//$mes_atual = date("m");
			//$ano_atual = date("o");
			//echo $dia_atual.'<br>';
			//echo $mes_atual.'<br>';
			//echo $ano_atual.'<br>';

			$ano_mes_dia = date("o-m-d");
			$hora_atual = date("H");
			echo $hora_atual;

			
			/*$sql = "SELECT * FROM eventos WHERE start_date = :data ORDER BY start_date";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':data',$ano_mes_dia);
			//echo "Checou aqui primeiro";
			$sql->execute();
			if($sql->rowCount() > 0){
				//echo "Chegou aqui";
				$values = $sql->fetchAll();
				if (!empty($values)) {
					return $values;
					
				}else{
					echo "A busca falhou";
				}
				
			}*/

		}

		public function eventosDoPet($value)
		{
			$sql = "SELECT * FROM eventos WHERE id_pet = :id_pet";
			$sql = $this->pdo->prepare($sql);
			if (!empty($value)) {
				$sql->bindValue(':id_pet',$value);
				//echo "Checou aqui primeiro";
				$sql->execute();
				if ($sql->rowCount() > 0) {
					$dados = $sql->fetchAll();
					return $dados;
				}
			}
			
		}

		public function strEventosFicha($value)
		{
			if (!empty($value)) {
				foreach ($value as $dados) {
					$dataInicial = new DateTime($dados['start_date']);
					$horaInicial = new DateTime($dados['start_hora']);
					$dataFinal = new DateTime($dados['fim_date']);
					$final =$dataFinal->format('d/m/Y'); 
					if ( $final == "30/11/-0001") {
						$strDataFinal = "Não foi Especificado";
					}else{
						$strDataFinal = $final;
					}
					if ($dados['status'] == 0) {
						$strStatus = "Aberto";
					}else{
						$strStatus = "Encerrado";
					}
					echo '<div class="">'. 
							'<div class="">'.
								'<p><t class="">Evento:</t> '.$dados['title'].'</p>'.
							 '</div>'.
							 '<div class="">'.
								'<p><t class="">Data de inicio:</t> '.$dataInicial->format('d/m/Y').
							 '</div>'.
							 '<div class="">'.
								'<p><t class="">Hora de Inicio:</t> '.$horaInicial->format('H:m:s').
							 '</div>'.
							 '<div class="">'.
								'<p><t class="">Data de Termino:</t> '.$strDataFinal.
							 '</div>'.
							 '<div class="">'.
								'<p><t class="font-weight-bold">Status:</t> '.$strStatus.
							 '</div>'.
						  '</div>';
				}
			}else{
				echo "Erro ao mandar os dados";
			}
		}


	}



?>
















