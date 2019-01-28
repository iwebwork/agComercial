<?php 
	setlocale(LC_ALL,'pt_BR.UTF8');
		mb_internal_encoding('UTF8'); 
		mb_regex_encoding('UTF8');
		include 'usuario.class.php';
		include 'pet.class.php';
		$usuario = new Usuario();
		$usuario->verificacaoLogin();

		$pet = new Pet();

		if (!empty($_POST)) {
			$dados = $_POST;
			$pet->atualizarPet($dados);
		}else{
			echo "Os dados não foram enviados";
		}