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
	
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/formDateTime.js"></script>

	<title>AgComercial</title>
</head>
<body>
	
	<section>
		
		<div class="container-fluid">
			<div class="row d-flex text-center">
				<div class="col-sm-6">
					<a class="btn btn-primary" href="index.php">Voltar a Pagina Inicial</a>
				</div>
				
			</div>
		</div>
	</section>
	<section id="consulta">
		<form method="POST" action="php/marcarConsulta.php">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-8">
						<h2 class="text-center">Marcar Consulta</h2>
						<!-- Dados dos Eventos
							id_evento, titulo = Vacina,Banho e tosa, color (Se for: 1 = Vacina(Amarelo). 2 = Banho e tosa(Azul)), dia/mes/ano hora_inicio,dia/mes/ano hora_termino(Opcional), info_add,status(0 = aberto, 1 = finalizado) ,pet
						-->
						<div class="form-group">
							<label for="exampleInputEmail1">Evento:</label>
							<select name="tipoEvento" class="form-control" id="exampleFormControlSelect1">
								<option value="1">Vacina</option>
								<option value="2">Banho e tosa</option>
								<option value="3">Vernifugo</option> 
							</select>
						</div>
						<div class="form-group">	
							<label for="exampleInputEmail1">Data e Hora de Inicio</label>
					        <input class="form-control" type="date" name="dataInicio" required>
					    </div>
					    <div class="form-group">	
					        <input class="form-control" type="time" name="horaInicio">
					    </div>
						<div class="form-group">	
							<label for="exampleInputEmail1">Data e Hora de Termino (Opcional)</label>
					        <input class="form-control" type="date" name="dataTermino">
					    </div>
					    <div class="form-group">	
					        <input class="form-control" type="time" name="horaTermino">
					    </div>
					    <div class="form-group">	
							<label for="exampleInputEmail1">Informações adcionais</label>
					        <textarea name="evTexto"  type="text" class="form-control" rows="8"></textarea>
					    </div>
					    <input type="hidden" name="status" value="0" >
					    <input type="hidden" name="idPet" <?php echo 'value ="'.$_POST["idPet"].'"'?> >
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
			</div>
		</form>
	</section>

	<?php
		//echo $_POST["cpf"].'<br>';
		//echo $_POST["idPet"];
	?>
</body>
</html>