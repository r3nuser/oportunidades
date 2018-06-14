<?php
include('conexao.php');
include('returnID.php');
echo"<h2>Teste de funções<h2>";
$con = open_connection();

$CPF='118.609.590-32';
$nome = 'BILL FERREIRA';
$dataDeNascimento = '1995-03-10';
$email = 'willianoliveira608@gmail.com';
$id = 5;
 
if(isInstituicaoCourseLinked($con,$id))
echo "ta registrado";
else echo "não tá";

?>