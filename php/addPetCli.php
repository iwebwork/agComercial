
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		include_once 'classes/pet.class.php';
		include_once 'classes/proprietario.class.php';
		include_once 'classes/usuario.class.php';
	  	$usuario = new Usuario();
	  	$usuario->verificacaoLogin();
		
		$animal = new Pet();
		$proprietario = new proprietario();
		if (!empty($_POST)) {
			$dadosPet = array(
			'nome' => $_POST['ptNome'],
			'especie' => $_POST['ptEspecie'],
			'raca' => $_POST['ptRaca'],
			'sexo' => $_POST['ptSexo'],
			'idade' => $_POST['ptIdade'],
			'peso' => $_POST['ptPeso'],
			'texto' => $_POST['ptTexto'],
			'id_pro' => $proprietario->getId()
			);
			$dadosPropri = array(
				'cpf' => $_POST['dnCpf'],
				'nome' => $_POST['dnNome'],
				'pais' => $_POST['dnPais'],
				'estado' => $_POST['dnEstado'],
				'cidade' => $_POST['dnCidade'],
				'bairro' => $_POST['dnBairro'],
				'rua' => $_POST['dnRua'],
				'numero' => $_POST['dnNumero'],
				'telefone' => $_POST['dnTel'],

			);

			$dono = $proprietario->inserirProp($dadosPropri);
			if($dono == false){
				echo "Falha ao cadastrar o dono";
			}else{
				$proprietario->setId($dadosPropri['cpf']);
				
				$id = $proprietario->getId();
				$pet = $animal->inserirPet($dadosPet,$id);
				
				if($pet == false){
					echo "Falha ao cadastrar o pet";
				}else{
					echo '<script type="text/javascript">alert("Todos os dados foram deletados com sucesso");</script>';
					header("Location: ../index.php");
				}
			}
			
							
			
		}else{
			header("Location: ../cadastrar.php");
		}
	?>
</body>
</html>	