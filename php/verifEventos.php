<?php
	include 'classes/pet.class.php';
	$tipo = "aberto";
	print_r($_POST);
	if(empty($_POST['tipo1']) && empty($_POST['tipo2'])){
		//Ela quer aberto
		
		$pet = new Pet();
		$pet->setIdSemBusca($_POST['idPet']);
		header('Location: ../eventosAmbos.php?pet='.$pet->getId());
	}else if(!empty($_POST['tipo1']) && empty($_POST['tipo2'])){
		//Ela quer aberto mas foi selecionado

		$pet = new Pet();
		$pet->setIdSemBusca($_POST['idPet']);
		//print_r($_GET);
		header('Location: ../eventosAbertos.php?pet='.$pet->getId());
	}else if(empty($_POST['tipo1']) && !empty($_POST['tipo2'])){
		// Ela quer fechado
		//echo "Entrou para chamar os fechados";
		$pet = new Pet();
		$pet->setIdSemBusca($_POST['idPet']);
		//print_r($_GET);
		header('Location: ../eventosFechados.php?pet='.$pet->getId());
	}else if(!empty($_POST['tipo1']) && !empty($_POST['tipo2'])){
		//Ela quer ambos

		$pet = new Pet();
		$pet->setIdSemBusca($_POST['idPet']);
		header('Location: ../eventosAmbos.php?pet='.$pet->getId());
	}else{
		echo "O id do pet veio vazio";
		//header('Location: ../eventosAbertos.php');
	}