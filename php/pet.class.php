<?php
	class Pet{

		//Banco ------
		private $pdo;
		
		public function __construct(){
			//$this->pdo = new PDO("mysql:dbname=u270517400_ag;host=sql177.main-hosting.eu","u270517400_iwebw","ag61218work");
			$this->pdo = new PDO("mysql:dbname=u270517400_ag;host=127.0.0.1;charset=utf8","root","");
		}
		// ----------

		//dados:id_pet , Nome_pet, Especie, sexo, idade, peso, informações_add, id_proprietario,
		//Caso seja necessario
		private $id;

		private $nome;
		private $especie;
		private $raca;
		private $sexo;
		private $idade;
		private $peso;
		private $infoAdd;

		//Caso seja necessario
		private $idProprietario;

		//Sets Pelo id do pet
		public function setIDPetPeloId($value)
		{
			$sql = "SELECT id FROM pets WHERE id = :id ";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':id',$value);

			$sql->execute();
			if ($sql->rowCount() > 0) {
				$id = $sql->fetch();
				if(!empty($id)){
					$this->id = $id['id'];
					//$this->setIdProprietario($value);
					
				}else{
					echo "Erro ao salvar o nome";
				}
			}
		}

		public function setNomeIDPet($value)
		{
			$sql = "SELECT nome_pet FROM pets WHERE id = :id ";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':id',$value);

			$sql->execute();
			if ($sql->rowCount() > 0) {
				$nome = $sql->fetch();
				if(!empty($nome)){
					$this->nome = $nome['nome_pet'];
					//$this->setIdProprietario($value);
					
				}else{
					echo "Erro ao salvar o nome";
				}
			}
		}

		public function setEspecieIDPet($value)
		{
			$sql = "SELECT especie FROM pets WHERE id = :id ";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':id',$value);

			$sql->execute();
			if ($sql->rowCount() > 0) {
				$especie = $sql->fetch();
				if(!empty($especie)){
					$this->especie = $especie['especie'];
					
				}else{
					echo "Erro ao salvar a especie";
				}
			}
		}

		public function setRacaIDPet($value)
		{
			$sql = "SELECT raca FROM pets WHERE id = :id ";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':id',$value);

			$sql->execute();
			if ($sql->rowCount() > 0) {
				$raca = $sql->fetch();
				if(!empty($raca)){
					$this->raca = $raca['raca'];
					
				}else{
					echo "Erro ao salvar a raca";
				}
			}
		}

		public function setSexoIDPet($value)
		{
			$sql = "SELECT sexo FROM pets WHERE id = :id ";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':id',$value);

			$sql->execute();
			if ($sql->rowCount() > 0) {
				$sexo = $sql->fetch();
				if(!empty($sexo)){
					$this->sexo = $sexo['sexo'];
					
				}else{
					echo "Erro ao salvar o sexo";
				}
			}
		}

		public function setIdadeIDPet($value)
		{
			$sql = "SELECT idade FROM pets WHERE id = :id ";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':id',$value);

			$sql->execute();
			if ($sql->rowCount() > 0) {
				$idade = $sql->fetch();
				if(!empty($idade)){
					$this->idade = $idade['idade'];
					
				}else{
					echo "Erro ao salvar a idade";
				}
			}
		}

		public function setPesoIDPet($value)
		{
			$sql = "SELECT peso FROM pets WHERE id = :id ";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':id',$value);

			$sql->execute();
			if ($sql->rowCount() > 0) {
				$peso = $sql->fetch();
				if(!empty($peso)){
					$this->peso = $peso['peso'];
					
				}else{
					echo "Erro ao salvar o peso";
				}
			}
		}

		public function setInfoAddIDPet($value)
		{
			$sql = "SELECT info_add FROM pets WHERE id = :id ";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':id',$value);

			$sql->execute();
			if ($sql->rowCount() > 0) {
				$info = $sql->fetch();
				if(!empty($info)){
					$this->infoAdd = $info['info_add'];
					
				}else{
					echo "Erro ao salvar as infoAdd";
				}
			}
		}

		//Sets Pelo id do proprietario
		public function setId($value)
		{
			$sql = "SELECT id FROM pets WHERE id_propri = :id ";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':id',$value);

			$sql->execute();
			if ($sql->rowCount() > 0) {
				$id = $sql->fetch();
				if(!empty($id)){
					$this->id = $id['id'];
					$this->setIdProprietario($value);
					//return true;
				}else{
					//return false
					echo "Id do proprietario não encontrado";
				}
			}
		}

		public function setNome($value)
		{
			$sql = "SELECT nome_pet FROM pets WHERE id_propri = :id ";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':id',$value);

			$sql->execute();
			if ($sql->rowCount() > 0) {
				$nome = $sql->fetch();
				if(!empty($id)){
					$this->nome = $nome['nome'];
					return true;
				}else{
					return false;
				}
			}
		}

		public function setEspecie($value)
		{
			$sql = "SELECT especie FROM pets WHERE id_propri = :id ";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':id',$value);

			$sql->execute();
			if ($sql->rowCount() > 0) {
				$especie = $sql->fetch();
				if(!empty($id)){
					$this->especie = $especie['especie'];
					return true;
				}else{
					return false;
				}
			}
		}

		public function setSexo($value)
		{
			$sql = "SELECT sexo FROM pets WHERE id_propri = :id ";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':id',$value);

			$sql->execute();
			if ($sql->rowCount() > 0) {
				$sexo = $sql->fetch();
				if(!empty($id)){
					$this->sexo = $sexo['sexo'];
					return true;
				}else{
					return false;
				}
			}
		}

		public function setIdade($value='')
		{
			$sql = "SELECT idade FROM pets WHERE id_propri = :id ";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':id',$value);

			$sql->execute();
			if ($sql->rowCount() > 0) {
				$idade = $sql->fetch();
				if(!empty($id)){
					$this->idade = $idade['idade'];
					return true;
				}else{
					return false;
				}
			}
		}

		public function setPeso($value='')
		{
			$sql = "SELECT peso FROM pets WHERE id_propri = :id ";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':id',$value);

			$sql->execute();
			if ($sql->rowCount() > 0) {
				$peso = $sql->fetch();
				if(!empty($id)){
					$this->peso = $peso['peso'];
					return true;
				}else{
					return false;
				}
			}
		}

		public function setInfoAdd($value)
		{
			$sql = "SELECT info_add FROM pets WHERE id_propri = :id ";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':id',$value);

			$sql->execute();
			if ($sql->rowCount() > 0) {
				$infoAdd = $sql->fetch();
				if(!empty($id)){
					$this->infoAdd = $infoAdd['info_add'];
					return true;
				}else{
					return false;
				}
			}
		}

		public function setIdProprietario($value)
		{
			$sql = "SELECT id_propri FROM pets WHERE id_propri = :id ";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':id',$value);

			$sql->execute();
			if ($sql->rowCount() > 0) {
				$id = $sql->fetch();
				if(!empty($id)){
					$this->idProprietario = $id['id_propri'];
					return true;
				}else{
					
				}
			}else{
				return false;
				
			}	
		}
		//-------------------------------------

		//Gets
		public function getId()
		{
			return $this->id;
			
		}

		public function getNome()
		{
			return $this->nome;
			
		}

		public function getEspecie()
		{
			return $this->especie;
			
		}

		public function getRaca()
		{
			return $this->raca;
			
		}

		public function getSexo()
		{
			return $this->sexo;
			
		}

		public function getIdade()
		{
			return $this->idade;
			
		}

		public function getPeso()
		{
			return $this->peso;
			
		}

		public function getInfoAdd()
		{
			return $this->infoAdd;
			
		}

		public function getIdProp()
		{
			return $this->idProprietario;
			
		}
		//----------------------------------

		//OBS: Receba os dados em um arquivo separado, depois use os gets aqui
		public function inserirPet($valores,$id_pro){
			
				if(!empty($id_pro)){
					//echo "Id do proprietario salvo com sucesso";
					$dados = $valores;
					$sql = "INSERT INTO pets (nome_pet,especie,raca,sexo,idade,peso,info_add,id_propri) VALUES (:nome, :especie,:raca, :sexo, :idade, :peso, :info_add, :idPro)";
					$sql = $this->pdo->prepare($sql);
				
					$sql->bindValue(':nome',$dados['nome']);
					$sql->bindValue(':especie',$dados['especie']);
					$sql->bindValue(':raca',$dados['raca']);
					$sql->bindValue(':sexo',$dados['sexo']);
					$sql->bindValue(':idade',$dados['idade']);
					$sql->bindValue(':peso',$dados['peso']);
					$sql->bindValue('info_add',$dados['texto']);
					$sql->bindValue(':idPro',$id_pro);
					if ($sql->execute()) {
						//$this->strRetornoPositivo();
						return true;
					}
					
				}else{
					
					echo "Erro ao cadastrar, o id não foi salvo";
					return false;
				}
			}

		
		public function deletarPetsIdPropri($value)
		{	
			$resultado = $this->setIdProprietario($value);
			if ($resultado == true) {
				$sql = "DELETE FROM pets WHERE id_propri = :id_propri";
				$sql = $this->pdo->prepare($sql);
				$sql->bindValue(':id_propri',$value);
				$sql->execute();

				$conferir = $this->setIdProprietario($value);
				if ($conferir == false) {
					echo "Os pets foram excluidos com sucesso";
				}		
			}else{
				echo "Os pets foram excluidos do banco";
			}
					
		}

		public function deletarPetPeloId($id)
		{	
			$sql = "DELETE FROM pets WHERE id = :id";
			$sql = $this->pdo->prepare($sql);
			if (!empty($id)) {
				$sql->bindValue(':id',$id);
				if ($sql->execute()) {
					echo "O pet foi excluido com sucesso";
					return true;
				}else{
					echo "Erro ao excluir o pet pelo seu id";
					return false;
				}	
			}
			
						
		}

		public function atualizarPet($value)
		{	
			//print_r($value);
			$sql = "UPDATE pets SET id = :id_pet , nome_pet = :nome_pet, especie = :especie, raca = :raca, sexo = :sexo, idade = :idade, peso =:peso, info_add = :infoAdd WHERE id = :valueId";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':id_pet',$value['petId']);
			$sql->bindValue(':nome_pet',$value['petNome']);
			$sql->bindValue(':especie',$value['petSexo']);
			$sql->bindValue(':raca',$value['petRaca']);
			$sql->bindValue(':especie',$value['petEspecie']);
			$sql->bindValue(':sexo',$value['petSexo']);
			$sql->bindValue(':idade',$value['petIdade']);
			$sql->bindValue(':peso',$value['petPeso']);
			$sql->bindValue(':infoAdd',$value['petInfoAdd']);
			$sql->bindValue('valueId',$value['petId']);
			if ($sql->execute()) {
				header("Location: ../index.php");
			}else{
				echo "Falha ao atualizar";
			}
		}




	}