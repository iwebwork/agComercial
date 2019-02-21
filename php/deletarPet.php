<?php
	include 'classes/usuario.class.php';
	include 'classes/proprietario.class.php';
	include 'classes/pet.class.php';
	$usuario = new Usuario();
	$usuario->verificacaoLogin();

	$pet = new Pet();

	if (!empty($_POST)) {
		$idPet = $_POST['idPet'];
		$resultado = $pet->deletarPetPeloId($idPet);
		if ($resultado == false) {
			header("Location:../index.php");
		}else{
			header("Location:../index.php");
			//echo "Pet excluido com sucesso";
		}
	}