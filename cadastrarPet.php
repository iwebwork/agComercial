
<!DOCTYPE html>
<html>
<head lang="pt-br">
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
<!-- Meus arquivos -->
<link rel="stylesheet" type="text/css" href="css/body.css">
<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
	
	<?php
	  include 'php/usuario.class.php';
	  include 'php/proprietario.class.php';
	  $usuario = new Usuario();
	  $usuario->verificacaoLogin();
	  $proprietario = new Proprietario();
	  if(!empty($_POST)){
	  	$proprietario->setId($_POST['cpf']);
	  	//echo $proprietario->getId(); 
	  }

	?>
	<form method="POST" action="php/addPet.php">
		

		<input class="none" <?php echo 'value= "'.$proprietario->getId().'" ' ?> name="proId" type="hidden" required>
		
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					<h2 class="text-center">Informações do Pet</h2>
					<div class="form-group">
					    <label for="exampleInputEmail1" required>Nome:</label>
					    <input name="ptNome" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nome" required>
					</div>
					<div class="form-group">
						
					    <label for="exampleInputEmail1" required>Especie:</label>
					    <select name="ptEspecie" class="form-control" id="exampleFormControlSelect1">
						    <option>Canino</option>
						    <option>Felino</option>  
					    </select>
					    
					</div>
					<div class="form-group">
						
					    <label for="exampleFormControlSelect1" required>Sexo</label>
    					<select name="ptSexo" class="form-control" id="exampleFormControlSelect1">
						    <option>Macho</option>
						    <option>Femia</option>  
					    </select>
					</div>
					<div class="form-group">
						
					    <label for="exampleInputEmail1" required>Idade:</label>
					    <input name="ptIdade" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Idade" required>
					</div>
					<div class="form-group">
						
					    <label for="exampleInputEmail1" required>Raça:</label>
					    <input name="ptRaca" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Raça" required>
					</div>
					<div class="form-group">
						
					    <label for="exampleInputEmail1" required>Peso:</label>
					    <input name="ptPeso" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Peso EX: 8.90" required>
					</div>
					<div class="form-group">
						
					    <label for="exampleInputEmail1">Informações Adicionais:</label>
					    <textarea name="ptTexto"  type="text" class="form-control" rows="8"></textarea>
					</div>
				</div>
				<div class="col-sm-2">
					
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-4">

			</div>
			<div class="col-sm-4">
				
				<button type="submit" class="btn btn-primary d-flex justify-content-center btn-lg btn-block">Enviar</button>
				
			</div>
			<div class="col-sm-4">

			</div>
		</div>
		
		
		
	</form>
</body>
</html>
