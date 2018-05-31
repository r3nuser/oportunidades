<?php
    
    include('../../conexao.php');
    include("../../returnID.php");
    $con = open_connection();

    $alunoDuplicadoID = $_GET['alunoDuplicadoID'];
    $IDtabelaPrincipal = $_GET['IDtabelaPrincipal'];
    
    

    $sql = "SELECT * FROM duplicados WHERE alunoDuplicadoID='$alunoDuplicadoID'";
    if(!$rs=mysqli_query($con,$sql))
        echo "Descrição do Erro: ". mysqli_error($con);
    else{
        while ($rg=mysqli_fetch_array($rs)) {
            echo "<br>".$aluno_cpf=$rg['aluno_cpf'];
            echo "<br>".$nome=$rg['nome'];
            echo "<br>".$dataDeNascimento=$rg['dataDeNascimento'];
            echo "<br>".$email=$rg['email'];
            echo "<br>".$trabalhando=$rg['trabalhando'];
            echo "<br>".$expec_sobre_curso=$rg['expec_sobre_curso'];
            echo "<br>".$como_conheceu=$rg['como_conheceu'];
            echo "<br>".$FK_idCurso=$rg['FK_idCurso'];
            echo "<br>".$cep=$rg['cep'];
            echo "<br>".$rua=$rg['rua'];
            echo "<br>".$bairro=$rg['bairro'];
            echo "<br>".$cidade=$rg['cidade'];
            echo "<br>".$numeroResidencia=$rg['numeroResidencia'];
            echo "<br>".$telefone1=$rg['telefone1'];
            echo "<br>".$telefone2=$rg['telefone2'];
        }
    }
    $courseName = returnNameCourse($FK_idCurso,$con);
    $enderecoOK=false;
	$AlunoOK=false;
    $telefoneOK=false;
    
    $sql= "INSERT INTO aluno VALUES ";
    $sql.="('$IDtabelaPrincipal','$aluno_cpf','$nome','$dataDeNascimento','$email','$trabalhando','$expec_sobre_curso','$como_conheceu','$FK_idCurso')"; 
    
    if(!mysqli_query($con,$sql)){
        echo("\"Aluno\" Error description: " . mysqli_error($con)."<br>");
    }else{	
        $AlunoOK=true;
    }
    // $IDtabelaPrincipal = returnIDtabelaPrincipal($CPF,$con); // recuperando do banco o id do aluno
    
    /* Cadastro do endereço */

    $sql= "INSERT INTO endereco VALUES ";
    $sql.= "('$cep','$rua','$bairro','$cidade','$numeroResidencia','$IDtabelaPrincipal',null)";

    if(!mysqli_query($con,$sql)){
        echo("\"Endereço\" Error description: " . mysqli_error($con)."<br>");
    }else{ 
        $enderecoOK=true;
    }
    
    /* cadastro dos telefones do aluno */

    $sql="INSERT INTO telefone VALUES";
    $sql.="('$telefone1','$telefone2','$IDtabelaPrincipal',null)";
    
    if(!mysqli_query($con,$sql)){
        echo("\"telefone\" Error description: " . mysqli_error($con)."<br>");
    }else{
        $telefoneOK=true;
    }

    if($enderecoOK == true && $AlunoOK == true && $telefoneOK == true){
        
        /*Cadastro na tabela aluno_curso*/
        
        
        
        $sql = "INSERT INTO `curso_aluno`( `Aluno_Nome`, `Aluno_CPF`, `fk_cursoID` ) VALUES ('$nome','$aluno_cpf',$FK_idCurso)";

        if(!mysqli_query($con,$sql)){
            echo("\"curso_aluno\" Error description: " . mysqli_error($con)."<br>");
        }else{
            $sql = "DELETE FROM `duplicados` WHERE alunoDuplicadoID='$alunoDuplicadoID'";
            if(!mysqli_query($con,$sql))
                echo("Error description: " . mysqli_error($con)."<br>");
            else{
                echo"<script>alert('reclassificação realizada com sucesso')</script>";
                close_connection($con);
                echo "<script>location.href='buidTable.php?curso=$courseName'</script>";
            }
        } 
    }

?>
