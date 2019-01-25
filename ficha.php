<!DOCTYPE html>
<html>
<head>
	<head lang="pt-br">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset='utf-8'/>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/index.css"><head lang="pt-br">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset='utf-8' http-equiv="Content-Language" content="pt-br"/>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<title>AgComercial</title>
</head>
<body>
	<?php
		setlocale(LC_ALL,'pt_BR.UTF8');
		mb_internal_encoding('UTF8'); 
		mb_regex_encoding('UTF8');
		include 'php/usuario.class.php';
		include 'php/proprietario.class.php';
		include 'php/pet.class.php';
		$usuario = new Usuario();
		$usuario->verificacaoLogin();

		$proprietario = new Proprietario();
		$pet = new Pet();
		if (empty($_POST)) {
			header("Location: index.php");
		}else{
			//print_r($_POST);
			$cpf = $_POST['cpf'];
			$idPet = $_POST['idPet'];
			//echo $idPet;
			//echo $cpf;

			//Informações do pet
			$pet->setNomeIDPet($idPet);
			$pet->setEspecieIDPet($idPet);
			$pet->setSexoIDPet($idPet);
			$pet->setIdadeIDPet($idPet);
			$pet->setPesoIDPet($idPet);
			$pet->setInfoAddIDPet($idPet);
			$pet->setRacaIDPet($idPet);


			//Informações do dono
			$proprietario->setId($cpf);
			$proprietario->setCpf($cpf);
			$proprietario->setNome($cpf);
			$proprietario->setPais($cpf);
			$proprietario->setEstado($cpf);
			$proprietario->setCidade($cpf);
			$proprietario->setBairro($cpf);
			$proprietario->setRua($cpf);
			$proprietario->setNumero($cpf);
			$proprietario->setTel($cpf);

		}
	?>
	<section>
		<div class="container">
			<div class="row d-flex text-center">
				<a class="btn btn-primary" href="index.php">Voltar a Pagina Inicial</a>
			</div>
		</div>
	</section>
	<section id="ficha">
		<div class="container p-3 mb-2 text-dark">
			<div class="row d-flex text-center border border-primary">
				<div class="col-sm">
					<h2 class="font-italic"> Informações do Pet </h2>
				</div>
			</div>
			<div class="row d-flex text-center border border-primary">
				<div class="col-sm"><p> <t class="font-weight-bold">Nome do pet:</t> <?php echo $pet->getNome();?> </p></div>
				<div class="col-sm"><p> <t class="font-weight-bold">Especie:</t> <?php echo $pet->getEspecie();?> </p></div>
				<div class="col-sm"><p> <t class="font-weight-bold">Raça:</t> <?php echo $pet->getRaca();?> </p></div>

				
			</div>
			<div class="row d-flex text-center border border-primary">
				<div class="col-sm"><p> <t class="font-weight-bold">Sexo:</t> <?php echo $pet->getSexo();?> </p></div>
				<div class="col-sm"><p> <t class="font-weight-bold">Idade:</t> <?php echo $pet->getIdade().' anos';?> </p></div>
				<div class="col-sm"><p> <t class="font-weight-bold">Peso:</t> <?php echo $pet->getPeso();?> </p></div>
			</div>
			<div class="row d-flex text-center border border-primary">
				<div class="col-sm"><p> <t class="font-weight-bold">Informações Adcionais:</t> <?php echo $pet->getInfoAdd();?> </p></div>
				<div class="col-sm"></div>
				<div class="col-sm"></div>
			</div>
			<div class="row d-flex text-center border border-primary">
				<div class="col-sm">
					<h2 class="font-italic"> Informações do Dono </h2>
				</div>
			</div>
			<div class="row d-flex text-center border border-primary">
				<div class="col-sm">
					<p> <t class="font-weight-bold">Proprietario:</t> <?php echo $proprietario->getNome();?></p>
				</div>
				<div class="col-sm">
					<p> <t class="font-weight-bold">CPF:</t> <?php echo $proprietario->getCpf();?></p>
				</div>
				<div class="col-sm">
					<p> <t class="font-weight-bold">Pais:</t> <?php echo $proprietario->getPais();?> </p>
				</div>
			</div>
			
			<div class="row d-flex text-center border border-primary">
				<div class="col-sm">
					<p> <t class="font-weight-bold">Estado:</t> <?php echo $proprietario->getEstado();?></p>
				</div>
				<div class="col-sm">
					<p> <t class="font-weight-bold">Cidade:</t> <?php echo $proprietario->getCidade();?></p>
				</div>
				<div class="col-sm">
					<p> <t class="font-weight-bold">Bairro:</t> <?php echo $proprietario->getBairro();?></p>
				</div>
			</div>
			<div class="row d-flex text-center border border-primary">
				<div class="col-sm">
					<p> <t class="font-weight-bold">Rua:</t> <?php echo $proprietario->getRua();?></p>
				</div>
				<div class="col-sm">
					<p> <t class="font-weight-bold">Numero:</t> <?php echo $proprietario->getNumero();?></p>
				</div>
				<div class="col-sm">
					<p> <t class="font-weight-bold">Telefone:</t> <?php echo $proprietario->getTel();?></p>
				</div>
			</div>
		</div>

	</section>
	

</body>
</html>