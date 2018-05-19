<?php
    include("../../conexao.php");
    $con=open_connection(); 
   $nome = $_GET['nome'];
   $alunoID = $_GET['alunoID'];
    
    
    $sql = "UPDATE `aluno` SET `nome`='$nome' WHERE alunoID='$alunoID'";
                        
    if(!$rs = mysqli_query($con,$sql)){
                                    
        echo("Error description: " . mysqli_error($con)."<br>");
                 
    }else{
    echo"<script>alert('Atualização bem sucedida!')</script>";
    echo "<script>location.href='buidTable.php'</script>";
    }
?>