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
		include 'php/usuario.class.php';
		include 'php/pet.class.php';
		$usuario = new Usuario();
		$usuario->verificacaoLogin();

		$pet = new Pet();
		
		if (empty($_POST)) {
			header("Location: index.php");
		}else{
			//print_r($_POST);
			$idPet = $_POST['id'];

			//Informações do pet
			$pet->setIDPetPeloId($idPet);
			$pet->setNomeIDPet($idPet);
			$pet->setEspecieIDPet($idPet);
			$pet->setSexoIDPet($idPet);
			$pet->setIdadeIDPet($idPet);
			$pet->setPesoIDPet($idPet);
			$pet->setInfoAddIDPet($idPet);
			$pet->setRacaIDPet($idPet);
		}
	?>
	<div class="container">
		
			<h2 class="text-center">Informações do Pet</h2>
		
				<form method="POST" action="php/updatePet.php">
					
					    <input <?php echo 'value= "'.$pet->getId().'" '; ?> name="petId" type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="CPF" required>
					    
					<div class="form-group">
					    <label for="exampleInputEmail1">Nome:</label>
					    <input <?php echo 'value= "'.$pet->getNome().'" '; ?> name="petNome" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nome" required>
					</div>
					<div class="form-group">
					    <label for="exampleInputEmail1">Especie:</label>
					    <input <?php echo 'value= "'.$pet->getEspecie().'" '; ?> name="petEspecie" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Pais" required>
					</div>
					<div class="form-group">
					    <label for="exampleInputEmail1">Sexo:</label>
					    <input <?php echo 'value= "'.$pet->getSexo().'" '; ?> name="petSexo" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Pais" required>
					</div>
					<div class="form-group">
					    <label for="exampleInputEmail1">Idade:</label>
					    <input <?php echo 'value= "'.$pet->getIdade().'" '; ?> name="petIdade" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Estado" required>
					</div>
					<div class="form-group">
					    <label for="exampleInputEmail1">Peso:</label>
					    <input <?php echo 'value= "'.$pet->getPeso().'" '; ?> name="petPeso" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Cidade" required>
					</div>
					<div class="form-group">
					    <label for="exampleInputEmail1">Raça:</label>
					    <input <?php echo 'value= "'.$pet->getRaca().'" '; ?> name="petRaca" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Bairro" required>
					</div>
					<div class="form-group">
					    <label for="exampleInputEmail1">Informações Adicionais:</label>
					    <input <?php echo 'value= "'.$pet->getInfoAdd().'" '; ?> name="petInfoAdd" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Informações Adicionais">
					</div>
					<div class="form-group">
					    <button type="submit" class="btn btn-primary">Enviar</button>
					</div>
					
				</form>
							
	</div>
	
</body>
</html>