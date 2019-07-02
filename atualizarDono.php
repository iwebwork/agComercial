<!DOCTYPE html>
<html>
<head>
<head lang="pt-br">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset='utf-8'/>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<!-- Meus arquivos -->
<link rel="stylesheet" href="css/style.css">

<title>AgComercial</title>
</head>
<body>
	<?php
		setlocale(LC_ALL,'pt_BR.UTF8');
		mb_internal_encoding('UTF8'); 
		mb_regex_encoding('UTF8');
		include 'php/classes/usuario.class.php';
		include 'php/classes/proprietario.class.php';
		$usuario = new Usuario();
		$usuario->verificacaoLogin();

		$proprietario = new Proprietario();
		
		if (empty($_POST)) {
			header("Location: index.php");
		}else{
			//print_r($_POST);
			$id_propri = $_POST['id_propri'];

			//Informações do dono
			$proprietario->setId($id_propri);
			$proprietario->setCpf($id_propri);
			$proprietario->setNome($id_propri);
			$proprietario->setPais($id_propri);
			$proprietario->setEstado($id_propri);
			$proprietario->setCidade($id_propri);
			$proprietario->setBairro($id_propri);
			$proprietario->setRua($id_propri);
			$proprietario->setNumero($id_propri);
			$proprietario->setTel($id_propri);
		}
	?>
	<div class="container">
		
			<h2 class="text-center">Informações do Dono</h2>
		
				<form method="POST" action="php/updateDono.php">
					<div class="form-group">
						<input type="hidden" name="id_propri" value="<?php echo $proprietario->getId();?>">
					    <label for="exampleInputEmail1">CPF:</label>
					    <input <?php echo 'value= "'.$proprietario->getCpf().'" '; ?> name="dnCpf" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="CPF">
					    
					</div>
					<div class="form-group">
					    <label for="exampleInputEmail1">Nome:</label>
					    <input <?php echo 'value= "'.$proprietario->getNome().'" '; ?> name="dnNome" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nome">
					</div>
					<div class="form-group">
					    <label for="exampleInputEmail1">Pais:</label>
					    <input <?php echo 'value= "'.$proprietario->getPais().'" '; ?> name="dnPais" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Pais">
					</div>
					<div class="form-group">
					    <label for="exampleInputEmail1">Estado:</label>
					    <input <?php echo 'value= "'.$proprietario->getEstado().'" '; ?> name="dnEstado" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Estado">
					</div>
					<div class="form-group">
					    <label for="exampleInputEmail1">Cidade:</label>
					    <input <?php echo 'value= "'.$proprietario->getCidade().'" '; ?> name="dnCidade" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Cidade">
					</div>
					<div class="form-group">
					    <label for="exampleInputEmail1">Bairro:</label>
					    <input <?php echo 'value= "'.$proprietario->getBairro().'" '; ?> name="dnBairro" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Bairro">
					</div>
					<div class="form-group">
					    <label for="exampleInputEmail1">Rua:</label>
					    <input <?php echo 'value= "'.$proprietario->getRua().'" '; ?> name="dnRua" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Rua">
					</div>
					<div class="form-group">
					    <label for="exampleInputEmail1">Numero:</label>
					    <input <?php echo 'value= "'.$proprietario->getNumero().'" '; ?> name="dnNumero" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Numero">
					</div>
					<div class="form-group">
					    <label for="exampleInputEmail1">Telefone:</label>
					    <input <?php echo 'value= "'.$proprietario->getTel().'" '; ?> name="dnTel" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Telefone">
					</div>
					<div class="form-group">
					    <button type="submit" class="btn btn-primary">Enviar</button>
					</div>

				</form>
							
	</div>
	
</body>
</html>