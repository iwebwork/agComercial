<?php
	
	//print_r($_POST);
	include 'classes/usuario.class.php';
	include 'classes/evento.class.php';
	$usuario = new Usuario();
	$usuario->verificacaoLogin();

	$evento = new Eventos();
	if (!empty($_POST)) {
		//print_r($_POST);

		//$titulo,$dataI,$horaI,$dataT,$horaT,$info,$status,$pet
		$evento->insertEvents($_POST["tipoEvento"],$_POST["dataInicio"],$_POST["horaInicio"],$_POST["dataTermino"],$_POST["horaTermino"],
		$_POST["evTexto"],$_POST["status"],$_POST["idPet"]);
		//echo " Funcionou";
	}else{
		echo "Erro ao inserir o evento";
	}


	