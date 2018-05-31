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
	
	$cursoID = returnIDCourse($curso,$conexao); // recupera o ID do curso

	/* variaveis de controle */
	
	$enderecoOK=false;
	$AlunoOK=false;
	$telefoneOK=false;
	
	/***Verifica se o aluno já foi cadastrado no banco, caso sim ele será registrado em uma tabela à parte***/

	if(isRegistered($CPF,$nome,$data,$email,$conexao)){
		/* A principio o aluno será cadastrado na tabela principal para que haja lá seu id, ou seja sua posição */
		$sql= "INSERT INTO aluno VALUES ";
		$sql.="(null,'$CPF','$nome','$data','$email','$job','$expectativa','$discoveredTheCourse','$cursoID')"; 
		
		
		if(!mysqli_query($conexao,$sql)){
			echo("\"Aluno\" Error description: " . mysqli_error($conexao)."<br>");
		}else{
			/* Seleciona do banco o ultimo id do aluno duplicado  */
					
			 $sql = "SELECT alunoID FROM aluno WHERE aluno_cpf='$CPF'AND nome='$nome' AND dataDeNascimento='$data' AND email='$email'";
			if(!$rs = mysqli_query($conexao,$sql)){
				echo("Error description: " . mysqli_error($conexao)."<br>");
			}else{//retorna o ultimo id cadastrado
				while($rg = mysqli_fetch_array($rs)){
					$ID=$rg['alunoID'];
				} 
					$ultimo=$ID;// transfere o ultimo id cadastrado para a variável "ultimo"
					/* realiza o cadstro do aluno na tabela de duplicados */
					$sql = "INSERT INTO `duplicados`( `alunoDuplicadoID`,`IDtabelaPrincipal`, `aluno_cpf`, `nome`, `dataDeNascimento`, `email`, `trabalhando`, `expec_sobre_curso`, `como_conheceu`, `FK_idCurso`, `cep`, `rua`, `bairro`, `cidade`, `numeroResidencia`, `telefone1`, `telefone2` ) VALUES";
					
					$sql .="(null,'$ultimo','$CPF','$nome','$data','$email',";
					$sql .="'$job','$expectativa','$discoveredTheCourse','$cursoID','$CEP','$rua','$bairro', '$cidade','$numeroResidencia','$telefone1','$telefone2')";
		
					if(!mysqli_query($conexao,$sql)){
	
						echo("Error description: " . mysqli_error($conexao)."<br>");
						close_connection($conexao);
					}else{
						$sql = "DELETE FROM `aluno` WHERE alunoID='$ultimo'";
						if(!$rs = mysqli_query($conexao,$sql)){
       
							echo("Error description: " . mysqli_error($conexao)."<br>");
							
						}else{
							echo"<script>alert('cadastro realizado com sucesso:')</script>";
							echo "<script>location.href='index.php'</script>";
							close_connection($conexao);
						}
					}
				
			 }
		}
		/* caso o candidato não seja duplicado */
	}else{
		/* Cadastro do Aluno */

		$sql= "INSERT INTO aluno VALUES ";
		$sql.="(null,'$CPF','$nome','$data','$email','$job','$expectativa','$discoveredTheCourse','$cursoID')"; 
		
		if(!mysqli_query($conexao,$sql)){
			echo("\"Aluno\" Error description: " . mysqli_error($conexao)."<br>");
		}else{	
			$AlunoOK=true;
		}
		$alunoID = returnAlunoID($CPF,$conexao); // recuperando do banco o id do aluno
		
		/* Cadastro do endereço */

		$sql= "INSERT INTO endereco VALUES ";
		$sql.= "('$CEP','$rua','$bairro','$cidade','$numeroResidencia','$alunoID',null)";

		if(!mysqli_query($conexao,$sql)){
			echo("\"Endereço\" Error description: " . mysqli_error($conexao)."<br>");
		}else{ 
			$enderecoOK=true;
		}
		
		/* cadastro dos telefones do aluno */

		$sql="INSERT INTO telefone VALUES";
		$sql.="('$telefone1','$telefone2','$alunoID',null)";
		
		if(!mysqli_query($conexao,$sql)){
			echo("\"telefone\" Error description: " . mysqli_error($conexao)."<br>");
		}else{
			$telefoneOK=true;
		}

		if($enderecoOK == true && $AlunoOK == true && $telefoneOK == true){
			
			/*Cadastro na tabela aluno_curso*/

			$sql = "INSERT INTO `curso_aluno`( `Aluno_Nome`, `Aluno_CPF`, `fk_cursoID` ) VALUES ('$nome','$CPF',$cursoID)";

			if(!mysqli_query($conexao,$sql)){
				echo("\"curso_aluno\" Error description: " . mysqli_error($conexao)."<br>");
			}else{
				echo"<script>alert('cadastro realizado com sucesso')</script>";
				close_connection($conexao);
				echo "<script>location.href='index.php'</script>";
			} 
		}
	}
?>