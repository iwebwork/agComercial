
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
	  include 'php/classes/usuario.class.php';
	  $usuario = new Usuario();
	  $usuario->verificacaoLogin();
	?>
	<form method="POST" action="php/addPetCli.php">
		<div class="container-fluid">
			<div class="row justify-content-center">
				<a href="index.php" class="btn btn-primary">
		            Retornar a pagina inicial
		        </a>
			</div>
			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-4">
					<h2 class="text-center">Informações do Pet</h2>
					<div class="form-group">
					    <label for="exampleInputEmail1">Nome:</label>
					    <input name="ptNome" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nome">
					</div>
					<div class="form-group">
						
					    <label for="exampleInputEmail1">Especie:</label>
					    <select name="ptEspecie" class="form-control" id="exampleFormControlSelect1">
						    <option>Canino</option>
						    <option>Felino</option>  
					    </select>
					    
					</div>
					<div class="form-group">
						
					    <label for="exampleFormControlSelect1">Sexo</label>
    					<select name="ptSexo" class="form-control" id="exampleFormControlSelect1">
						    <option>Macho</option>
						    <option>Fêmia</option>  
					    </select>
					</div>
					<div class="form-group">
						
					    <label for="exampleInputEmail1" required>Idade:</label>
					    <input name="ptIdade" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Idade">
					</div>
					<div class="form-group">
						
					    <label for="exampleInputEmail1" required>Raça:</label>
					    <input name="ptRaca" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Raça">
					</div>
					<div class="form-group">
						
					    <label for="exampleInputEmail1" required>Peso:</label>
					    <input name="ptPeso" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Peso EX: 8.90">
					</div>
					<div class="form-group">
						
					    <label for="exampleInputEmail1">Informações Adicionais:</label>
					    <textarea name="ptTexto"  type="text" class="form-control" rows="8"></textarea>
					</div>
				</div>
				
				<div class="col-sm-4">
					<h2 class="text-center">Informações do Dono</h2>
					<div class="form-group">
					    <label for="exampleInputEmail1">CPF:</label>
					    <input name="dnCpf" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="CPF">
					</div>
					<div class="form-group">
					    <label for="exampleInputEmail1">Nome:</label>
					    <input name="dnNome" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nome">
					</div>
					<div class="form-group">
					    <label for="exampleInputEmail1">Pais:</label>
					    <input name="dnPais" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Pais">
					</div>
					<div class="form-group">
					    <label for="exampleInputEmail1">Estado:</label>
					    <input name="dnEstado" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Estado">
					</div>
					<div class="form-group">
					    <label for="exampleInputEmail1">Cidade:</label>
					    <input name="dnCidade" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Cidade">
					</div>
					<div class="form-group">
					    <label for="exampleInputEmail1">Bairro:</label>
					    <input name="dnBairro" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Bairro">
					</div>
					<div class="form-group">
					    <label for="exampleInputEmail1">Rua:</label>
					    <input name="dnRua" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Rua">
					</div>
					<div class="form-group">
					    <label for="exampleInputEmail1">Numero:</label>
					    <input name="dnNumero" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Numero">
					</div>
					<div class="form-group">
					    <label for="exampleInputEmail1">Telefone:</label>
					    <input name="dnTel" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Telefone">
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
