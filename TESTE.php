<?php
include('conexao.php');
include('returnID.php');
echo"<h2>Teste de funções<h2>";
$con = open_connection();

$cpf='514.717.670-51';
$nome = 'Kiko Tesouro Coração Benzinho LOTERIA';
$dataDeNascimento = '1998-04-14';
$email = 'bill@corp.com';




if (isRegistered($cpf,$nome,$dataDeNascimento,$email,$con))
    echo "encontrou";
else
    echo "não encontrou";

?>