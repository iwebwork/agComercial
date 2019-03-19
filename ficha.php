

	<?php
		setlocale(LC_ALL,'pt_BR.UTF8');
		mb_internal_encoding('UTF8'); 
		mb_regex_encoding('UTF8');
		include 'php/classes/usuario.class.php';
		include 'php/classes/proprietario.class.php';
		include 'php/classes/pet.class.php';
		
		$usuario = new Usuario();
		$usuario->verificacaoLogin();

		$proprietario = new Proprietario();
		$pet = new Pet();
		if (empty($_POST)) {
			header("Location: index.php");
		}else{
			//print_r($_POST);
			$cpf = $_POST['cpf'];
			$idPet = $_POST['idPet'];
			//echo $idPet;
			//echo $cpf;

			//Informações do pet
			$pet->setNomeIDPet($idPet);
			$pet->setEspecieIDPet($idPet);
			$pet->setSexoIDPet($idPet);
			$pet->setIdadeIDPet($idPet);
			$pet->setPesoIDPet($idPet);
			$pet->setInfoAddIDPet($idPet);
			$pet->setRacaIDPet($idPet);
			//$pet->setIDPetPeloId($idPet);


			//Informações do dono
			$proprietario->setId($cpf);
			$proprietario->setCpf($cpf);
			$proprietario->setNome($cpf);
			$proprietario->setPais($cpf);
			$proprietario->setEstado($cpf);
			$proprietario->setCidade($cpf);
			$proprietario->setBairro($cpf);
			$proprietario->setRua($cpf);
			$proprietario->setNumero($cpf);
			$proprietario->setTel($cpf);

		}

		ob_start();
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
	<body>
		<h2>Nome do pet:</h2><h6><?php echo $pet->getNome();?></h6>
		<h2>Especie:</h2> <h6><?php echo $pet->getEspecie();?> 
		<h2>Raça:</h2><h6><?php echo $pet->getRaca();?> 

		<h2>Sexo:</h2><h6><?php echo $pet->getSexo();?> 
		<h2>Idade:</h2><h6><?php echo $pet->getIdade().' anos';?> 
		<h2>Peso:</h2> <h6><?php echo $pet->getPeso();?>
		<h2>Historico clinico do animal:</h2>
		<?php
								
								
		$string = nl2br($pet->getInfoAdd());
								
		echo $string;
								
								

		?>
		<h1>Informações do Proprietario</h1>
		<h2>Proprietario:</h2><h6><?php echo $proprietario->getNome();?>
		<h2>cpf:</h2><h6><?php echo $proprietario->getCpf();?>
		<h2>Pais:</h2><h6><?php echo $proprietario->getPais();?>
					
		<h2>Estado:</h2><?php echo $proprietario->getEstado();?>
					
		<h2>Cidade:</h2><?php echo $proprietario->getCidade();?></p>
		<h2>Bairro:</h2><?php echo $proprietario->getBairro();?>
					
				
		<h2>Rua:</h2><h6><?php echo $proprietario->getRua();?>
		<h2>Numero:</h2><h6><?php echo $proprietario->getNumero();?></p>
		<h2>Telefone:</h2><h6><?php echo $proprietario->getTel();?></p>
		<h1>Eventos</h1>
			
		<?php 
			include 'php/classes/evento.class.php';
			$eventos = new Eventos();
					
					//$idPet = $pet->getId();
					//echo $_POST['idPet'];
			$valores = $eventos->eventosDoPet($_POST['idPet']);
					//print_r($valores);
			$eventos->strEventosFicha($valores);
		?>	
	</body>
	</html>

	
<?php
	$html = ob_get_contents();
	ob_end_clean();
	//echo $html;
	include 'vendor/autoload.php';

	$mpdf = new mPDF();
	$mpdf->WriteHTML($html);
	$mpdf->Output();
?>