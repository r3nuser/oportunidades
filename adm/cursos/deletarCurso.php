<?php
    include("../../conexao.php");
    include("../../returnID.php");
    
        $con = open_connection();
        $nome =  $_GET['cursoNome'];
        if($nome!=""){

            $id = returnIDCourse($_GET['cursoNome'],$con);
            if (isset($id)){

                $sql = "DELETE FROM `curso` WHERE idCurso = $id";

                if(!$rs = mysqli_query($con,$sql)){
                    echo"Verifique se esse curso não esta relacionado à alguma instituição ou matriculas de alunos e tente novamente.<br>";                        
                    echo("Error description: " . mysqli_error($con)."<br>");
                    close_connection($con);
                }else{
                    echo"<script>alert('Deleção bem sucedida!')</script>";
                    echo "<script>location.href='verCursos.php'</script>";
                    close_connection($con);
                }
            }else{
                echo"<script>alert('Digite um curso válido!')</script>";
                echo "<script>location.href='verCursos.php'</script>";
                close_connection($con);
            }
    }else{
        echo"<script>alert('Digite um curso válido!')</script>";
        echo "<script>location.href='verCursos.php'</script>";
        close_connection($con);
    }
    
    
?>
