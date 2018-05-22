<?php

// RETORNA O ID DO CURSO
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
// Retorna a chave estrangeira do curso a partir do id do aluno

function returnFKCourseByAlunoID($alunoID,$con){
    $sql = "SELECT FK_idCurso FROM aluno WHERE alunoID=$alunoID";
    if(!$rs = mysqli_query($con,$sql)){
       
        echo("Error description: " . mysqli_error($con)."<br>");
        
    }else{

        while($rg = mysqli_fetch_array($rs)){
        
            $id= $rg['FK_idCurso'];
    }
        
        return $id;   
    }
    
}


// RETORNA O NOME DO CURSO
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
// RETURNA UM ARRAY COM OS NÚMEROS DE TELEFONES DAS INSTITUIÇÔES
function returnInstituicaoTelefones($instituicaoID,$con)
{
    $sql = "SELECT `telefone1`, `telefone2` FROM `telefone` WHERE fk_instituicao_id ='$instituicaoID'";
    
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
// RETORNA UM ARRAY COM AS DATAS DE INICIO E TÉRMINO DOS CURSOS
function returnArrayPeriodo($cursoID,$instituicaoID,$con)
{
   $sql = "SELECT `dataInicio`, `dataFim`,`turno` FROM `periodo_curso` WHERE fk_cursoID ='$cursoID' AND fk_instituicaoID = '$instituicaoID'";
   if(!$rs = mysqli_query($con,$sql)){
       
    echo("Error description: " . mysqli_error($con)."<br>");
    
}else{

    while($rg = mysqli_fetch_array($rs)){
        
        $inicio= $rg['dataInicio'];
        $fim= $rg['dataFim'];
        $turno = $rg['turno'];

        $cursoInicioUSformat = DateTime::createFromFormat('Y-m-d', $inicio);
        $cursoInicioBRFormat = $cursoInicioUSformat->format('d/m/Y');
        
        $cursoFimUSformat = DateTime::createFromFormat('Y-m-d', $fim);
        $cursoFimBRFormat = $cursoFimUSformat->format('d/m/Y');
}
    
    return array($cursoInicioBRFormat,$cursoFimBRFormat,$turno);   
}
}


// RETORNA UM ARRAY COM OS NÚMEROS DE TELEFONES 
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
// RETORNA UM ARRAY COM OS DADOS DOS ALUNOS PELO CPF
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

// RETORNA UM ARRAY COM O ENDEREÇO DOS ALUNOS APARTIR DO ID
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
// RETORNA UM ARRAY COM OS ENDEREÇOS DAS ISTITUIÇÕES

function returnInstituicaoEndereco($instituicaoID,$con)
{
    $sql = "SELECT `cep`, `rua`, `bairro`, `cidade`, `numeroResidencia` FROM `endereco` WHERE fk_instituicao_id = '$instituicaoID'";
    
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
// RETONA O ID DAS INSTITUIÇÕES A PARTIR DO NOME
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
// RETORNA AS INSTITUIÇOES PELO CURSO QUE OFERECEM
function returnInstituicaoByCourseID($courseID,$con)
{
     $sql = "SELECT * FROM `curso_instituicao` WHERE fk_idCurso = '$courseID'";
    if(!$rs = mysqli_query($con,$sql)){

        echo("Error description: " . mysqli_error($con)."<br>");
        
    }else{

    while($rg = mysqli_fetch_array($rs)){
        
        $id= $rg['fk_instituicao_id'];
    }
        
        return $id;   
    }
    
}
// RETORNA O NOME DAS INSTITUIÇÕES A PARTIR DO ID
function returnInstituicaoNome($instituicaoID,$con)
{
    
 

    $sql = "SELECT * FROM `instituicao` WHERE instituicao_id = '$instituicaoID'";
    if(!$rs = mysqli_query($con,$sql)){

        echo("Error description: " . mysqli_error($con)."<br>");
        
    }else{

    while($rg = mysqli_fetch_array($rs)){
        
        $nome= $rg['nome'];
    }
        
        return $nome;   
    }
    
}
// RETORNA O ID DOS ALUNOS A PARTIR DO CPF
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

//VERIFICAR SE O CURSO JÁ FOI CADASTRADO NA ISTITUIÇÃO

function courseAlredyRegistered($CourseID,$instituicaoID,$con){

    $sql = "SELECT `fk_idCurso` FROM `curso_instituicao` WHERE `fk_instituicao_id` = '$instituicaoID'";
    if(!$rs = mysqli_query($con,$sql)){

        echo("Error description: " . mysqli_error($con)."<br>");
        
    }else{
        
        $flag=0;

        while($rg = mysqli_fetch_array($rs)){
            
            $registeredCourse= $rg['fk_idCurso'];
            
            if(isset($registeredCourse)){
                if($registeredCourse==$CourseID){
                
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

// VERIFICA SE O ALUNO JÁ SE MATRICULOU EM DETERMINADO CURSO
function isRegistered($cpf,$nome,$dataDeNascimento,$email,$con){

    $sql = "SELECT nome, aluno_cpf, dataDeNascimento, email FROM `aluno` WHERE nome = '$nome' AND aluno_cpf='$cpf' AND dataDeNascimento= '$dataDeNascimento' AND email='$email'";
    
    if(!$rs = mysqli_query($con,$sql)){

        echo("Error description: " . mysqli_error($con)."<br>");
        
    }else{
        
        $flag=0;

        while($rg = mysqli_fetch_array($rs)){
            
            
            
            $CPFRegistered = $rg['aluno_cpf'];
            $nomeRegistered = $rg['nome'];
            $dataDeNascimentoRegistered = $rg['dataDeNascimento'];
            $emailRegistered = $rg['email'];
            
            if(isset($CPFRegistered) && isset($nomeRegistered) && isset($dataDeNascimentoRegistered) && isset($emailRegistered)){
                
                if(($CPFRegistered==$cpf) && ($nomeRegistered==$nome) && ($dataDeNascimentoRegistered==$dataDeNascimento) && ($emailRegistered==$email)){
                
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