<?php
    
    include("../conexao.php");
    
    
    $nome = $_POST['cursoNome'];
    $cursoInicio = $_POST['cursoInicio'];
    $cursoFim = $_POST['cursoFim'];

    $cursoInicioBRFormat = DateTime::createFromFormat('d/m/Y', $cursoInicio);
    $cursoInicioUSformat = $cursoInicioBRFormat->format('Y-m-d');

    $cursoFimBRFormat = DateTime::createFromFormat('d/m/Y', $cursoFim);
    $cursoFimUSFormat = $cursoFimBRFormat->Format('Y-m-d');


    $conexao = open_connection();
    
    $sql = "INSERT INTO curso VALUES ";
    $sql .= "(NULL,'$nome','$cursoInicioUSformat','$cursoFimUSFormat')";
    
    if(!mysqli_query($conexao,$sql))
    {
        echo("Error description: " . mysqli_error($conexao)."<br>");
    }
    else
    {
        echo"<script>alert('cadastro realizado com sucesso')</script>";
		echo "<script>location.href='CadastrarCurso.php'</script>";
    }
   
    

    
    
    
    
    close_connection($conexao);
    
   
?>