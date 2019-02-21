<?php
	class Usuario{
		
		private $id;
		private $email;
		private $senha;
		private $nome;

		//Banco ------
		private $pdo;
		
		public function __construct(){
			$this->pdo = new PDO("mysql:dbname=u270517400_ag;host=sql177.main-hosting.eu","u270517400_iwebw","ag61218work");
			//$this->pdo = new PDO("mysql:dbname=u270517400_ag;host=127.0.0.1","root","");
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
			if(!empty($value)){
				$this->email = $value;
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
			if(!empty($value)){
				$this->nome = $value;
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