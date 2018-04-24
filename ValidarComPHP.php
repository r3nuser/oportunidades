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
	$numeroResidencia = $_POST['numeroResidencia'];

	$ano=date("Y")-16;
	$dia=date("d");
	$mes=date("m");
	
	// convert date format to know the age of the candidate

	$BrazilianDateTimeFormat = DateTime::createFromFormat('d/m/Y', $data);
	$AmericanDateTimeFormat = $BrazilianDateTimeFormat->format('Y-m-d');

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
	
	
	
	//Null field verification
	
	
	function exibe($campoRecebido)
	{
		
		return "$campoRecebido";
	}
	
	function NotNull($input,$campo)
	{
		if($input=="")
		{	
			echo "<script> alert('Existem campos vazios que precisam ser preenchidos: ".$campo."');</script>";
			echo "<script>history.back();</script>";
			
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
			echo "<script> alert('preencha corretamente o questionário socioeconômico');</script>";
			echo "<script>history.back();</script>";
			
		}
		else
		{
			return exibe($input);
		}	
	}
	
	if(strtotime($AmericanDateTimeFormat)> strtotime(''.$ano.'-'.$mes.'-'.$dia.''))
	{	
		echo "<script> alert('É necessário ter no mínimo 16 anos para se inscrever no oportunidES');</script>";
		echo "<script>history.back();</script>";
	}else{
	
		//Showing Data
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
		<b>Nome:</b> ".NotNull($nome,'Nome').
		"<br>
		<b>Data De Nascimento: </b>
		".NotNull($data,'Data De Nascimento').
		"<br>
		<b>CPF: </b>
		".NotNull($CPF,'CPF').
		"<br>".
		//mostrando os contatos
		"<br>
		<p class='separador'>Contato</p>
		<b>Telefone/Celular01: </b>
		".NotNull($telefone1,'Telefone/Celular01').
		"<br>
		<b>Telefone/Celular02: </b>
		".NotNull($telefone1,'Telefone/Celular02').
		"<br>
		<b>E-mail: </b>
		".NotNull($email,'E-mail').
		"<br>".
		//Mostrando endereço
		"<p class='separador'>Endereço</p>
		<b>CEP: </b>
		".NotNull($CEP,'CEP')."
		<br>
		<b> Rua: </b>
		".NotNull($rua,'Rua')."
		<br>
		<b>Bairro: </b>
		".NotNull($bairro,'Bairro')."
		<br>
		<b>Cidade: 	</b>
		".NotNull($cidade,'Cidade')."
		<br>
		<b>Número da Residência:</b>
		".NotNull($numeroResidencia,'Número da Residência')."".
		
		//Mostrar curso escolhido
		"<p class='separador'>Cursos</p> 
		<b>Curso: </b>
		".NotNull($curso,'Curso').
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
		<input onclick='Voltar()' class='bnt' type='button' value='voltar'/> <input class='bnt' type='button' value='imprimir' onclick=\"desabilitar('some');trocarDiv('caixa','caixaImprimir');imprimir();trocarDiv('caixaImprimir','caixa');habilitar('some');\"/>  <input class='bnt' type='button' value='Confirmar' onclick='javascript: location.href=\"sendToDatabase.php\";'/>
		</div>
		<br>
		</div>
		</center>
		</body>
		</html>";
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
	$_SESSION['numeroResidencia']=$numeroResidencia;
	?>
