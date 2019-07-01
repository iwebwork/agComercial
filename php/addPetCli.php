
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
			//Chave aleatoria
			$numero_de_bytes = 4;
			$restultado_bytes = random_bytes($numero_de_bytes);
			$resultado_final = bin2hex($restultado_bytes);

			//echo $resultado_final;
			$dadosPropri = array(
				'cpf' => $_POST['dnCpf'],
				'key' => $resultado_final,
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
			if($dono == true){
				echo "proprietario cadastrado com sucesso";
				$proprietario->setIdPelaKey($dadosPropri['key']);
				$pet = $animal->inserirPet($dadosPet,$proprietario->getId());
				if($pet == true){
					echo "Dados cadastrados com sucesso";
					header("Location: ../index.php");
				}else{
					echo "Erro ao cadastrar o pet";
				}
			}else{
				echo "Erro ao cadastrar o dono";
			}
			
							
			
		}else{
			header("Location: ../cadastrar.php");
		}
	?>
</body>
</html>	