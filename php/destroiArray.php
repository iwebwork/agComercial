<?php 
	include 'usuario.class.php';
	include 'proprietario.class.php';
	  //include 'php/pet.class.php';
	$usuario = new Usuario();
	$usuario->verificacaoLogin();
	
	$proprietario = new Proprietario();
	$proprietario->destroyArray($_POST);

	header("Location: ../index.php");