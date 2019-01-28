<!DOCTYPE html>
<html>
	<head lang="pt-br">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset='utf-8' http-equiv="Content-Language" content="pt-br"/>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/login.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<!------ Include the above in your HEAD tag ---------->
	</head>
	<body>
		<div class="container">
	        <div id="login-row" class="row justify-content-center align-items-center">
	            <div id="login-column" class="col-md-6">
	                <div class="box">
	                    <div class="shape1"></div>
	                    <div class="shape2"></div>
	                    <div class="shape3"></div>
	                    <div class="shape4"></div>
	                    <div class="shape5"></div>
	                    <div class="shape6"></div>
	                    <div class="shape7"></div>
	                    <div class="float">
	                        <form class="form" method="POST">
	                            <div class="form-group">
	                                <label for="username" class="text-white">Email:</label><br>
	                                <input type="email" name="email" id="username" class="form-control">
	                            </div>
	                            <div class="form-group">
	                                <label for="password" class="text-white">Senha:</label><br>
	                                <input type="password" name="senha" id="password" class="form-control">
	                            </div>
	                            <div class="form-group">
	                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Enviar">
	                            </div>

	                            
								<?php
								  	include 'php/usuario.class.php';
								  	$usuario = new Usuario();
								  	$usuario->login();
								?>
							
	                        </form>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</body>
</html>