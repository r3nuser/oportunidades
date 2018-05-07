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


echo("teste do retorn das datas de inicio e fim");
$array = returnArrayPeriodo('1','1',$con);

echo $array[0]."<br>";
echo $array[1];

echo("<br>teste da verificação do cadastro de curso na istituição<br>");

if(courseAlredyRegistered('20','3',$con))
echo "verdadeiro";
else
echo "falso";


?>