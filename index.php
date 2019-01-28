
<!DOCTYPE html>
<html>
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
<link rel="stylesheet" type="text/css" href="css/menu.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<script type="text/javascript" src="js/index.js"></script>

</head>
<body>
	
	<?php
	  include 'php/usuario.class.php';
	  include 'php/proprietario.class.php';
	  //include 'php/pet.class.php';
	  $usuario = new Usuario();
	  $usuario->verificacaoLogin();
	  //$pet = new Pet();

	  

	?>
	
	<div id="wrapper" class="active">
      
	      <!-- Sidebar -->
	            <!-- Sidebar -->
	    <div class="bg-primary" id="sidebar-wrapper">
	      <ul id="sidebar_menu" class="sidebar-nav bg-primary">
	           <li class="sidebar-brand"><a id="menu-toggle" href="#">Menu<span id="main_icon" class="glyphicon glyphicon-align-justify"></span></a></li>
	      </ul>
	        <ul class="sidebar-nav bg-primary" id="sidebar">     
	          <li><a href="index.php"><h4>Pagina Inicial</h4></a></li>
	          <li><a href=""><h4>Ficha</h4></a></li>
	          <li>
	         	<a href="cadastrar.php"><h4>Cadastrar</h4></a>	
	          </li>
	        </ul>
	    </div>
	          
	      <!-- Page content -->
	    <div id="page-content-wrapper">
	        <!-- Keep all page content within the page-content inset div! -->
	        <div class="page-content inset">
		        
		        
				<div class="container-fluid">				    
					<div class="row d-flex justify-content-center">
						
						<div class="col-sm-6">
							<form class="form-group" method="POST">
							    <input name="cpf" type="text" class="form-control" placeholder="Busca pelo CPF ou pelo nome do Proprietario">
							    <span>
							    	<button class="btn btn-primary fa fa-search" type="submit">Enviar</button>
							    </span>
							    <span class="">
							    	<form class="form-group" method="POST">
							    		<input type="hidden" name="todos" value="1">
							    		<button class="btn btn-primary fa fa-search" type="submit">Carregar os donos em ordem alfabetica</button>
							    	</form>
							    </span>
							    
						    </form>

						</div>
							
						
					</div>
				</div>
				
		            

		        <div class="row d-flex justify-content-center">
					<div class="col-sm-10">
						<?php
							$proprietario = new Proprietario();
						    if (!empty($_POST['cpf'])) {
						        $cpf = $proprietario->strListaDePetsCPF($_POST['cpf']);
						        if ($cpf == false) {
						        	$nome = $proprietario->strListaDePetsNome($_POST['cpf']);

						        }
						        	
						    }

						    if(empty($_POST['cpf']) && !empty($_POST['todos'])){
							   	$proprietario->strTodosOsProprietariosEmOrdemAlfabetica();
						      		
							}

						    
						        		
						?>	
					</div>
				</div>

	        </div>
	    </div>
      
    </div>

			<!--<span>
				<form method="POST">
			    	<input name="alfabetica" type="hidden" class="form-control" placeholder="">
			    	<button class="btn btn-primary" type="submit" >Buscar todos em ordem alfabetica</button>
				</form>
		</span>-->
	</div>
	
</body>
</html>
