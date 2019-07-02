<?php
	include_once 'classes/usuario.class.php';
	include_once 'classes/proprietario.class.php';
	include_once 'classes/pet.class.php';
	include_once 'classes/Evento.class.php';

	$usuario = new Usuario();
	$usuario->verificacaoLogin();

	$proprietario = new Proprietario();
	$evento = new Eventos();
	$pet = new Pet();
	if (!empty($_POST)) {
		//print_r($_POST);
		
		$id_propri = $_POST['id_propri'];

		//Informações do dono
		$proprietario->setId($id_propri);
		$idPropri = $proprietario->getId();
		$pet->setIdPetPeloIdProprietario($idPropri);
		$idPet = $pet->getId();
		echo $idPropri." ".$idPet;
		
		$ev = $evento->deletarTodosOsEventosDoPetPeloSeuId($idPet);
		if($ev == true){
			$p = $pet->deletarPetsIdPropri($idPropri);
			if($p == true){
				$pro = $proprietario->deletarProprietario($idPropri);
				if($pro == true){
					//echo "Todos os dados foram deletados com sucesso";
					echo '<script type="text/javascript">alert("Todos os dados foram deletados com sucesso");</script>';
					header("Location:../index.php");
				}else{
					echo "Erro ao excluir o proprietario";
				}
			}else{
				echo "Erro ao excluir o pet";
			}
			

			//header("Location:../index.php");
		}else{
			echo "Erro ao excluir os eventos";
		}
		

	}else{
		echo "Os dados não foram enviados";
		//header("Location:../index.php");
	}