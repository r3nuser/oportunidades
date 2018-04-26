<?php
	
	include("conexao.php");
	include("returnID.php");
	
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
	$numeroResidencia=$_SESSION['numeroResidencia'];
	/**********************/
	$curso=$_SESSION['curso'];
	/**********************/
	$job=$_SESSION['job'];
	$expectativa=$_SESSION['expectativa'];
	$discoveredTheCourse=$_SESSION['discoveredTheCourse'];
	

	/**Cadastro no banco */

	$conexao=open_connection();
	
	$cursoID=returnIDCourse($curso,$conexao);

	$enderecoOK=false;
	$AlunoOK=false;
	$telefoneOK=false;

	echo"o ID de ".$curso." é".$cursoID."<br>";
	
	//Cadastro do Aluno
	$sql= "INSERT INTO aluno VALUES ";
	$sql.="('$CPF','$nome','$data','$email','$job','$expectativa','$discoveredTheCourse','$cursoID')"; 
	
	if(!mysqli_query($conexao,$sql))
	{
		echo("\"Aluno\" Error description: " . mysqli_error($conexao)."<br>");
	}
	else
	{
		
		$AlunoOK=true;
		
	}
	//Cadastro do endereço
	$sql= "INSERT INTO endereco VALUES ";
	$sql.= "('$CEP','$rua','$bairro','$cidade','$numeroResidencia','$CPF',null)";

	if(!mysqli_query($conexao,$sql))
	{
		echo("\"Endereço\" Error description: " . mysqli_error($conexao)."<br>");
	}
	else
	{ 
		$enderecoOK=true;
	}
		//cadastro dos telefones do aluno
		$sql="INSERT INTO telefone VALUES";
		$sql.="('$telefone1','$telefone2','$CPF',null)";
		
		if(!mysqli_query($conexao,$sql))
		{
			echo("\"telefone\" Error description: " . mysqli_error($conexao)."<br>");
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