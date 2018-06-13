<?php
   $option = $_GET['botao'];
   $nome = $_GET['nome'];
    $id =  $_GET['id'];

   switch ($option) {
       case 'Deletar':
           header("Location: deletarCurso.php?cursoNome=$nome");
           break;
        case 'Editar':
            include("../../conexao.php");
            
            
                $con = open_connection();
                
                
                echo $nome.'<br>';
                echo $id;
        
                $sql = "UPDATE curso SET nome = '$nome' WHERE idCurso = $id";
        
                if(!$rs = mysqli_query($con,$sql)){
                                            
                    echo("Error description: " . mysqli_error($con)."<br>");
                    close_connection($con);
                }else{
                    echo"<script>alert('Atualização bem sucedida!')</script>";
                    echo "<script>location.href='verCursos.php'</script>";
                    close_connection($con);
                }
            
            break;
       default:
           echo "deu pau";
           break;
   }
    
    
?>