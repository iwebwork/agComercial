	<?php
		//setlocale(LC_ALL,'pt_BR.UTF8');
		//mb_internal_encoding('UTF8'); 
		//mb_regex_encoding('UTF8');
		//header('Content-Type: text/html; charset=utf-8');
		include_once 'php/classes/usuario.class.php';
		include_once 'php/classes/proprietario.class.php';
		include_once 'php/classes/pet.class.php';
		
		$usuario = new Usuario();
		$usuario->verificacaoLogin();

		$proprietario = new Proprietario();
		$pet = new Pet();
		if (empty($_POST)) {
			header("Location: index.php");
		}else{
			//print_r($_POST);
			$id_propri = $_POST['id_propri'];
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
			$proprietario->setId($id_propri);
			$proprietario->setCpf($id_propri);
			$proprietario->setNome($id_propri);
			$proprietario->setPais($id_propri);
			$proprietario->setEstado($id_propri);
			$proprietario->setCidade($id_propri);
			$proprietario->setBairro($id_propri);
			$proprietario->setRua($id_propri);
			$proprietario->setNumero($id_propri);
			$proprietario->setTel($id_propri);

		}

		ob_start();
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
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
			.img-body{
				width: 80px;
				height: 80px;
				margin-top: 10px;
				border-radius: 10px;
				float: right;
			}
		</style>
	</head>
	<body>
		<div>
			<!--<img src ="img/logo.jpg"/>-->
			
			<div class="img">
				<img class="img-body" src="imagens/logoSaoLazaro.jpg">
				<pre><h1 class="fontTitulo">              São Lázaro</h1></pre>
			</div>
		</div>
		<hr>
		<div class="titleAlinhamentoCenter">
			<h3>Dados do Pet</h3>
		</div>
		
		<div class="linha">	
		<pre>Nome: <?php if(!empty($pet->getNome()))echo $pet->getNome();else echo "Não foi Informado"?>
		Especie: <?php if(!empty($pet->getEspecie())) echo $pet->getEspecie();else echo "Não foi Informado";;?>          Raça: <?php if(!empty($pet->getRaca()))echo $pet->getRaca();else echo "Não foi Informado";?></pre>
		</div>

		<div class="linha">
		<pre>Sexo: <?php if(!empty($pet->getSexo())) echo $pet->getSexo();else echo "Não foi Informado"?>
		Peso: <?php if(!empty($pet->getPeso())) echo str_replace(".",",",$pet->getPeso()." Kilos"); else echo "Não foi Informado"?>         Idade: <?php echo $pet->getIdade();?> anos</pre>
		</div>
		
		<div class="titleAlinhamentoCenter">	
			<h3>Historico clinico do animal</h3>
		</div>
		<?php
		if(!empty($pet->getInfoAdd())){						
			$string = nl2br($pet->getInfoAdd());						
			echo '<pre>'.$string.'</pre>';
		}else{
			echo "Não foi Informado";
		}
		?>
		<hr>
		<div class="titleAlinhamentoCenter">
			<h3>Informações do Proprietario</h3>
		</div>

		<div class="linha">
			<pre>Nome: <?php if(!empty($proprietario->getNome())) echo $proprietario->getNome(); else echo "Não foi Informado" ;?>
		Cpf: <?php if(!empty($proprietario->getCpf())) echo $proprietario->getCpf(); else echo "Não foi Informado" ;?>         Cidade: <?php if(!empty($proprietario->getCidade())) echo $proprietario->getCidade();else echo "Não foi Informado";?></pre>
		</div>
		<div class="linha">
			<pre>Bairro: <?php if(!empty($proprietario->getBairro())) echo  $proprietario->getBairro();else echo "Não foi Informado";?>
	        Rua: <?php if(!empty($proprietario->getRua())) echo $proprietario->getRua();else echo "Não foi Informado"?>                      Estado: <?php if(!empty($proprietario->getEstado())) echo $proprietario->getEstado();else echo "Não foi Informado";?></pre>
		</div>
		<div class="linha">
			<pre>Numero: <?php if(!empty($proprietario->getNumero())) echo  $proprietario->getNumero();else echo "Não foi Informado"?>
		Telefone: <?php if(!empty($proprietario->getTel())) echo $proprietario->getTel();else echo "Não foi Informado";?></pre>
		</div>		
		<!--<h1>Eventos</h1>-->
		<hr>
		<div class="titleAlinhamentoCenter">
			<h3>Consultas Marcadas</h3>
		</div>
		<?php 
			include_once 'php/classes/evento.class.php';
			$eventos = new Eventos();
					
			$idPet = $pet->getId();
					//echo $_POST['idPet'];
			$valores = $eventos->todoseventosDoPet($_POST['idPet']);
					//print_r($valores);
			if(!empty($eventos->strEventosFicha($valores)))
				$eventos->strEventosFicha($valores);
			else echo "Não tem consultas marcadas";
		?>
		<!--<div class="img-body">
			<img src="imagens/logoSaoLazaro.jpg">
		</div>-->
	</body>
	</html>

	
<?php
	$html = ob_get_contents();
	//$html1 = mb_convert_encoding($html, 'UTF-8', 'ISO-8859-1');
	ob_end_clean();
	//echo $html;
	require_once __DIR__.'/vendor/autoload.php';

	$mpdf = new \Mpdf\Mpdf();
	$html1 = mb_convert_encoding($html, 'UTF-8', 'UTF-8');
	$mpdf->WriteHTML($html1);
	$mpdf->Output();
?>