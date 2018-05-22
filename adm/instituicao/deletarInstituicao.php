<?php
    include("../../conexao.php");
    include("../../returnID.php");
    
        $con = open_connection();
        $nome =  $_POST['nome'];
        if($nome!=""){

            $id = returnIDInstituicao($_POST['nome'],$con);
            if (isset($id)){

                $sql = "DELETE FROM `endereco` WHERE fk_instituicao_id = $id";

                if(!$rs = mysqli_query($con,$sql)){
                    echo"Verifique se essa instituição não esta relacionado à alguma curso e tente novamente.<br>";                        
                    echo("Error description: " . mysqli_error($con)."<br>");
                    close_connection($con);
                }else{
                    
                    $sql = "DELETE FROM `telefone` WHERE fk_instituicao_id = $id";

                    if(!$rs = mysqli_query($con,$sql)){
                        echo"Verifique se essa instituição não esta relacionado à alguma curso e tente novamente.<br>";                        
                        echo("Error description: " . mysqli_error($con)."<br>");
                        close_connection($con);
                    }else{
                            
                        $sql = "DELETE FROM `instituicao` WHERE instituicao_id = $id";
                       
                        if(!$rs = mysqli_query($con,$sql)){
                            echo"Verifique se essa instituição não esta relacionado à alguma curso e tente novamente.<br>";                        
                            echo("Error description: " . mysqli_error($con)."<br>");
                            close_connection($con);
                        }else{
                            echo"<script>alert('Deleção bem sucedida!')</script>";
                            echo "<script>location.href='verInstituicoes.php'</script>";
                            close_connection($con);
                        }
                    }
                }
            }else{
                echo"<script>alert('Digite uma instituição válida!')</script>";
                echo "<script>location.href='verInstituicoes.php'</script>";
                close_connection($con);
            }
    }else{
        echo"<script>alert('Digite uma instituição válida!')</script>";
        echo "<script>location.href='verInstituicoes.php'</script>";
        close_connection($con);
    }
    
    
?>