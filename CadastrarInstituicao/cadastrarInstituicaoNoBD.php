<?php

include("../conexao.php");
include("../returnIDCourse.php");

$con = open_connection();

//receiving data

$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$CEP = $_POST['CEP'];
$rua = $_POST['rua'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$numeroResidencia = $_POST['numeroResidencia'];
$curso= $_POST['course'];


$telefoneOK=false;
$enderecoOK=false;
$cursoOK=false;
$nomeOK=false;

// registering name and ID
$sql = "INSERT INTO instituicao VALUES";
$sql.= "(null,'$nome')";

if(!mysqli_query($con,$sql))
    {
        echo("Error description: " . mysqli_error($con)."<br>");
    }
    else
    {
        $nomeOK=true;
		
    }
// recovering ID
$instituicaoID = returnIDInstituicao($nome,$con);

//registering telephone
$sql="INSERT INTO telefone VALUES";
$sql.="('$telefone',null,null,'$instituicaoID')";
	
	if(!mysqli_query($con,$sql))
	{
		echo("\"telefone\" Error description: " . mysqli_error($con)."<br>");
	}
    
    else
	{
		$telefoneOK=true;
	}

// registering address
$sql= "INSERT INTO endereco VALUES ";
$sql.= "('$CEP','$rua','$bairro','$cidade','$numeroResidencia',null,'$instituicaoID')";

    if(!mysqli_query($con,$sql))
    {
        echo("\"Endereço\" Error description: " . mysqli_error($con)."<br>");
    }
    else
    { 
        $enderecoOK=true;
    }

//registering courses
for($i=0; $i< count($_POST['course']);$i++)
{  
     $sql= "INSERT INTO curso_instituicao VALUES";
    $sql.="($curso[$i],$instituicaoID)";
   
    if(!mysqli_query($con,$sql))
    {
        echo("\"Curso\" Error description: " . mysqli_error($con)."<br>");
    }
    else
    { 
        $cursoOK=true;
    }
    
}
if($telefoneOK==true && $enderecoOK==true && $cursoOK==true && $nomeOK==true)
{
    echo"<script>alert('cadastro realizado com sucesso')</script>";
    echo "<script>location.href='CadastrarInstituicao.php'</script>";
}

?>