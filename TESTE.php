<?php
include('conexao.php');
include('returnID.php');
echo"<h2>Teste de funções<h2>";
$con = open_connection();

$CPF='118.609.590-32';
$nome = 'BILL FERREIRA';
$dataDeNascimento = '1995-03-10';
$email = 'willianoliveira608@gmail.com';

$sql = "SELECT `alunoID` FROM `aluno` WHERE aluno_cpf='$CPF'AND nome='$nome' AND dataDeNascimento='$dataDeNascimento' AND email='$email'";
    
if(!$rs = mysqli_query($con,$sql)){

    echo("Error description: " . mysqli_error($con)."<br>");
    
}else{

while($rg = mysqli_fetch_array($rs)){
    
    $id= $rg['alunoID'];
    
}
    echo $id;
        //echo"<script>alert('cpf ".$cpf." já cadastrado! ')</script>";          
}



$sql = "SELECT MAX('alunoID')  FROM aluno WHERE aluno_cpf='$CPF'AND nome='$nome' AND dataDeNascimento='$dataDeNascimento' AND email='$email'";
			if(!$rs = mysqli_query($con,$sql)){
				echo("Error description: " . mysqli_error($con)."<br>");
			}else{
				while($rg = mysqli_fetch_array($rs)){
                   
                    $alunoID=$rg['alunoID'];
                }
            }
            echo $alunoID;

?>