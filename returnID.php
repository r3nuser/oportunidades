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
function returnAlunoTelefones($alunoID,$con)
{
    $sql = "SELECT `telefone1`, `telefone2` FROM `telefone` WHERE fk_alunoID ='$alunoID'";
    
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

function returnAlunosByCPF($CPF,$con)
{
    $sql = "SELECT `alunoID`, `aluno_cpf`, `nome`, `dataDeNascimento`, `email` FROM `aluno` WHERE aluno_cpf = '$CPF'";
    
    if(!$rs = mysqli_query($con,$sql)){
       
        echo("Error description: " . mysqli_error($con)."<br>");
        
    }else{

        while($rg = mysqli_fetch_array($rs)){
            
            $alunoID= $rg['alunoID'];
            $aluno_cpf= $rg['aluno_cpf'];
            $nome= $rg['nome'];
            $dataDeNascimento= $rg['dataDeNascimento'];
            $email= $rg['email'];
            
    }
        
        return array($alunoID,$aluno_cpf,$nome,$dataDeNascimento,$email);   
    }
}


function returnAlunoEndereco($alunoID,$con)
{
    $sql = "SELECT `cep`, `rua`, `bairro`, `cidade`, `numeroResidencia` FROM `endereco` WHERE `fk_alunoID` = '$alunoID'";
    
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

function returnAlunoID($cpf,$con){

    $sql = "SELECT `alunoID` FROM `aluno` WHERE aluno_cpf = '$cpf'";
    
    if(!$rs = mysqli_query($con,$sql)){

        echo("Error description: " . mysqli_error($con)."<br>");
        
    }else{

    while($rg = mysqli_fetch_array($rs)){
        
        $id= $rg['alunoID'];
    }
            return $id;
            //echo"<script>alert('cpf ".$cpf." já cadastrado! ')</script>";          
    }
}

function isRegistered($cpf,$courseID,$con){

    $sql = "SELECT `fk_cursoID` FROM `curso_aluno` WHERE Aluno_CPF = '$cpf'";
    
    if(!$rs = mysqli_query($con,$sql)){

        echo("Error description: " . mysqli_error($con)."<br>");
        
    }else{
        
        $flag=0;

        while($rg = mysqli_fetch_array($rs)){
            
            $registeredCourse= $rg['fk_cursoID'];
            
            if(isset($registeredCourse)){
                if($registeredCourse==$courseID){
                
                    $flag++;
                
                }
            }else{
                $flag=0;
            }
        }
        if($flag==0){

            return false;
        
        }else{
            return true;
            }
    }
}

?>