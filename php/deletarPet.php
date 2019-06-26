<?php
	include_once 'classes/usuario.class.php';
	include_once 'classes/proprietario.class.php';
	include_once 'classes/pet.class.php';
	include_once 'classes/Evento.class.php';
	$usuario = new Usuario();
	$usuario->verificacaoLogin();

	$eventos = new Eventos();
	$pet = new Pet();

	if (!empty($_POST)) {
		//print_r($_POST);
		$idPet = $_POST['idPet'];
		$ev = $eventos->deletarTodosOsEventosDoPetPeloSeuId($idPet);
		if ($ev == true) {
			# code...
			$resultado = $pet->deletarPetPeloId($idPet);
			if ($resultado == true) {
				echo "Deu certo";
				header("Location:../index.php");
			}else{
				header("Location:../index.php");
				//echo "Erro";
			}
		}
		
	}