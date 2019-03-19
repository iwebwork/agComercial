<?php
	/* Define o local para Holandês(usar pt_BR para o Português(Brasil) ) */
	setlocale (LC_ALL, 'nl_NL');
	include 'classes/usuario.class.php';
	include 'classes/evento.class.php';
	include 'classes/email.class.php';
	include 'classes/pet.class.php';
	include 'classes/proprietario.class.php';
	//$usuario = new Usuario();
	//$usuario->verificacaoLogin();
	$nome = "Igor";
	$e = "igorsiqueira.adm@gmail.com";

	$email = new Email();
	$evento = new Eventos();
	$proprietario = new proprietario();
	$pet = new Pet();

	$eventosDoDia = $evento->eventosDoDia();
	//print_r($eventosDoDia);

	if (empty($eventosDoDia)) {
		echo "Dados estão vindo vazios";
	}else{
		foreach ($eventosDoDia as $value) {
			
			//dados que variam e vem do banco
			$pet->setNomeIDPet($value['id_pet']);
			
			//echo $nome_pet;

			//Informações do proprietario
			$pet->setIDProprietarioPeloIdPet($value['id_pet']);
			$id_pro = $pet->getIdProp();
			//Nome:
			$proprietario->setNomePeloId($id_pro);

			//Telefone:
			$proprietario->setTelPeloId($id_pro);

			//Dados para o envio do email
			$email->setAssunto($value['title']);
			$data = implode( '/', array_reverse( explode( '-', $value['start_date'] ) ) );
			$hora = $value['start_hora'];
			$corpo = 'Ola '.$nome.' no dia '.$data.' as '.$hora.' você tem um '.$email->getAssunto().' agendado com o pet '.
					  $pet->getNome().' e seu dono e '.$proprietario->getNome().' com o telefone: '.$proprietario->getTel()."\r\n".
					  'Ass: contato@agcomercial.com'."\r\n".
					  'Este e um email automatico favor não responder!';
					
			$email->setCorpo($corpo);
			if (empty($nome) || empty($email)) {
						
			}else{
				//echo $email->getCorpo().'<br>';
				$resuldado = $email->enviarEmail($nome,$e,$email->getCorpo());
				if ($resuldado == true) {
					//header("Location: ../index.php");	
				}else{
					echo "Erro ao enviar o email";
				}
			}	
		}
				
	}
	

