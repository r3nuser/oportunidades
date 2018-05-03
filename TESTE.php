<?php
include('conexao.php');
include('returnID.php');

$con = open_connection();
$CPF='100.842.817-58';
$flag =0;


   $a = returnAlunosByCPF($CPF,$con);
    
    
    $alunoID = $a[$flag];
    $aluno_CPF = $a[$flag+1];
    $nome = $a[$flag+2];
    $data = $a[$flag+3];
    $email = $a[$flag+4];
    $flag++;

echo "$alunoID <br>";
echo "$aluno_CPF <br>" ;
echo "$nome <br>" ;
echo "$data <br>" ;
echo "$email <br>" ;

?>