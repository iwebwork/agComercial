<?php
	include_once 'Banco.class.php';
	
	class Eventos extends Banco{

		
		public function __construct(){
			parent::__construct();
		}

		//Dados dos Eventos
		//id_evento, titulo = Vacina,Banho e tosa, color (Se for: 1 = Vacina(Amarelo). 2 = Banho e tosa(Azul)), dia/mes/ano hora_inicio,
		//dia/mes/ano hora_termino(Opcional), info_add,status(0 = aberto, 1 = finalizado) ,pet

		private $id_evento;
		private $titulo; //Vacina = 1, Banho e tosa = 2, Vernifugo = 3
		private $color; // Vacina = Amarelo, Banho e tosa = Azul, Vernifugo = Verde
		private $start_date;
		private $start_hora;
		private $fim_date;
		private $fim_hora;
		private $info_add;
		private $status; // 0 = aberto, 1 = finalizado
		private $pet; // id do pet
		private $itens;


		public function strReturnStatus($status)
		{	
			if($status == 0){
				return "Aberto";
			}else if($status == 1){
				return "Encerrado";
			}else{
				echo "Status esta vindo vazio";
			}
		}
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

					}else if($titulo == 3){
						$evento = "Vernifugo";
						$cor = "#008000";//Verde

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
			//date_default_timezone_get('America/Sao_Paulo');

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
				
				return $values;
				
			}

		}

		public function eventosDaHora(){
			date_default_timezone_set('America/Sao_Paulo');
			//$dia_atual = date("d");
			//$mes_atual = date("m");
			//$ano_atual = date("o");
			//echo $dia_atual.'<br>';
			//echo $mes_atual.'<br>';
			//echo $ano_atual.'<br>';

			$ano_mes_dia = date("o-m-d");
			$hora_atual = date("H");
			$minuto_atual = date("m");
			$segundos_atual = date("s");
			echo $hora_atual.":".$minuto_atual.":".$segundos_atual;

			
			$sql = "SELECT * FROM eventos WHERE start_hora = :hora";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':hora',$hora_atual);
			//echo "Checou aqui primeiro";
			$sql->execute();
			if($sql->rowCount() > 0){
				//echo "Chegou aqui";
				$values = $sql->fetchAll();
				if (!empty($values)) {
					return $values;
					
				}else{
					//echo "Não tem eventos no momento";
				}
				
			}

		}

		public function todosEventosDoPet($value)
		{
			$sql = "SELECT * FROM eventos WHERE id_pet = :id_pet ORDER BY status";
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

		public function eventosAbertosDoPet($value)
		{
			$status = 0;
			$sql = "SELECT * FROM eventos WHERE id_pet = :id_pet AND  status = :status";
			$sql = $this->pdo->prepare($sql);
			if (!empty($value)) {
				$sql->bindValue(':id_pet',$value);
				$sql->bindValue(':status',$status);
				//echo "Checou aqui primeiro";
				$sql->execute();
				if ($sql->rowCount() > 0) {
					$dados = $sql->fetchAll();
					return $dados;
				}
			}
			
		}

		public function eventosEncerradoDoPet($value)
		{
			$status = 1;
			$sql = "SELECT * FROM eventos WHERE id_pet = :id_pet AND  status = :status";
			$sql = $this->pdo->prepare($sql);
			if (!empty($value)) {
				$sql->bindValue(':id_pet',$value);
				$sql->bindValue(':status',$status);
				//echo "Checou aqui primeiro";
				$sql->execute();
				if ($sql->rowCount() > 0) {
					$dados = $sql->fetchAll();
					return $dados;
				}
			}
			
		}

// Funções para escrever na tela

		public function strAlert($value)
		{
			//print_r($value);
			$str = 
			'<div class="modal" tabindex="-1" role="dialog">
			  	<div class="modal-dialog" role="document">
			    	<div class="modal-content">
			      		<div class="modal-header">
				        	<h5 class="modal-title">Modal title</h5>
				        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          		<span aria-hidden="true">&times;</span>
				        	</button>
			      		</div>
				      	<div class="modal-body">
				        	<p>Modal body text goes here.</p>
				      	</div>
				      	<div class="modal-footer">
				        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
				      	</div>
			    	</div>
			  	</div>
			</div>';
		}

		public function deletarEvento($value)
		{	
			
			if (!empty($value)) {
				$sql = "DELETE FROM eventos WHERE id_evento = :id_evento";
				$sql = $this->pdo->prepare($sql);
				$sql->bindValue(':id_evento',$value);
				if($sql->execute()){
					return true;
				}else{
					return false;
				}

			}else{
				echo "Esse evento ja foi deletado";
			}

		}

		public function strExibirEventosDoDia($value)
		{
			include_once 'dataHora.class.php';
			//include 'proprietario.class.php';
			$pet = new Pet();
			$prop = new proprietario();
			$data = new dataHora();

			//print_r($value);
			if(!empty($value)){
				foreach ($value as $dados) {
					# code...
					$pet->setNomeIDPet($dados['id_pet']);
					$pet->setIDProprietarioPeloIdPet($dados['id_pet']);
					$prop->setNomePeloId($pet->getIdProp());
					$prop->setTelPeloId($pet->getIdProp());
					$str = '<ul class="list-group text-center">
								<li class="list-group-item">Data: '.
									$data->foramatoData($dados['start_date']).'
								</li>
							  	<li class="list-group-item">Pet: '.$pet->getNome().' / Dono: '.
							  		$prop->getNome().'
							  	</li>
							  	<li class="list-group-item">'.$dados['title'].'</li>
							  	<li class="list-group-item">Hora de Inicio:'.$dados['start_hora'].'</li>
							  	<li class="list-group-item">Hora Termino: '.$dados['fim_hora'].'</li>
							  	<li class="list-group-item">Telefone: '.$prop->getTel().'</li>
							  	<li class="list-group-item">Status: '.
							  		$this->strReturnStatus($dados['status']).'
							  	</li>
							  	<li class="list-group-item">Informações do evento: '.
							  		$dados['info_add'].'
							  	</li>
							  	<li class="list-group-item">'.
							  		'<form method="POST" action="php/desmarcarEvento.php">'.
							  			'<input type="hidden" name="idConsulta" value="'.$dados['id_evento'].'">'.
							  			$this->strButtonEventoVeriIf($dados['status']).
							  		'</form>'.
							  	'</li>
							</ul>';
					echo $str;
				}
			}else{
				echo  '<div class="alert alert-info">
						  Não temos eventos marcados para hoje</a>.
					  </div>';
			}
		}


		public function strButtonEventoVeriIf($value)
		{
			if ($value == 0) {
				return '<button type="submit" class="btn btn-primary">Encerrar</button>';
			}else{
				return '<button type="submit" class="btn btn-primary" disabled>Encerrado</button>';
			}
		}


		public function strEventosFicha($value)
		{
			
			if (!empty($value)) {
				foreach ($value as $dados) {
					$dataInicial = new DateTime($dados['start_date']);
					$horaInicial = new DateTime($dados['start_hora']);
					$dataFinal = new DateTime($dados['fim_date']);
					$horaFinal = new DateTime($dados['fim_hora']);
					$final = $dataFinal->format('d/m/Y'); 
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
					if( $horaFinal->format('H:m') == "00:05"){
						$strHoraFinal = "Não foi Especificado";
					}else{
						//echo "foi especificado";
						$strHoraFinal = $horaFinal->format('H:m');
					}
					$str = '<div class="linha">'. 
								'<pre class="">'.
									'Evento: '.$dados['title'].'                     Status: '.$strStatus.
								'</pre>'.
								'<hr>'.
								'<pre class="">'.
									'Data de inicio:</t> '.$dataInicial->format('d/m/Y').
								'</pre>'.
								'<pre class="">'.
									'Hora de Inicio:</t> '.$horaInicial->format('H:m').
								'</pre>'.
								'<pre class="">'.
									'Data de termino:</t> '.$strDataFinal.
								'</pre>'.
								'<pre class="">'
									.'Hora de termino:</t>'.$strHoraFinal.
								'</pre>'.
								'<pre class="">'
									.'Informações adicionais: </t>'.$dados['info_add'].
								'</pre>'.
							'</div>';
					echo $str;
				}
			}else{
				
			}
		}

		public function strHoraFinal($var)
		{
			if($var == '00:00:00'){
				return 'Não foi especificado';
			}else{
				$valor = strtotime($var);
				$v = date("H:i",$valor); 
				return $v;			
			}
		}
		public function strDataFinal($var)
		{
			if($var == '30/11/-0001'){
				return 'Não foi especificado';
			}else{
				$valor = strtotime($var);
				$v = date("d/m/Y",$valor); 
				return $v;			
			}
		}

		public function strListaEventosPet($nomePet,$value)
		{
			date_default_timezone_set('UTC');
			include_once 'dataHora.class.php';
			$data = new dataHora();
			//date_default_timezone_get('America/Sao_Paulo');
			if(!empty($value)){
				$tCabe =
					'<table id="mytable" class= "table p-3 mb-2 border border-primary table-bordered">'.
													
						'<thead class="text-center table-stripe bg-primary text-white">'.
							'<th class="text-center">Pet</th>'.
							'<th class="text-center">Evento</th>'.
							'<th class="text-center">Status</th>'.
							'<th class="text-center">Data - Hora Inicio</th>'.
							'<th class="text-center">Data - Hora Termino</th>'.
							'<th class="text-center">Consulta</th>'.
							'<th class="text-center">Excluir</th>'.
						'</thead>';

				echo $tCabe;

				foreach($value as $itens){
					//print_r($itens);

					$strDataInicio = strtotime($itens['start_date']);
					$strDataFim = strtotime($itens['fim_date']);
					$strHoraInicio = strtotime($itens['start_hora']);
					

					$dataInicio = date("d/m/Y" , $strDataInicio);
					$dataFim = date("d/m/Y" , $strDataFim);
					$horaInicio = date("H:m",$strHoraInicio);
					$td =	'<tbody class = "text-center">'.
								'<tr>'. 
									'<td>'.
										'<div class="form-check form-check-inline">'.
												$nomePet.
										'</div>'.
									'</td>'.
									'<td>'.
										'<div class="form-check form-check-inline">'.
												$itens['title'].
										'</div>'.
									'</td>'.
									'<td>'.
										'<div class="form-check form-check-inline">'.
											$this->strReturnStatus($itens['status']).
										'</div>'.
									'</td>'.
									'<td>'.
										'<div class="form-check form-check-inline">'.
												$dataInicio.' - '.$horaInicio.
										'</div>'.
									'</td>'.
									'<td>'.
										'<div class="form-check form-check-inline">'.
											$dataFim.' - '.$this->strHoraFinal($itens['fim_hora']).
												
										'</div>'.
									'</td>'.
									'<td>'.
										'<div class="form-check form-check-inline">'.
											'<form method= "POST" action= "php/desmarcarEvento.php" >'.
												'<input name= "idConsulta" type="hidden" value="'.$itens['id_evento'].'">'.
													$this->returnButtonEvento($itens['status']).
											'</form>'.
										'</div>'.
									'</td>'.
									'<td>'.
										'<div class="form-check form-check-inline">'.
											'<form method= "POST" action= "php/deletarEvento.php" >'.
												'<input name= "idConsulta" type="hidden" value="'.$itens['id_evento'].'">'.
													'<button class="btn btn-danger" type="submit">Excluir</button>'.
											'</form>'.
										'</div>'.
									'</td>'.
									
								'</tr>'.
							'</tbody>';
						echo $td;				
				}
				$tRodape = '</table>';
				
				echo $tRodape;
			}else{
				echo  '<div class="alert alert-info">
						  Não temos eventos marcados para este pet</a>.
					  </div>';
			}
		}

		public function strExibirEventosDesmarcadosDoDia($nomePet,$value)
		{
			date_default_timezone_set('UTC');
			//date_default_timezone_get('America/Sao_Paulo');
			if(!empty($value)){
				$tCabe =
					'<table id="mytable" class= "table p-3 mb-2 border border-primary table-bordered">'.
													
						'<thead class="text-center table-stripe bg-primary text-white">'.
							'<th class="text-center">Pet</th>'.
							'<th class="text-center">Evento</th>'.
							'<th class="text-center">Status</th>'.
							'<th class="text-center">Data - Hora Inicio</th>'.
							'<th class="text-center">Data - Hora Termino</th>'.
							'<th class="text-center">Consulta</th>'.
						'</thead>';

				echo $tCabe;

				foreach($value as $itens){
					//print_r($itens);

					
					

					$strDataInicio = strtotime($itens['start_date']);
					$strDataFim = strtotime($itens['fim_date']);
					$strHoraInicio = strtotime($itens['start_hora']);
					

					$dataInicio = date("d/m/Y" , $strDataInicio);
					$dataFim = date("d/m/Y" , $strDataFim);
					$horaInicio = date("H:m",$strHoraInicio);
					$td =	'<tbody class = "text-center">'.
								'<tr>'. 
									'<td>'.
										'<div class="form-check form-check-inline">'.
												$nomePet.
										'</div>'.
									'</td>'.
									'<td>'.
										'<div class="form-check form-check-inline">'.
												$itens['title'].
										'</div>'.
									'</td>'.
									'<td>'.
										'<div class="form-check form-check-inline">'.
											$this->strReturnStatus($itens['status']).
										'</div>'.
									'</td>'.
									'<td>'.
										'<div class="form-check form-check-inline">'.
												$dataInicio.' - '.$horaInicio.
										'</div>'.
									'</td>'.
									'<td>'.
										'<div class="form-check form-check-inline">'.
											$dataFim.' - '.$this->strHoraFinal($itens['fim_hora']).
												
										'</div>'.
									'</td>'.
									'<td>'.
										'<div class="form-check form-check-inline">'.
											'<form method= "POST" action= "php/desmarcarEvento.php" >'.
												'<input name= "idConsulta" type="hidden" value="'.$itens['id_evento'].'">'.
													$this->returnButtonEvento($itens['status']).
											'</form>'.
										'</div>'.
									'</td>'.
									
								'</tr>'.
							'</tbody>';
						echo $td;				
				}
				$tRodape = '</table>';
				
				echo $tRodape;
			}else{
				echo  '<div class="alert alert-info">
						  Não temos eventos encerrados para este pet</a>.
					  </div>';
			}
		}

		public function returnButtonEvento($value)
		{
			//Evento esta aberto
			if($value == 0){
				return '<button type="submit" class="btn btn-primary">Desmarcar</button>';
			}else if($value == 1){
				return '<button type="submit" class="btn btn-primary" disabled>Encerrado</button>';
			}
		}

		public function desmarcarEventos($var)
		{	
			$desmarcar = 1;
			$sql = "SELECT status FROM eventos WHERE id_evento = :id_evento";
			$sql = $this->pdo->prepare($sql);
			if (!empty($var)) {
				$sql->bindValue(':id_evento',$var);
				//echo "Checou aqui primeiro";
				$sql->execute();
				if ($sql->rowCount() > 0) {
					$dados = $sql->fetch();
					$sql = "UPDATE eventos SET status = $desmarcar WHERE id_evento = :id_evento";
					$sql = $this->pdo->prepare($sql);
					$sql->bindValue(':id_evento',$var);
					//echo $var;
					if($sql->execute()){
						return true;
					}else{
						return false;
					}
				}else{

				}
			}
		}

		public function deletarTodosOsEventosDoPetPeloSeuId($value)
	    {
	      $sql = "DELETE FROM eventos WHERE id_pet = :id";
	      $sql = $this->pdo->prepare($sql);
	      if (!empty($value)) {
	        //echo $id;
	        $sql->bindValue(':id',$value);
	        if ($sql->execute()) {
	          //echo "O evento foi excluido com sucesso";
	          return true;
	        }else{
	          echo "Erro ao excluir o evento pelo seu id";
	          return false;
	        } 
	      }
	    }


	}



?>
















