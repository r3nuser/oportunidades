<?php 
include("conexao.php");
include("returnID.php");
$con = open_connection();
session_start();

//Receiving data using the post method

//Personal data
	
	$nome = $_SESSION['nome'];
	$data = $_SESSION['BrazilianDateTimeFormat'];
	$CPF = $_SESSION['CPF'];
	$telefone1 = $_SESSION['telefone1'];
	$telefone2 = $_SESSION['telefone2'];
	$email = $_SESSION['email'];
	$CEP = $_SESSION['CEP'];
	$rua = $_SESSION['rua'];
	$bairro = $_SESSION['bairro'];
	$cidade = $_SESSION['cidade'];
	$numeroResidencia = $_SESSION['numeroResidencia'];
	$curso=$_SESSION['curso'];

	//Social Data
	
	$job = $_POST['job'];
	$expectativa = $_POST['expectativa'];
	$discoveredTheCourse = $_POST['discoveredTheCourse'];
	
	

	if ($expectativa=="Outra"){
		$expectativa = $_POST['ExpectativaInput'];
	}
	if ($discoveredTheCourse=="Outro"){
		$discoveredTheCourse = $_POST['discoveredTheCourseInput'];
	}
	
	//Null field verification
	
	
	function exibe($campoRecebido){
		return "$campoRecebido";
	}
	function NotSelecionar($input)
	{
		if($input=="Selecionar"){
			
			echo "<script> alert('preencha corretamente o questionário socioeconômico');</script>";
			echo "<script>history.back();</script>";
			
		}else
		{
			return exibe($input);
		}	
	}
		echo"
		<html>
		<head>
		<link REL='SHORTCUT ICON' HREF='icones/favicon.ico'>
		<title>Confirmar dados</title>
		<link REL='STYLESHEET' HREF='CSS/STYLE.CSS' TYPE='TEXT/CSS'/>
		<script type='text/javascript' src='Javascript/checkFields.js'></script>
		<script type='text/javascript' src='Javascript/prepareForPrinting.js'></script>
		</head>	
		<body>
		<center>
		<div class='caixa'>
		<h1>Confirme Seus Dados</h1>
		<p class='separador'>Dados Pessoais</p>
		<b>Nome:</b> ".$nome.
		"<br>
		<b>Data De Nascimento: </b>
		".$data.
		"<br>
		<b>CPF: </b>
		".$CPF.
		//mostrando os contatos
		"<br>
		<p class='separador'>Contato</p>
		<b>Telefone/Celular01: </b>
		".$telefone1.
		"<br>
		<b>Telefone/Celular02: </b>
		".$telefone1.
		"<br>
		<b>E-mail: </b>
		".$email.
		"<br>".
		//Mostrando endereço
		"<p class='separador'>Endereço</p>
		<b>CEP: </b>
		".$CEP."
		<br>
		<b> Rua: </b>
		".$rua."
		<br>
		<b>Bairro: </b>
		".$bairro."
		<br>
		<b>Cidade: 	</b>
		".$cidade."
		<br>
		<b>Número da Residência:</b>
		".$numeroResidencia.
		
		//Mostrar curso escolhido
		"<p class='separador'>Cursos</p> 
		<b>Curso: </b>
		".$curso.
		"<br>".
		//Mostrar dados socioeconômicos
		"<p class='separador'>Informações Socioeconômicas</p>
		<br>
		<b>Trabalha? </b>
		".NotSelecionar($job)."
		<br>
		<br>
		<b>Qual sua expectativa com o curso?</b>
		<br>
		".NotSelecionar($expectativa)."
		<br>
		<br>
		<b>Como ficou sabendo sobre os cursos presenciais do oportunidades?</b>
		<br>
		".NotSelecionar($discoveredTheCourse)."
		<br>
		<br>
		<div id='some' class='bntDiv'>
		<input onclick='Voltar()' class='bnt' type='button' value='voltar'/> <input class='bnt' type='button' value='imprimir' onclick=\"desabilitar('some');trocarDiv('caixa','caixaImprimir');imprimir();trocarDiv('caixaImprimir','caixa');habilitar('some');\"/>  <input id='ocultar' class='bnt' type='button' value='Confirmar' onclick='javascript: location.href=\"sendToDatabase.php\";'/>
		</div>
		<br>
		</div>
		</center>
		</body>
		</html>";
	
	
	// putting the data caught in a "session"
	
	$_SESSION['job']=$job;
	$_SESSION['expectativa']=$expectativa;
	$_SESSION['discoveredTheCourse']=$discoveredTheCourse;	
	$_SESSION['numeroResidencia']=$numeroResidencia;
	?>
