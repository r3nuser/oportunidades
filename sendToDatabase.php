<?php
	
	include("conexao.php");
	include("returnIDCourse.php");
	
	session_start();

	$nome = $_SESSION['nome'];
	$data = $_SESSION['data'];	
	$CPF = $_SESSION['CPF'];
	/**********************/
	$telefone1 = $_SESSION['telefone1'];
	$telefone2 = $_SESSION['telefone2'];
	$email = $_SESSION['email'];
	$CEP = $_SESSION['CEP'];
	$rua = $_SESSION['rua'];
	$bairro  =$_SESSION['bairro'];
	$cidade = $_SESSION['cidade'];
	/**********************/
	$curso=$_SESSION['curso'];
	/**********************/
	$job=$_SESSION['job'];
	$expectativa=$_SESSION['expectativa'];
	$discoveredTheCourse=$_SESSION['discoveredTheCourse'];
	

	/**Cadastro no banco */

	$conexao=open_connection();
	
	$cursoID=returnID($curso,$conexao);

	$enderecoOK=false;
	$AlunoOK=false;
	$telefoneOK=false;

	echo"o ID de ".$curso." é".$cursoID."<br>";
	
		//Cadastro do endereço
		$sql= "INSERT INTO endereco VALUES ";
		$sql.= "('$CEP','$rua','$bairro','$cidade')";

		if(!mysqli_query($conexao,$sql))
		{
			echo("Error description: " . mysqli_error($conexao)."<br>");
		}
		else
		{ 
			$enderecoOK=true;
		}
		//Cadastro do Aluno
		$sql= "INSERT INTO aluno VALUES ";
		$sql.="('$CPF','$nome','$email','$CEP','$job','$expectativa','$discoveredTheCourse','$cursoID')"; 

		if(!mysqli_query($conexao,$sql))
		{
			echo("Error description: " . mysqli_error($conexao)."<br>");
		}
		else
		{
			
			$AlunoOK=true;
	
		}
		//cadastro dos telefones do aluno
		$sql="INSERT INTO telefone VALUES";
		$sql.="('$telefone1','$telefone2','$CPF')";
		
		if(!mysqli_query($conexao,$sql))
		{
			echo("Error description: " . mysqli_error($conexao)."<br>");
		}
		else
		{
			
			$telefoneOK=true;
		}

		if($enderecoOK == true && $AlunoOK == true && $telefoneOK == true)
		{
			echo"<script>alert('cadastro realizado com sucesso')</script>";
			echo "<script>location.href='index.php'</script>";
		}
		close_connection($conexao);










?>