<?php
	include_once 'Banco.class.php';
	class Usuario extends Banco{
		
		private $id;
		private $email;
		private $senha;
		private $nome;
		
		public function __construct(){
			parent::__construct();
		}
		// ----------
		public function setId($value)
		{
			if(!empty($value)){
				$this->id = $value;
			}
			
		}

		public function setEmail($value)
		{	
			//echo $value;
			$sql = "SELECT email FROM usuarios WHERE id = :id";
			$sql = $this->pdo->prepare($sql);
			if (!empty($value)) {
				$sql->bindValue(':id',$value);
				$sql->execute();
				if ($sql->rowCount() > 0) {
					$email = $sql->fetch();
					$this->email = $email;
				}	
			}
			
			
			
		}

		public function setSenha($value)
		{
			if(!empty($value)){
				$this->senha = $value;
			}
			
		}

		public function setNome($value)
		{
			$sql = "SELECT nome FROM usuarios WHERE id = :id";
			$sql = $this->pdo->prepare($sql);
			if (!empty($value)) {
				$sql->bindValue(':id',$value);
				$sql->execute();
				if ($sql->rowCount() > 0) {
					$nome = $sql->fetch();
					$this->nome = $nome;
				}	
			}
			
		}

		public function getId()
		{
			return $this->id;
			
		}

		public function getEmail()
		{
			return $this->email;
			
		}

		public function getSenha()
		{
			return $this->senha;
			
		}

		public function getNome()
		{
			return $this->nome;
			
		}

		//Rodar no index.php
		public function verificacaoLogin(){
			
			session_start();
			if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
				$this->setNome($_SESSION['nome']);
			}else{
				header("Location: login.php");
			}

		}

		//Rodar na pagina de login.php
		public function login(){
			session_start();
	        
	        if(isset($_POST['email']) && empty($_POST['email']) == false){
	        	$email = addslashes($_POST['email']);
	        	$senha = md5(addslashes($_POST['senha']));
	        	
	        	$sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha' ";
				$sql = $this->pdo->query($sql);
				if($sql->rowCount() > 0){

					$dados = $sql->fetch();
					$_SESSION['id'] = $dados['id'];
					$_SESSION['email'] = $dados['email'];
					$_SESSION['senha'] = $dados['senha'];
					$_SESSION['nome'] = $dados['nome'];
					header("Location: index.php");
				}else{
					echo "<div class='alert alert-danger' >";
						  	echo "<strong>Aviso!</strong> Email ou senha incorretos";
					echo "</div>";
					;
				}

		    }
		}

		public function sair()
		{
			session_destroy();
			header("Location: login.php");
		}

	}