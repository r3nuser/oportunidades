<?php

function returnID($cursoNome,$con)
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



?>