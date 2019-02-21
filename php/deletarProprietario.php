<?php
	include 'classes/usuario.class.php';
	include 'classes/proprietario.class.php';
	include 'classes/pet.class.php';
	$usuario = new Usuario();
	$usuario->verificacaoLogin();

	$proprietario = new Proprietario();
	$pet = new Pet();
	if (!empty($_POST)) {
		$cpf = $_POST['cpf'];

		//Informações do dono
		$proprietario->setId($cpf);
		$idPropri = $proprietario->getId();
		$pet->deletarPetsIdPropri($idPropri);
		$proprietario->deletarProprietario($idPropri);

		header("Location:../index.php");

	}else{
		header("Location:../index.php");
	}