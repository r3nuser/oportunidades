<?php

function returnIDCourse($cursoNome,$con)
{
    
 

    $sql = "SELECT * FROM `curso` WHERE nome = '$cursoNome'";
    if(!$rs = mysqli_query($con,$sql))
    {
        echo("Error description: " . mysqli_error($con)."<br>");
        
    }
    else
    {

    while($rg = mysqli_fetch_array($rs))
    {
        $id= $rg['idCurso'];
    }
        
        return $id;   
    }
    
}
function returnIDInstituicao($instituicaoNome,$con)
{
    
 

    $sql = "SELECT * FROM `instituicao` WHERE nome = '$instituicaoNome'";
    if(!$rs = mysqli_query($con,$sql))
    {
        echo("Error description: " . mysqli_error($con)."<br>");
        
    }
    else
    {

    while($rg = mysqli_fetch_array($rs))
    {
        $id= $rg['instituicao_id'];
    }
        
        return $id;   
    }
    
}



?>