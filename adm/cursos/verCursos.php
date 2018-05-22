<?php

include("../../../oportunidades/conexao.php");
include("../../../oportunidades/returnID.php");
$con = open_connection();



if(!empty($_GET['cursoNome']))
{
//getting data        
$nome = $_GET['cursoNome'];

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
    <link rel="stylesheet" href="../../css/style.css">
    <title>Aluno Tabela</title>
    <style>
    body{
        background-image:none;
    }
    input{
        border:none;
    }
</style>
    
</head>
<body>
<center>
<table>
<thead>
<th>ID</th>
<th>Nome do Curso</th>
<th>Atualizar</th>
</thead>

<tbody>
<?php

$sql="SELECT * FROM curso";

$resultado = mysqli_query($con,$sql) or die("Erro ao retornar dados");



while($registro = mysqli_fetch_array($resultado))
{
$nome= $registro['nome'];
$id= $registro['idCurso'];

echo" 
    <tr>
        <form id='formulario' action='atualizarCurso.php' method='get'>
            <td><input class='entrada' name='id' size='1' type='text' value='$id'</td>
            <td><input class='entrada' name='nome' size='30' type='text' value='$nome'</td>
            <td><input type='image' src='../../icones/editar.png' value='Editar'/> </td>
            
        </form>
    </tr>   
";
}
close_connection($con);
?>
</tbody>

</table> 
</center> 
</body>
</html>
