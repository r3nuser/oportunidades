<?php
    include("../../conexao.php");
      

    if($_GET['instituicaoID']==""|| $_GET['nome']==""|| $_GET['telefone1']==""||$_GET['telefone2']==""||$_GET['cep']==""||$_GET['rua']==""||$_GET['bairo']==""||$_GET['cidade']==""||$_GET['numeroResidencia']==""){
        echo("<script>alert('Você não deve deixar campos vazios!')</script>");
        echo "<script>location.href='verInstituicoes.php'</script>";
    }else{
        $con = open_connection();
        
        $nome = $_GET['nome'];
        $instituicaoID = $_GET['instituicaoID'];
        $telefone1 = $_GET['telefone1'];
        $telefone2 = $_GET['telefone2'];
        $cep = $_GET['cep'];
        $rua = $_GET['rua'];
        $bairo = $_GET['bairo'];
        $cidade = $_GET['cidade'];
        $numeroResidencia = $_GET['numeroResidencia'];

        $option = $_GET['botao'];
        
        switch ($option) {
            case 'Deletar':
            header("Location: deletarInstituicao.php?nome=$nome");
           break;

           case'Editar':

                $sql = "UPDATE `telefone` SET `telefone1`='$telefone1',`telefone2`='$telefone2' WHERE fk_instituicao_id='$instituicaoID'";
   
                if(!$rs = mysqli_query($con,$sql)){
                                       
                echo("Error description: " . mysqli_error($con)."<br>");
                close_connection($con);
           }else{
               $sql = "UPDATE `endereco` SET `cep`='$cep',`rua`='$rua',`bairro`='$bairo',`cidade`='$cidade',`numeroResidencia`='$numeroResidencia' WHERE fk_instituicao_id='$instituicaoID'";
               
               if(!$rs = mysqli_query($con,$sql)){
                                       
                   echo("Error description: " . mysqli_error($con)."<br>");
                   close_connection($con);
               }else{
                   $sql = "UPDATE `instituicao` SET `nome`='$nome' WHERE instituicao_id='$instituicaoID'";
                   if(!$rs = mysqli_query($con,$sql)){
                                       
                       echo("Error description: " . mysqli_error($con)."<br>");
                       close_connection($con);
                   }else{
                       echo"<script>alert('Atualização bem sucedida!')</script>";
                       
                       echo "<script>location.href='verInstituicoes.php'</script>";
                       close_connection($con);
                   }
               }
           
           } 
           
           break;
        }  
        
    } 
?>
