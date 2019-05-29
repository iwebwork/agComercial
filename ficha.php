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
		<title>Ficha</title>
		<style type="text/css">
			
			.espaco{
				padding-right:20px;
			}

			.titleAlinhamentoCenter{
				text-align: center;
				
			}
			.alinhamentoAdireita{
				text-align: right;
			}
			.fontTitulo{
				font-size: 30px;
				font-weight: bold;
			}
			.fontSubTitulo{
				font-size: 16px;
				font-weight: bold;	
			}
			.img{
				float:right;
			}
			.linha{
				border:2px solid 000000;
			}
			.fontTextBold{
				font-weight: bold;
			}
		</style>
	</head>
	<body>
		<div>
			<!--<img src ="img/logo.jpg"/>-->
			<div class="img">
				<pre><h1 class="fontTitulo">              São Lázaro</h1></pre>
			</div>
		</div>
		<hr>
		<div class="titleAlinhamentoCenter">
			<h3>Dados do Pet</h3>
		</div>
		
		<div class="linha">	
		<pre>Nome: <?php echo $pet->getNome();?>
		Especie: <?php echo $pet->getEspecie();?>          Raça: <?php echo $pet->getRaca();?></pre>
		</div>

		<div class="linha">
		<pre>Sexo: <?php echo $pet->getSexo();?>
		Peso: <?php echo str_replace(".",",",$pet->getPeso());?> Kilos         Idade: <?php echo $pet->getIdade();?> anos</pre>
		</div>
		
		<div class="titleAlinhamentoCenter">	
			<h3>Historico clinico do animal</h3>
		</div>
		<?php						
			$string = nl2br($pet->getInfoAdd());						
			echo '<pre>'.$string.'</pre>';
		?>
		<hr>
		<div class="titleAlinhamentoCenter">
			<h3>Informações do Proprietario</h3>
		</div>

		<div class="linha">
			<pre>Nome: <?php echo  $proprietario->getNome();?>
		Cpf: <?php echo $proprietario->getCpf();?>         Cidade: <?php echo $proprietario->getCidade();?></pre>
		</div>
		<div class="linha">
			<pre>Bairro: <?php echo  $proprietario->getBairro();?>
	Rua: <?php echo $proprietario->getRua();?>            Estado: <?php echo$proprietario->getEstado();?></pre>
		</div>
		<div class="linha">
			<pre>Numero: <?php echo  $proprietario->getNumero();?>
		Telefone: <?php echo $proprietario->getTel();?></pre>
		</div>		
		<!--<h1>Eventos</h1>-->
		<hr>
		<div class="titleAlinhamentoCenter">
			<h3>Consultas Marcadas</h3>
		</div>
		<?php 
			include 'php/classes/evento.class.php';
			$eventos = new Eventos();
					
			$idPet = $pet->getId();
					//echo $_POST['idPet'];
			$valores = $eventos->todoseventosDoPet($_POST['idPet']);
					//print_r($valores);
			$eventos->strEventosFicha($valores);
		?>
	</body>
	</html>

	
<?php
	$html = ob_get_contents();
	ob_end_clean();
	//echo $html;
	require_once __DIR__.'/vendor/autoload.php';

	$mpdf = new \Mpdf\Mpdf();
	$mpdf->WriteHTML($html);
	$mpdf->Output();
?>