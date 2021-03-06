<?php
	include_once 'Banco.class.php';
	class proprietario extends Banco{
		
		public function __construct(){
			parent::__construct();
		}
		// ----------

		//Use depois que inserir o proprietario
		private $id;
		//Restante do dados

		private $cpf;
		private $nome;
		private $pais;
		private $estado;
		private $cidade;
		private $bairro;
		private $rua;
		private $numero;
		private $tel;

		//Sets
		public function setId($valueCpf='')
		{
			//echo $valueCpf;
			$sql = "SELECT id_propri FROM proprietario WHERE cpf = :valueCpf ";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':valueCpf',$valueCpf);

			$sql->execute();
			if ($sql->rowCount() > 0) {
				$id = $sql->fetch();
				if(!empty($id)){
					$this->id = $id['id_propri'];
					
				}else{
					echo "O cpf estava vazio";
				}
			}
			
			
		}

		public function setIdPeloId($value)
		{
			//echo $valueCpf;
			$sql = "SELECT id_propri FROM proprietario WHERE id_propri = :value ";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':value',$value);

			$sql->execute();
			if ($sql->rowCount() > 0) {
				$id = $sql->fetch();
				if(!empty($id)){
					$this->id = $id['id_propri'];
					return true;
				}else{
					echo "O cpf estava vazio";
				}
			}else{
				return false;
				
			}
			
			
		}


		public function setCpf($value)
		{
			$sql = "SELECT cpf FROM proprietario WHERE cpf = :valueCpf ";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':valueCpf',$value);

			$sql->execute();
			if ($sql->rowCount() > 0) {
				$cpf = $sql->fetch();
				if(!empty($cpf)){
					$this->cpf = $cpf['cpf'];
					
				}else{
					echo "O cpf não foi digitado";
				}
			}
		}

		public function setNome($value)
		{
			$sql = "SELECT nome_propri FROM proprietario WHERE cpf = :value";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':value',$value);

			$sql->execute();
			if ($sql->rowCount() > 0) {
				$nome = $sql->fetch();
				if(!empty($nome)){
					$this->nome = $nome['nome_propri'];
					
				}else{
					
				}
			}
		}

		public function setNomePeloId($value)
		{
			$sql = "SELECT nome_propri FROM proprietario WHERE id_propri = :value";	
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':value',$value);

			$sql->execute();
			if ($sql->rowCount() > 0) {
				$nome = $sql->fetch();
				if(!empty($nome)){
					$this->nome = $nome['nome_propri'];
					
				}else{
					
				}
			}
		}

		public function setNomePetPeloId($value)
		{
			$sql = "SELECT nome_pet FROM proprietario WHERE id_propri = :value";	
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':value',$value);

			$sql->execute();
			if ($sql->rowCount() > 0) {
				$nome = $sql->fetch();
				if(!empty($nome)){
					$this->nome = $nome['nome_propri'];
					
				}else{
					
				}
			}
		}

		public function setPais($value)
		{
			$sql = "SELECT pais FROM proprietario WHERE cpf = :value";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':value',$value);

			$sql->execute();
			if ($sql->rowCount() > 0) {
				$pais = $sql->fetch();
				if(!empty($pais)){
					$this->pais = $pais['pais'];
					
				}else{
					
				}
			}
		}

		public function setEstado($value)
		{
			$sql = "SELECT estado FROM proprietario WHERE cpf = :value";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':value',$value);

			$sql->execute();
			if ($sql->rowCount() > 0) {
				$estado = $sql->fetch();
				if(!empty($estado)){
					$this->estado = $estado['estado'];
					
				}else{
					
				}
			}
		}

		public function setCidade($value)
		{
			$sql = "SELECT cidade FROM proprietario WHERE cpf = :value";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':value',$value);

			$sql->execute();
			if ($sql->rowCount() > 0) {
				$cidade = $sql->fetch();
				if(!empty($cidade)){
					$this->cidade = $cidade['cidade'];
					
				}else{
					
				}
			}
		}

		public function setBairro($value)
		{
			$sql = "SELECT bairro FROM proprietario WHERE cpf = :value";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':value',$value);

			$sql->execute();
			if ($sql->rowCount() > 0) {
				$bairro = $sql->fetch();
				if(!empty($bairro)){
					$this->bairro = $bairro['bairro'];
					
				}else{
					
				}
			}
		}

		public function setRua($value)
		{
			$sql = "SELECT rua FROM proprietario WHERE cpf = :value";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':value',$value);

			$sql->execute();
			if ($sql->rowCount() > 0) {
				$rua = $sql->fetch();
				if(!empty($rua)){
					$this->rua = $rua['rua'];
					
				}else{
					
				}
			}
		}

		public function setNumero($value)
		{
			$sql = "SELECT numero FROM proprietario WHERE cpf = :value";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':value',$value);

			$sql->execute();
			if ($sql->rowCount() > 0) {
				$numero = $sql->fetch();
				if(!empty($numero)){
					$this->numero = $numero['numero'];
					
				}else{
				}
			}
		}

		public function setTel($value)
		{
			$sql = "SELECT telefone FROM proprietario WHERE cpf = :value";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':value',$value);

			$sql->execute();
			if ($sql->rowCount() > 0) {
				$telefone = $sql->fetch();
				if(!empty($telefone)){
					$this->tel = $telefone['telefone'];
				}else{
					echo "Telefone não encontrado";
				}
			}
		}

		public function setTelPeloId($value)
		{
			$sql = "SELECT telefone FROM proprietario WHERE id_propri = :value";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':value',$value);

			$sql->execute();
			if ($sql->rowCount() > 0) {
				$telefone = $sql->fetch();
				if(!empty($telefone)){
					$this->tel = $telefone['telefone'];
				}else{
					echo "Telefone não encontrado";
				}
			}
		}

		//Gets

		public function getId()
		{
			return $this->id;
		}

		public function getCpf()
		{
			return $this->cpf;
		}

		public function getNome()
		{
			return $this->nome;
		}

		public function getPais()
		{
			return $this->pais;
		}

		public function getEstado()
		{
			return $this->estado;
		}

		public function getCidade()
		{
			return $this->cidade;
		}

		public function getBairro()
		{
			return $this->bairro;
		}
		public function getRua()
		{
			return $this->rua;
		}

		public function getNumero()
		{
			return $this->numero;
		}

		public function getTel()
		{
			return $this->tel;
		}

		//Funcoes criadas
		public function inserirProp($valores)
		{
			try {
				/*$dados = array(

					'cpf' =>$this->getCpf(),
					'nome' =>$this->getNome(),
					'pais' =>$this->getPais(),
					'estado' =>$this->getEstado(),
					'cidade' =>$this->getCidade(),
					'bairro' =>$this->getBairro(),
					'rua' =>$this->getRua(),
					'numero' => $this->getNumero(),
					'telefone' => $this->getTel()
				);*/

				$dados = $valores;
				//print_r($dados);
				$sql = "SELECT cpf FROM proprietario WHERE cpf = :cpf " ;
				$sql = $this->pdo->prepare($sql);
				
				if (!empty($dados['cpf'])) {
					$sql->bindValue(':cpf',$dados['cpf']);
					$sql->execute();

					if ($sql->rowCount() > 0) {
						echo "O cpf foi vazio";
						return false;
						
							
					}else{
						
						$sql = "INSERT INTO proprietario (cpf,nome_propri,pais,estado,cidade,bairro,rua,numero,telefone) VALUES (:cpf,:nome_propri,:pais,:estado,:cidade,:bairro,:rua,:numero,:telefone)";
						//$sql = $this->pdo->prepare('INSERT INTO proprietario (cpf,nome_propri,pais,estado,cidade,bairro,rua,numero,telefone)
						//VALUES (:cpf,:nome_propri,:pais,:estado,:cidade,:bairro,:rua,:numero,:telefone)');
						$sql = $this->pdo->prepare($sql);
						$sql->bindValue(':cpf' ,$dados['cpf']);
						$sql->bindValue(':nome_propri' ,$dados['nome']);
						$sql->bindValue(':pais' ,$dados['pais']);
						$sql->bindValue(':estado' ,$dados['estado']);
						$sql->bindValue(':cidade' ,$dados['cidade']);
						$sql->bindValue(':bairro' ,$dados['bairro']);
						$sql->bindValue(':rua' ,$dados['rua']);
						$sql->bindValue(':numero', $dados['numero']);
						$sql->bindValue(':telefone' , $dados['telefone']);
						if ($sql->execute()) {
							echo "Dono cadaastrado com sucesso";
							return true;
						} 
						
					}
				}

				
				
				
				//echo $this->pdo->rowCount();
				
			} catch (Exception $e) {
				echo 'Error: ' . $e->getMessage();
			}
			
		}

		public function strListaDePetsCPF($value)
		{
			$sql = "SELECT id_propri,nome_propri,cpf FROM proprietario WHERE cpf = :cpf ";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':cpf',$value);
			$sql->execute();

			if ($sql->rowCount() > 0) {

				$prop = $sql->fetch();
				//echo $prop['id_propri'];
				if(!empty($prop)){
					//echo($nome_pro['id_propri']);['nome_propri']."<br/>";
					$sql = "SELECT id_pet,nome_pet FROM pets WHERE id_propri = :id_propri ";
					$sql = $this->pdo->prepare($sql);
					$sql->bindValue(':id_propri',$prop['id_propri']);


					$sql->execute();
					if ($sql->rowCount() > 0) {
						//echo "Achou os pets";
						$nome_pet = $sql->fetchAll();
						if(!empty($nome_pet)){
							//print_r($nome_pet);
							$strCabe =
											'<table id="mytable" class= "table table-stripe p-3 mb-2 table-bordered border-primary">'.
												
												'<thead class="text-center table-stripe bg-primary text-white">'.
													
										            '<th class="text-center">Dono</th>'.
										            '<th class="text-center">Pet</th>'.
										            '<th class="text-center">Ficha</th>'.
										            '<th class="text-center">Marcar Consulta</th>'.
										            
										        '</thead>';
							echo $strCabe;
							foreach ($nome_pet as $pet) {
								//print_r($item);
								//print_r($value);
								//echo $item. "=>".$value;

								$strCorpo = 
											'<tbody class = "text-center">'.
										        '<tr>'.
															'<td>'.
																'<div class="form-check form-check-inline">'.
																	$prop['nome_propri'].
																'</div>'.
																'<div class="form-check form-check-inline">'.
																	'<form method= "POST" action="php/deletarProprietario.php" >'.
																		'<input name= "cpf" type="hidden" class= "none" value="'.$prop['cpf'].'" readonly>'.	
																		'<p data-placement="top" data-toggle="tooltip" title="Apagar o Dono OBS: Todos os seus pets tambem serão apagados permanentemente"><button class="btn btn-danger btn-xs" data-title="Delete" type="submit"><span class="glyphicon glyphicon-trash"></span></button></p>'.
																	'</form>'.
																'</div>'.
																'<div class="form-check form-check-inline">'.
																	'<form method= "POST" action="atualizarDono.php" >'.
																		'<input name= "cpf" type="hidden" class= "none" value="'.$prop['cpf'].'" readonly>'.	
																		'<p data-placement="top" data-toggle="tooltip" title="Atualizar o Dono"><button class="btn btn-primary btn-xs" data-title="Update" type="submit"><span class="glyphicon glyphicon-wrench"></span></button></p>'.
																	'</form>'.
																'</div>'.
																'<div class="form-check form-check-inline">'.
																	'<form method= "POST" action="cadastrarPet.php" >'.
																		'<input name= "cpf" type="hidden" class= "none" value="'.$prop['cpf'].'" readonly>'.	
																		'<p data-placement="top" data-toggle="tooltip" title="Cadastrar um novo pet no nome desse dono"><button class="btn btn-success btn-xs" data-title="Update" type="submit"><span class="glyphicon glyphicon-plus"></span></button></p>'.
																	'</form>'.
																'</div>'.																	
															'</td>'.
															'<td>'.
																'<div class="form-check form-check-inline">'.
																	$pet['nome_pet'].
																'</div>'.
																'<div class="form-check form-check-inline">'.
																	'<form method= "POST" action="php/deletarPet.php" >'.
																		'<input name= "idPet" type="hidden" class= "none" value="'.$pet['id_pet'].'" readonly>'.	
																		'<p data-placement="top" data-toggle="tooltip" title="Apagar este pet"><button class="btn btn-danger btn-xs" data-title="Delete" type="submit"><span class="glyphicon glyphicon-trash"></span></button></p>'.
																	'</form>'.
																'</div>'.
																'<div class="form-check form-check-inline">'.
																	'<form method= "POST" action="atualizarPet.php" >'.
																		'<input name= "id" type="hidden" class= "none" value="'.$pet['id_pet'].'" readonly>'.	
																		'<p data-placement="top" data-toggle="tooltip" title="Atualizar o Pet"><button class="btn btn-primary btn-xs" data-title="Update" type="submit"><span class="glyphicon glyphicon-wrench"></span></button></p>'.
																	'</form>'.
																'</div>'.
															'</td>'.
															
															'<td>'.
																'<form target="_blank" method= "POST" action= "ficha.php" >'.
																	'<input name= "cpf" type="hidden" class= "none" value="'.$prop['cpf'].'" readonly>'.
																	'<input name="idPet" type= "hidden" class= "none" value="'.$pet['id_pet'].'" readonly>'.
																	'<button type="submit" class="btn btn-primary">Gerar Ficha</button>'.
																'</form>'.
															'</td>'.
															'<td>'.
																'<div class="form-check form-check-inline">'.
																		'<form method= "POST" action= "consulta.php" >'.
																			'<input name= "cpf" type="hidden" class= "none" value="'.$prop['cpf'].'" readonly>'.
																			'<input name="idPet" type= "hidden" class= "none" value="'.$pet['id_pet'].'" readonly>'.
																			'<button type="submit" class="btn btn-primary">Marca</button>'.
																		'</form>'.
																	'</div>'.
																	'<div class="form-check form-check-inline">'.
																		'<form method= "POST" action ="eventos.php" '.
																			'<input name= "cpf" type="hidden" class= "none" value="'.$prop['cpf'].'" readonly>'.
																			'<input name="idPet" type= "hidden" class= "none" value="'.$pet['id_pet'].'" readonly>'.
																			'<button type="submit" class="btn btn-primary">Visualizar</button>'.
																		'</form>'.
																	'</div>'.
															'</td>'.
															
														'</tr>'.
										    '</tbody>'; 
								
								echo $strCorpo;
							}
							$strRodape = '</table>'.
								'</form>';
							echo $strRodape;
							return true;
						}
				}else{
					echo "Erro, na busca";
				}
					
			}else{
				echo "Erro na busca Não funcionou";
			}

		}else{
			return false;
		}

	}


	public function strListaDePetsNome($value)
		{
			$sql = "SELECT id_propri,nome_propri,cpf FROM proprietario WHERE nome_propri LIKE '%$value%' ";
			$sql = $this->pdo->query($sql);

			if ($sql->rowCount() > 0) {
				$proprietario = $sql->fetchAll();
				if (!empty($proprietario)) {
					$strCabe =
								'<table id="mytable" class= "table p-3 mb-2 border border-primary table-bordered">'.
														
									'<thead class="text-center table-stripe bg-primary text-white">'.
											
											'<th class="text-center">Dono</th>'.
											'<th class="text-center">Pet</th>'.
											'<th class="text-center">Ficha</th>'.
											'<th class="text-center">Consulta</th>'.
											
									'</thead>';
					echo $strCabe;
					foreach ($proprietario as $key => $prop) {
						$sql = "SELECT id_pet,nome_pet FROM pets WHERE id_propri = :id_propri ";
						$sql = $this->pdo->prepare($sql);
						$sql->bindValue(':id_propri',$prop['id_propri']);
						$sql->execute();

						if ($sql->rowCount() > 0) {
						$pets = $sql->fetchAll();
							if (!empty($pets)) {
								//print_r($nome_pet);
									
									foreach ($pets as $item => $pet) {
										//print_r($item);
										//print_r($value);
										//echo $item. "=>".$value;

										$strCorpo = 
														'<tbody class = "text-center">'.
												        	'<tr>'.
																'<td>'.
																	'<div class="form-check form-check-inline">'.
																		$prop['nome_propri'].
																	'</div>'.
																	'<div class="form-check form-check-inline">'.
																		'<form method= "POST" action="php/deletarProprietario.php" >'.
																			'<input name= "cpf" type="hidden" class= "none" value="'.$prop['cpf'].'" readonly>'.	
																			'<p data-placement="top" data-toggle="tooltip" title="Apagar o Dono OBS: Todos os seus pets tambem serão apagados permanentemente"><button class="btn btn-danger btn-xs" data-title="Delete" type="submit"><span class="glyphicon glyphicon-trash"></span></button></p>'.
																		'</form>'.
																	'</div>'.
																	'<div class="form-check form-check-inline">'.
																		'<form method= "POST" action="atualizarDono.php" >'.
																			'<input name= "cpf" type="hidden" class= "none" value="'.$prop['cpf'].'" readonly>'.	
																			'<p data-placement="top" data-toggle="tooltip" title="Atualizar o Dono"><button class="btn btn-primary btn-xs" data-title="Update" type="submit"><span class="glyphicon glyphicon-wrench"></span></button></p>'.
																		'</form>'.
																	'</div>'.
																	'<div class="form-check form-check-inline">'.
																		'<form method= "POST" action="cadastrarPet.php" >'.
																			'<input name= "cpf" type="hidden" class= "none" value="'.$prop['cpf'].'" readonly>'.	
																			'<p data-placement="top" data-toggle="tooltip" title="Cadastrar um novo pet no nome desse dono"><button class="btn btn-success btn-xs" data-title="Update" type="submit"><span class="glyphicon glyphicon-plus"></span></button></p>'.
																		'</form>'.
																	'</div>'.																	
																'</td>'.
																'<td>'.
																	'<div class="form-check form-check-inline">'.
																		$pet['nome_pet'].
																	'</div>'.
																	'<div class="form-check form-check-inline">'.
																		'<form method= "POST" action="php/deletarPet.php" >'.
																			'<input name= "idPet" type="hidden" class= "none" value="'.$pet['id_pet'].'" readonly>'.	
																			'<p data-placement="top" data-toggle="tooltip" title="Apagar este pet"><button class="btn btn-danger btn-xs" data-title="Delete" type="submit"><span class="glyphicon glyphicon-trash"></span></button></p>'.
																		'</form>'.
																	'</div>'.
																	'<div class="form-check form-check-inline">'.
																		'<form method= "POST" action="atualizarPet.php" >'.
																			'<input name= "id" type="hidden" class= "none" value="'.$pet['id_pet'].'" readonly>'.	
																			'<p data-placement="top" data-toggle="tooltip" title="Atualizar o Pet"><button class="btn btn-primary btn-xs" data-title="Update" type="submit"><span class="glyphicon glyphicon-wrench"></span></button></p>'.
																		'</form>'.
																	'</div>'.
																'</td>'.
																
																'<td>'.
																	'<form target="_blank" method= "POST" action= "ficha.php" >'.
																		'<input name= "cpf" type="hidden" class= "none" value="'.$prop['cpf'].'" readonly>'.
																		'<input name="idPet" type= "hidden" class= "none" value="'.$pet['id_pet'].'" readonly>'.
																		'<button type="submit" class="btn btn-primary">Gerar Ficha</button>'.
																	'</form>'.
																'</td>'.
																'<td>'.
																	'<div class="form-check form-check-inline">'.
																		'<form method= "POST" action= "consulta.php" >'.
																			'<input name= "cpf" type="hidden" class= "none" value="'.$prop['cpf'].'" readonly>'.
																			'<input name="idPet" type= "hidden" class= "none" value="'.$pet['id_pet'].'" readonly>'.
																			'<button type="submit" class="btn btn-primary">Marca</button>'.
																		'</form>'.
																	'</div>'.
																	'<div class="form-check form-check-inline">'.
																		'<form method= "POST" action ="eventos.php" '.
																			'<input name= "cpf" type="hidden" class= "none" value="'.$prop['cpf'].'" readonly>'.
																			'<input name="idPet" type= "hidden" class= "none" value="'.$pet['id_pet'].'" readonly>'.
																			'<button type="submit" class="btn btn-primary">Visualizar</button>'.
																		'</form>'.
																	'</div>'.
																'</td>'.
															
															'</tr>'.
												        '</tbody>'; 
										
										echo $strCorpo;
									}
									
							}
						}
					}
					$strRodape = '</table>';
										
					echo $strRodape;

			}else{
				echo "erro";
			}
		}else{
			//echo "A busca não funcionou";
			return false;
		}

	}


	public function strTodosOsProprietariosEmOrdemAlfabetica()
	{


		$sql = "SELECT id_propri,nome_propri,cpf FROM proprietario ORDER BY nome_propri";
		$sql = $this->pdo->query($sql);

		if ($sql->rowCount() > 0) {
			$proprietario = $sql->fetchAll();
			//print_r($proprietario);
			if (!empty($proprietario)) {
				$strCabe =
							'<table id="mytable" class= "table p-3 mb-2 border border-primary table-bordered">'.
													
								'<thead class="text-center table-stripe bg-primary text-white">'.
										//'<th class="text-center">Atualizar Dono</th>'.
										//'<th class="text-center">Apagar Dono</th>'.
										'<th class="text-center">Dono</th>'.
										'<th class="text-center">Pet</th>'.
										'<th class="text-center">Ficha</th>'.
										'<th class="text-center">Consulta</th>'.
								'</thead>';
				echo $strCabe;
				foreach ($proprietario as $key => $prop) {

					$sql = "SELECT nome_pet,id_pet FROM pets WHERE id_propri = :id_propri ";
					$sql = $this->pdo->prepare($sql);
					$sql->bindValue(':id_propri',$prop['id_propri']);
					$sql->execute();

					if ($sql->rowCount() > 0) {
					$pets = $sql->fetchAll();
						if (!empty($pets)) {
							//print_r($nome_pet);
								
								foreach ($pets as $item => $pet) {
									//print_r($item);
									//print_r($value);
									//echo $item. "=>".$value;

									$strCorpo = 
													'<tbody class = "text-center">'.
											        	'<tr>'.
															'<td>'.
																'<div class="form-check form-check-inline">'.
																	$prop['nome_propri'].
																'</div>'.
																'<div class="form-check form-check-inline">'.
																	'<form method= "POST" action="php/deletarProprietario.php" >'.
																		'<input name= "cpf" type="hidden" class= "none" value="'.$prop['cpf'].'" readonly>'.	
																		'<p data-placement="top" data-toggle="tooltip" title="Apagar o Dono OBS: Todos os seus pets tambem serão apagados permanentemente"><button class="btn btn-danger btn-xs" data-title="Delete" type="submit"><span class="glyphicon glyphicon-trash"></span></button></p>'.
																	'</form>'.
																'</div>'.
																'<div class="form-check form-check-inline">'.
																	'<form method= "POST" action="atualizarDono.php" >'.
																		'<input name= "cpf" type="hidden" class= "none" value="'.$prop['cpf'].'" readonly>'.	
																		'<p data-placement="top" data-toggle="tooltip" title="Atualizar o Dono"><button class="btn btn-primary btn-xs" data-title="Update" type="submit"><span class="glyphicon glyphicon-wrench"></span></button></p>'.
																	'</form>'.
																'</div>'.
																'<div class="form-check form-check-inline">'.
																	'<form method= "POST" action="cadastrarPet.php" >'.
																		'<input name= "cpf" type="hidden" class= "none" value="'.$prop['cpf'].'" readonly>'.	
																		'<p data-placement="top" data-toggle="tooltip" title="Cadastrar um novo pet no nome desse dono"><button class="btn btn-success btn-xs" data-title="Update" type="submit"><span class="glyphicon glyphicon-plus"></span></button></p>'.
																	'</form>'.
																'</div>'.																	
															'</td>'.
															'<td>'.
																'<div class="form-check form-check-inline">'.
																	$pet['nome_pet'].
																'</div>'.
																'<div class="form-check form-check-inline">'.
																	'<form method= "POST" action="php/deletarPet.php" >'.
																		'<input name= "idPet" type="hidden" class= "none" value="'.$pet['id_pet'].'" readonly>'.	
																		'<p data-placement="top" data-toggle="tooltip" title="Apagar este pet"><button class="btn btn-danger btn-xs" data-title="Delete" type="submit"><span class="glyphicon glyphicon-trash"></span></button></p>'.
																	'</form>'.
																'</div>'.
																'<div class="form-check form-check-inline">'.
																	'<form method= "POST" action="atualizarPet.php" >'.
																		'<input name= "id" type="hidden" class= "none" value="'.$pet['id_pet'].'" readonly>'.	
																		'<p data-placement="top" data-toggle="tooltip" title="Atualizar o Pet"><button class="btn btn-primary btn-xs" data-title="Update" type="submit"><span class="glyphicon glyphicon-wrench"></span></button></p>'.
																	'</form>'.
																'</div>'.
															'</td>'.
															
															'<td>'.
																'<form target="_blank" method= "POST" action= "ficha.php" >'.
																	'<input name= "cpf" type="hidden" class= "none" value="'.$prop['cpf'].'" readonly>'.
																	'<input name="idPet" type= "hidden" class= "none" value="'.$pet['id_pet'].'" readonly>'.
																	'<button type="submit" class="btn btn-primary">Gerar Ficha</button>'.
																'</form>'.
															'</td>'.
															'<td>'.
																'<div class="form-check form-check-inline">'.
																	'<form method= "POST" action= "consulta.php" >'.
																		'<input name= "cpf" type="hidden" class= "none" value="'.$prop['cpf'].'" readonly>'.
																		'<input name="idPet" type= "hidden" class= "none" value="'.$pet['id_pet'].'" readonly>'.
																		'<button type="submit" class="btn btn-primary">Marcar</button>'.
																	'</form>'.
																'</div>'.
																'<div class="form-check form-check-inline">'.
																	'<form method= "POST" action ="php/verifEventos.php" '.
																		'<input name= "cpf" type="hidden" class= "none" value="'.$prop['cpf'].'" readonly>'.
																		'<input name="idPet" type= "hidden" class= "none" value="'.$pet['id_pet'].'" readonly>'.
																		'<button type="submit" class="btn btn-primary">Visualizar</button>'.
																	'</form>'.
																'</div>'.
															'</td>'.
																													
														'</tr>'.
											        '</tbody>'; 
									
									echo $strCorpo;
								}
								
						}
					}
				}
				$strRodape = '</table>';
									
				echo $strRodape;

			}


		}else{

		}
	}

	public function destroyArray($value)
	{
		unset($value);
	}

	public function deletarProprietario($value)
	{	
		$resultado = $this->setIdPeloId($value);

		if ($resultado == true) {
			$sql = "DELETE FROM proprietario WHERE id_propri = :id_propri";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':id_propri',$value);
			if($sql->execute()){
				return true;
			}else{
				return false;
			}

		}else{
			echo "Esse proprietario ja foi deletado";
		}

	}

	public function atualizarDono($value)
	{	
		//print_r($value);
		$sql = "UPDATE proprietario SET cpf = :cpf, nome_propri = :nome_propri,pais = :pais ,estado = :estado, cidade = :cidade,bairro = :bairro, rua = :rua, numero = :numero, telefone = :telefone WHERE cpf = :valuecpf ";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':cpf',$value['dnCpf']);
		$sql->bindValue(':nome_propri',$value['dnNome']);
		$sql->bindValue(':pais',$value['dnPais']);
		$sql->bindValue(':estado',$value['dnEstado']);
		$sql->bindValue(':rua',$value['dnRua']);
		$sql->bindValue(':cidade',$value['dnCidade']);
		$sql->bindValue(':numero',$value['dnNumero']);
		$sql->bindValue(':bairro',$value['dnBairro']);
		$sql->bindValue(':telefone',$value['dnTel']);
		$sql->bindValue('valuecpf',$value['dnCpf']);
		if ($sql->execute()) {
			header("Location: ../index.php");
		}else{
			echo "Falha ao atualizar";
		}
	}

}