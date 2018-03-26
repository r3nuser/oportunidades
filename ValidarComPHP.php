<?php 
//Pegando os dados pessoais

	$nome = $_POST['nome'];
	$data = $_POST['data'];
	$CPF = $_POST['CPF'];

//pegando os contatos

	$telefone1 = $_POST['telefone'];
	$telefone2 = $_POST['celular'];
	$email = $_POST['email'];

//pegando endereço

	$CEP = $_POST['CEP'];
	$rua = $_POST['rua'];
	$bairro = $_POST['bairro'];
	$cidade = $_POST['cidade'];	
	
//pegar curso escolhido

	$curso = $_POST['escolha'];


//pegar dados socioeconômicos

	$job = $_POST['selecao'];
	$expectativa = $_POST['selecao2'];
	$qual = $_POST['qual'];
	$conheceu = $_POST['selecao3'];
	$qual2 = $_POST['qual2'];

//Mostrando os dados pessoais
	echo "Nome: $nome";
	echo "<br>";
	echo "Data: $data";
	echo "<br>";
	echo "CPF: $CPF";
	echo "<br>";

//mostrando os contatos
	echo "<br>";
	echo "Telefone/Celular01: $telefone1";
	echo "<br>";
	echo "Telefone/Celular02 $telefone2";
	echo "<br>";
	echo "E-mail: $email";
	echo "<br>";

//Mostrando endereço

	echo "<br>";
	echo "CEP: $CEP";
	echo "<br>";
	echo "Rua: $rua";
	echo "<br>";
	echo "Bairro: $bairro";
	echo "<br>";
	echo "Cidade: $cidade";	
	echo "<br>";	

//Mostrar curso escolhido
	
	echo "<br>";
	echo "Curso: $curso";
	echo "<br>";

//Mostrar dados socioeconômicos
	echo "<br>";
	echo "Trabalha? $job";
	echo "<br>";
	echo "Expectativa: $expectativa";
	echo "<br>";
	echo "Qual? $qual";
	echo "<br>";
	echo "Conheceu o Curso: $conheceu";
	echo "<br>";
	echo "Qual? $qual2";
	echo "<br>";
	

?>
