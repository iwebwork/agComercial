
<!DOCTYPE html>
<?php 
	
	date_default_timezone_get('America/Brasilia');

?>
<html>
<title>Pagina Inicial</title>
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
<link rel="stylesheet" type="text/css" href="css/evento.css">
<script type="text/javascript" src="js/menu.js"></script>

</head>
<body>
	
	<?php
	  include 'php/classes/usuario.class.php';
	  include 'php/classes/proprietario.class.php';
	  include 'php/classes/evento.class.php';
	  include 'php/classes/pet.class.php';
	  $usuario = new Usuario();
	  $usuario->verificacaoLogin();
	  //$pet = new Pet();
	?>
	
	<div class="wrapper">
	    <!-- Sidebar -->
	    <nav id="sidebar">
	        <div class="sidebar-header">
	            <h3>AgComercial</h3>
	        </div>

	        <ul class="list-unstyled components">
	            <!--<p>Dummy Heading</p>-->
	            <li class="active">
	                <!--<a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pagina Inicial</a>
	                <ul class="collapse list-unstyled" id="homeSubmenu">
	                    <li>
	                        <a href="#">Home 1</a>
	                    </li>
	                    <li>
	                        <a href="#">Home 2</a>
	                    </li>
	                    <li>
	                        <a href="#">Home 3</a>
	                    </li>
	                </ul>
	            </li>-->
	            <li>
	                <a href="index.php">Pagina Inicial</a>
	            </li>
	            <li>
	                <a href="cadastrar.php">Cadastrar</a>
	            </li>
	            <!--<li>
	                <a href="php/notificacaoDiaria.php">E-mail</a>
	            </li>-->
	            <!--<li>
	                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
	                <ul class="collapse list-unstyled" id="pageSubmenu">
	                    <li>
	                        <a href="#">Page 1</a>
	                    </li>
	                    <li>
	                        <a href="#">Page 2</a>
	                    </li>
	                    <li>
	                        <a href="#">Page 3</a>
	                    </li>
	                </ul>
	            </li>-->
	            <!--<li>
	                <a href="#">Ficha</a>
	            </li>-->
	            <!--<li>
	                <a href="#">Contact</a>
	            </li>-->
	        </ul>
	    </nav>

	    <div id="content">
		    <div class="container-fluid ">
		       	<div class="row d-flex justify-content-between">
			        <div class="col-sm">
			        	<button type="button" id="sidebarCollapse" class="btn btn-primary">
				            <i class="fas fa-align-left"></i>
				            <span>Menu</span>
				        </button>	
			        </div>
					<?php
						if(!empty($_POST['idPet'])){
							$eventos = new Eventos();

							$pet = new Pet();
							$pet->setNomeIDPet($_POST['idPet']);
							//echo $pet->getNome();
							//print_r($eventos->eventosDoPet($_POST['idPet']));
							$eventos->strListaEventosPet($pet->getNome(),$eventos->eventosDoPet($_POST['idPet']));	
						}else{
							//echo 'id do pet veio vazio'.'<br>';
						}
						
					?>   
				</div>

		    </div>

	<!-- Fim do site -->
	</div>


	
	
</body>
</html>
