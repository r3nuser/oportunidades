<?php

function returnIDCourse($cursoNome,$con)
{
    
 

    $sql = "SELECT * FROM `curso` WHERE nome = '$cursoNome'";
    
    if(!$rs = mysqli_query($con,$sql)){
       
        echo("Error description: " . mysqli_error($con)."<br>");
        
    }else{

        while($rg = mysqli_fetch_array($rs)){
        
            $id= $rg['idCurso'];
    }
        
        return $id;   
    }
    
}
function returnNameCourse($cursoID,$con)
{
    
 

    $sql = "SELECT `nome` FROM `curso` WHERE idCurso = '$cursoID'";
    
    if(!$rs = mysqli_query($con,$sql)){
       
        echo("Error description: " . mysqli_error($con)."<br>");
        
    }else{

        while($rg = mysqli_fetch_array($rs)){
        
            $nome= $rg['nome'];
    }
        
        return $nome;   
    }
    
}
function returnAlunoTelefones($cpf,$con)
{
    $sql = "SELECT `telefone1`, `telefone2` FROM `telefone` WHERE fk_aluno_cpf ='$cpf'";
    
    if(!$rs = mysqli_query($con,$sql)){
       
        echo("Error description: " . mysqli_error($con)."<br>");
        
    }else{

        while($rg = mysqli_fetch_array($rs)){
            
            $telefone1= $rg['telefone1'];
            $telefone2= $rg['telefone2'];
    }
        
        return array($telefone1,$telefone2);   
    }
}
function returnAlunoEndereco($cpf,$con)
{
    $sql = "SELECT `cep`, `rua`, `bairro`, `cidade`, `numeroResidencia` FROM `endereco` WHERE `fk_aluno_cpf` = '$cpf'";
    
    if(!$rs = mysqli_query($con,$sql)){
       
        echo("Error description: " . mysqli_error($con)."<br>");
        
    }else{

        while($rg = mysqli_fetch_array($rs)){
            
            $cep= $rg['cep'];
            $rua= $rg['rua'];
            $bairro = $rg['bairro'];
            $cidade = $rg['cidade'];
            $numeroResidencia = $rg['numeroResidencia'];
    }
        
        return array($cep,$rua,$bairro,$cidade,$numeroResidencia);   
    }
}
function returnIDInstituicao($instituicaoNome,$con)
{
    
 

    $sql = "SELECT * FROM `instituicao` WHERE nome = '$instituicaoNome'";
    if(!$rs = mysqli_query($con,$sql)){

        echo("Error description: " . mysqli_error($con)."<br>");
        
    }else{

    while($rg = mysqli_fetch_array($rs)){
        
        $id= $rg['instituicao_id'];
    }
        
        return $id;   
    }
    
}

function returnCPF($cpf,$con){

    $sql = "SELECT `aluno_cpf` FROM `aluno` WHERE aluno_cpf = '$cpf'";
    
    if(!$rs = mysqli_query($con,$sql)){

        echo("Error description: " . mysqli_error($con)."<br>");
        
    }else{

    while($rg = mysqli_fetch_array($rs)){
        
        $id= $rg['aluno_cpf'];
    }
        if(isset($id))
        if($id==$cpf){

            echo"<script>alert('cpf ".$cpf." já cadastrado! ')</script>";
        }
   
               
    }
}


?>