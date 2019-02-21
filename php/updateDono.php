<?php 
	setlocale(LC_ALL,'pt_BR.UTF8');
		mb_internal_encoding('UTF8'); 
		mb_regex_encoding('UTF8');
		include 'classes/usuario.class.php';
		include 'classes/proprietario.class.php';
		$usuario = new Usuario();
		$usuario->verificacaoLogin();

		$proprietario = new Proprietario();

		if (!empty($_POST)) {
			$dados = $_POST;
			$proprietario->atualizarDono($dados);
		}else{
			echo "Os dados não foram enviados";
		}