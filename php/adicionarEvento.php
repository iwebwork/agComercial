<?php

	include 'evento.class.php';
	
	$evento = new Eventos();
	//print_r($_POST);
	

	//Não são obrigatorios
	if(!empty($_POST["hora-inicio"])){
		$horaI = $_POST["hora-inicio"];
	}else{
		$horaI = '';
	}

	if(!empty($_POST["data-termino"])){
		$dataT = $_POST["data-termino"];
	}else{
		$dataT = '';
	}

	if(!empty($_POST["hora-termino"])){
		$horaT = $_POST["hora-termino"];
	}else{
		$horaT = '';
	}

	if(!empty($_POST["color"])){
		$color = $_POST["color"];
	}else{
		$color = "#0071c5";
	}

	//São obrigatorios
	if(!empty($_POST["evento"]) && !empty($_POST["data-inicio"])){
		$texto = $_POST["evento"];
		$dataI = $_POST["data-inicio"];
		//$evento->insertEvents($texto, $dataI, $horaI, $dataT,$horaT, $color);
		//header("Location: ../calendario.php");
		//$evento->getItens();
		//Funcionou
		echo $texto. $dataI. $horaI. $dataT.$horaT . $color;
	}	
