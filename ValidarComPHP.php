<?php 

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
//Switch -> Curso
	$curso = $_POST['escolha'];
//Social Data
	$job = $_POST['selecao'];
	$expectativa = $_POST['selecao2'];
	
	$conheceu = $_POST['selecao3'];
	


	if ($expectativa=="Outra")
	{
		$qual2 = $_POST['qual2'];
	}
	if ($conheceu=="Outro")   
	{
		$qual = $_POST['qual'];
	}

//Verificação de campo nulo


function exibe($campoRecebido)
	{

		return "$campoRecebido";
	}

	function NotNull($input)
	{
		if($input=="")
		{
			echo "<script> alert('Existem campos vazios que precisam ser preenchidos');</script>";
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
//Mostrando os dados pessoais
	echo "<link REL='STYLESHEET' HREF='CSS/STYLE.CSS' TYPE='TEXT/CSS'/>";
	echo "<link REL='SHORTCUT ICON' HREF='icones/favicon.ico'>";
	echo "<center>";
	
	echo "<div class='caixa'>";
	echo "<p class='separador'>Dados Pessoais</p>";
	echo "Nome: ";
	echo NotNull($nome);
	echo "<br>";
	echo "Data: ";
	echo NotNull($data);
	echo "<br>";
	echo "CPF: ";
	echo NotNull($CPF);
	echo "<br>";

//mostrando os contatos
	echo "<br>";
	echo "<p class='separador'>Contato</p>";
	echo "Telefone/Celular01: ";
	echo NotNull($telefone1);
	echo "<br>";
	echo "Telefone/Celular02 ";
	echo NotNull($telefone1);
	echo "<br>";
	echo "E-mail: ";
	echo NotNull($email);
	echo "<br>";

//Mostrando endereço

	echo "<p class='separador'>Endereço</p>";
	echo "CEP: ";
	echo NotNull($CEP);
	echo "<br>";
	echo "Rua: ";
	echo NotNull($rua);
	echo "<br>";
	echo "Bairro: ";
	echo NotNull($bairro);
	echo "<br>";
	echo "Cidade: ";	
	echo NotNull($cidade);


//Mostrar curso escolhido
	echo "<p class='separador'>Cursos</p> </br>";
	echo "Curso: ";
	echo NotNull($curso);
	echo "<br>";

//Mostrar dados socioeconômicos
	echo "<p class='separador'>Informações Socioeconômicas</p>";
	echo "<br>";
	echo "Trabalha? ";
	echo NotSelecionar($job);
	echo "<br>";
	echo "Qual sua expectativa com o curso?";
	
	




	if ($expectativa!="Outra") 
	{
		echo "<br>";
		echo NotSelecionar($expectativa);
		echo "<br>";


	}
	else
	{	
		echo "<br>";
		echo NotNull($qual);
		echo "<br>";
	}

	
	echo "<br>";
	echo "Como você conheceu o Curso? ";
	if ($conheceu!="Outro")                         
	{
		echo "<br>";
		echo NotSelecionar($conheceu);
		echo "<br>";

	}
	else
	{	
		echo "<br>";
		echo NotNull($qual2);
		echo "<br>";
	}
	
	echo "<br>";
	echo "<br>";
	echo "</div>";
	echo "</center>";

?>
