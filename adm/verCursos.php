<?php

include("../../oportunidades/conexao.php");
include("../../oportunidades/returnID.php");
$con = open_connection();



if(!empty($_POST['cursoNome']))
{
//getting data        
$nome = $_POST['cursoNome'];


/* $cursoInicio = $_POST['cursoInicio'];
$cursoFim = $_POST['cursoFim'];

$instituicaoID = returnIDInstituicao($_POST['local'],$con); */



//converting datetime format

/* $cursoInicioBRFormat = DateTime::createFromFormat('d/m/Y', $cursoInicio);
$cursoInicioUSformat = $cursoInicioBRFormat->format('Y-m-d');

$cursoFimBRFormat = DateTime::createFromFormat('d/m/Y', $cursoFim);
$cursoFimUSFormat = $cursoFimBRFormat->Format('Y-m-d'); */

//opening connection and putting the data received in the database

/* CADASTRA O CURSO */
$sql = "INSERT INTO curso VALUES ";
$sql .= "(NULL,'$nome')";

if(!mysqli_query($con,$sql))
{
    echo("Error description: " . mysqli_error($con)."<br>");
}
else
{
   $cursoControl=TRUE;
   
}
/* CADASTRA AS DATAS DE INICIO E TÉRMINO 
    $id = returnIDCourse($nome,$con);

    $sql = "INSERT INTO `periodo_curso`(`fk_cursoID`, `dataInicio`, `dataFim`) VALUES ('$id','$cursoInicioUSformat','$cursoFimUSFormat')";
    if(!mysqli_query($con,$sql))
    {
        echo("Error description: " . mysqli_error($con)."<br>");
    }else{
        $datas= TRUE;
    }
*/

/* CADASTRARÁ O LOCAL DO CURSO 
      $sql = "INSERT INTO `curso_instituicao`(`fk_idCurso`, `fk_instituicao_id`) VALUES ('$id','$instituicaoID')";
    if(!mysqli_query($con,$sql))
    {
        echo("Error description: " . mysqli_error($con)."<br>");
    }else{
        $locaok= TRUE;
    } 
*/
    
    /* CASO NÃO HAJA ERRO NOS CADASTROS */
    if($cursoControl == TRUE)
    {
        echo"<script>alert('cadastro realizado com sucesso')</script>";
    }
}






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    <title>Aluno Tabela</title>
    <style>
    body{
        background-image:none;
    }
    </style>
</head>
<body>
<center>
<table>
<thead>
<th>ID do curso</th>
<th>Curso</th>
<!--<th>Data de Início</th>
<th>Data de Término</th>-->
</thead>

<tbody>
<?php

$sql="SELECT * FROM curso";

$resultado = mysqli_query($con,$sql) or die("Erro ao retornar dados");



while($registro = mysqli_fetch_array($resultado))
{
$nome= $registro['nome'];
$id= $registro['idCurso'];
// $instituicao = returnInstituicaoNome(returnInstituicaoByCourseID($id,$con),$con);


// $cursoInicio =$registro['cursoInicio'];
// $cursoFim = $registro['cursoFim'];

// $cursoInicioUSformat = DateTime::createFromFormat('Y-m-d',$cursoInicio);
// $cursoInicioBRFormat = $cursoInicioUSformat->format('d/m/Y');

// $cursoFimUSformat = DateTime::createFromFormat('Y-m-d',$cursoFim);
// $cursoFimBRFormat = $cursoFimUSformat->format('d/m/Y');

echo" <tr>
<td>$id</td>
<td>$nome</td>
</tr>";
}
close_connection($con);
?>
</tbody>

</table> 
</center> 
</body>
</html>
