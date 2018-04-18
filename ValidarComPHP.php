<?php 
session_start();

//Receiving data using the post method

//Personal data
	
	$nome = $_POST['nome'];
	$data = $_POST['data'];
	$CPF = $_POST['CPF'];
	$telefone1 = $_POST['telefone'];
	$telefone2 = $_POST['celular'];
	$email = $_POST['email'];
	$CEP = $_POST['CEP'];
	$rua = $_POST['rua'];
	$bairro = $_POST['bairro'];
	$cidade = $_POST['cidade'];

	$ano=date("Y")-16;
	$dia=date("d");
	$mes=date("m");
	
	// convert date format to know the age of the candidate

	$BrazilianDateTimeFormat = DateTime::createFromFormat('d/m/Y', $data);
	$AmericanDateTimeFormat = $BrazilianDateTimeFormat->format('Y-m-d');

	if(strtotime($AmericanDateTimeFormat)> strtotime(''.$ano.'-'.$mes.'-'.$dia.''))
	{	
		echo "<script> alert('É necessário ter no mínimo 16 anos para se inscrever no oportunidES');</script>";
		echo "<script>history.back(1);</script>";
	}
//Switch -> Curso

	$curso = $_POST['escolha'];

//Social Data

	$job = $_POST['job'];
	$expectativa = $_POST['expectativa'];
	$discoveredTheCourse = $_POST['discoveredTheCourse'];
	


	if ($expectativa=="Outra")
	{
		$expectativa = $_POST['ExpectativaInput'];
	}

	if ($discoveredTheCourse=="Outro")   
	{
		$discoveredTheCourse = $_POST['discoveredTheCourseInput'];
	}

	// putting the data caught in a "session"

	$_SESSION['nome']=$nome;
	$_SESSION['data']=$AmericanDateTimeFormat;
	$_SESSION['CPF']=$CPF;
	/*---*/
	$_SESSION['telefone1']=$telefone1;
	$_SESSION['telefone2']=$telefone2;
	$_SESSION['email']=$email;
	$_SESSION['CEP']=$CEP;
	$_SESSION['rua']=$rua;
	$_SESSION['bairro']=$bairro;
	$_SESSION['cidade']=$cidade;
	/*-----*/
	$_SESSION['curso']=$curso;
	/*-----*/
	$_SESSION['job']=$job;
	$_SESSION['expectativa']=$expectativa;
	$_SESSION['discoveredTheCourse']=$discoveredTheCourse;	


//Null field verification


	function exibe($campoRecebido)
	{

		return "$campoRecebido";
	}

	function NotNull($input)
	{
		if($input=="")
		{
			echo "<script> alert('PHP ERRO: Existem campos vazios que precisam ser preenchidos ');</script>";
			echo "<script>history.back(1);</script>";
			
		}
		else
		{
			return exibe($input);
		}	
	}
	function NotSelecionar($input)
	{
		if($input=="Selecionar")
		{
			echo "<script> alert('Existem campos vazios que precisam ser preenchidos');</script>";
			echo "<script>history.back(1);</script>";
			
		}
		else
		{
			return exibe($input);
		}	
	}
	

//Showing Data
	echo"
		<html>
			<head>
				<link REL='SHORTCUT ICON' HREF='icones/favicon.ico'>
				<title>Confirmar dados</title>
				<link REL='STYLESHEET' HREF='CSS/STYLE.CSS' TYPE='TEXT/CSS'/>
				<script type='text/javascript' src='scripts_js/valid_data.js'></script>
			</head>	
			<body>
				<center>
					<div class='caixa'>
						<h1>Confirme Seus Dados</h1>
						<p class='separador'>Dados Pessoais</p>
						Nome: ".NotNull($nome).
						"<br>
						Data: ".NotNull($data).
						"<br>
						CPF: ".NotNull($CPF).
						"<br>".
						//mostrando os contatos
						"<br>
						<p class='separador'>Contato</p>
						Telefone/Celular01: 
						".NotNull($telefone1).
						"<br>
						Telefone/Celular02 
						".NotNull($telefone1).
						"<br>
						E-mail: 
						".NotNull($email).
						"<br>".
						//Mostrando endereço
						 "<p class='separador'>Endereço</p>
						 CEP: 
						 ".NotNull($CEP)."
						 <br>
						 Rua: 
						 ".NotNull($rua)."
						 <br>
						 Bairro: 
						 ".NotNull($bairro)."
						 <br>
						 Cidade: 	
						 ".NotNull($cidade)."".
						//Mostrar curso escolhido
						 "<p class='separador'>Cursos</p> 
						 Curso: 
						 ".NotNull($curso).
						 "<br>".
						//Mostrar dados socioeconômicos
						 "<p class='separador'>Informações Socioeconômicas</p>
						 <br>
						 Trabalha? 
						".NotSelecionar($job)."
						<br>
						Qual sua expectativa com o curso?
						<br>
						".NotSelecionar($expectativa)."
						<br>
						<br>
						Como ficou sabendo sobre os<br>cursos presenciais do oportunidades?
						<br>
						".NotSelecionar($discoveredTheCourse)."
						<br>
						<br>
						<div class='bntDiv'>
							<input onclick='Voltar()' class='bnt' type='button' value='voltar'/> <input class='bnt' type='button' value='Confirmar' onclick='javascript: location.href=\"sendToDatabase.php\";'/>
						</div>
						<br>
					</div>
				</center>
			</body>
		</html>";
?>
