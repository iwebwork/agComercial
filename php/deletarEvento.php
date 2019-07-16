<?php
	include_once 'classes/usuario.class.php';
	include_once 'classes/proprietario.class.php';
	include_once 'classes/pet.class.php';
	include_once 'classes/Evento.class.php';

	$usuario = new Usuario();
	$usuario->verificacaoLogin();

	$evento = new Eventos();
	if(!empty($_POST)){
		$return = $evento->deletarEvento($_POST['idConsulta']);
		if($return == true){
			header("Location: ../index.php");
		}else{
			echo "Erro ao deletarEvento";
		}
	}else{
		echo "Post foi vazio";
	}