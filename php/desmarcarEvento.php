<?php
    include 'classes/usuario.class.php';
	include 'classes/evento.class.php';
	include 'classes/email.class.php';
	include 'classes/pet.class.php';
	include 'classes/proprietario.class.php';
	$usuario = new Usuario();
	$usuario->verificacaoLogin();
	
    if(!empty($_POST['idConsulta'])){
        $evento = new Eventos();
        $valor = $evento->desmarcarEventos($_POST['idConsulta']);
        if($valor == true){
            header("Location:../index.php");
        }else{
            echo "Erro não funcionou";
        }
    }else{

    }
    

	