<?php
	include 'classes/usuario.class.php';
	include 'classes/pet.class.php';
	$usuario = new Usuario();
	$usuario->verificacaoLogin();

	$animal = new Pet();
	if (!empty($_POST)) {
			$dadosPet = array(
			'nome' => $_POST['ptNome'],
			'especie' => $_POST['ptEspecie'],
			'raca' => $_POST['ptRaca'],
			'sexo' => $_POST['ptSexo'],
			'idade' => $_POST['ptIdade'],
			'peso' => $_POST['ptPeso'],
			'texto' => $_POST['ptTexto']
			);

			$id = $_POST['id_propri'];
			

			$pet = $animal->inserirPet($dadosPet,$id);
			
			if($pet == true){
				header("Location: ../index.php");
				
			}else{
				echo "Falha ao cadastrar o pet. Tente Novamente!";
			}	
			
	}else{
		header("Location: ../index.php");
	}
	?>