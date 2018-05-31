<?php 
	include("returnID.php");
	session_start();
	//pegando os dados do formulário
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
 	$curso = $_POST['escolha'];
	//pegando a data do servidor
 	$ano=date("Y")-16;
 	$dia=date("d");
 	$mes=date("m");
	 // converção do formato da data
	 NotNull($data,'Data De Nascimento');

	$BrazilianDateTimeFormat = DateTime::createFromFormat('d/m/Y', $data);
	$AmericanDateTimeFormat = $BrazilianDateTimeFormat->format('Y-m-d');
	
	//pegado do formulário informaçoes socioeconomicas
	$job = $_POST['job'];
	$expectativa = $_POST['expectativa'];
	$discoveredTheCourse = $_POST['discoveredTheCourse'];
	// verifica se o candidato escolheu algo do select, ou prefeir digitar no imput
	if ($expectativa=="Outra"){
		$expectativa = $_POST['ExpectativaInput'];
	}
	if ($discoveredTheCourse=="Outro"){
		$discoveredTheCourse = $_POST['discoveredTheCourseInput'];
	}
	
	function exibe($campoRecebido){// retorna o campo recebido
		return "$campoRecebido";
	}
	
	function NotNull($input,$campo){//verifica se o campo é nulo ou tem menos de 5 caracteres
 		if($input=="" || (strlen($input)<5 && $campo != "Número da Residência")){	
			 echo "<script> alert('Existem campos vazios que precisam ser preenchidos: ".$campo."');</script>";
			 echo "<script>history.back(1);</script>"; // calo verdadeiro retorna ao formulário 
		}else{//caso falso chama exibir
 			return exibe($input);
 		}	
	}
	/* Informações socioeconômicas */ 
	function NotSelecionar($input){//caso nenhuma opção tenha sido selecionada 
		if($input=="Selecionar"){
			echo "<script> alert('preencha corretamente o questionário socioeconômico');</script>";
			echo "<script>history.back(1);</script>";//retorna ao formulário
		}else{//se não, exibe o campo
			return exibe($input);
		}	
	}


	// checa a data de nascimento informada
	function ValidaData($dat){
		$data = explode("/","$dat"); 
		$d = $data[0];
		$m = $data[1];
		$y = $data[2];
	
		$res = checkdate($m,$d,$y);
		if ($res == 1){
			return true;
		}else{
			return false;
		}
	}


	$Menor16=false;
	$MaisDe100=false;
	$DataIncorreta=false;

	if(strtotime($AmericanDateTimeFormat)> strtotime(''.$ano.'-'.$mes.'-'.$dia.'')){	
		$Menor16 = true;// cantidato tem menos de 16
	}
	if(strtotime($AmericanDateTimeFormat) < strtotime('1918-'.$mes.'-'.$dia.'')){
		$MaisDe100=true; //candidato tem mais de 100
	}
	if(!ValidaData($data)){
		$DataIncorreta=true;//formato está de algum outro modo incorreto
	}

	if($Menor16==true||$MaisDe100==true||$DataIncorreta==true){
		echo "<script> alert('A idade minima para se inscrever é de 16 anos');</script>";
		echo "<script>history.back(1);</script>";
	}else{

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
							<p class='separador-page-exibir'>Dados Pessoais</p>
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
							<p class='separador-page-exibir'>Contato</p>
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
							"<p class='separador-page-exibir'>Endereço</p>
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
							"<p class='separador-page-exibir'>Cursos</p> 
							<b>Curso: </b>
							".NotNull($curso,'Curso').
							"<br>".
							//Mostrar dados socioeconômicos
							"<p class='separador-page-exibir'>Informações Socioeconômicas</p>
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
			</html>
		";


		// carregando a sessão com os dados
		
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
		
	}

?>