<?php 

include("../conexao.php");

function create($curso){
    $sql = "";
    $con = open_connection();
    if($con != null){
        $sql = "INSERT INTO curso VALUES(
        '".$curso->curso_id."',
        '".$curso->nome."',
        '".$curso->inicio_curso."',
        '".$curso->fim_curso."')";

        if($con->query($sql) === TRUE){

        }else{

        }
    }
    close_connection($con);
}
function read(){
    $sql = "";
    $result = "";
    $con = open_connection();
    if($con != null){
        $sql = "SELECT * FROM curso";
        $result = $con->query($sql);

        if($result->num_rows > 0){
            return $result;
        }else{
            return null;
        }
    }
    close_connection($con);
}
function delete($curso){
    $sql = "";
    $con = open_connection();
    if($con != null){
        $sql = "DELETE FROM curso WHERE curso_id='".$curso->curso_id."'";

        if($con->query($sql) === TRUE){

        }else{

        }
    }
    close_connection($con);
}
function update($curso){
    $sql = "";
    $con = open_connection();
    if($con != null){
        $sql = "UPDATE curso SET 
        nome='".$curso->nome."',
        inicio_curso='".$curso->inicio_curso."',
        fim_curso='".$curso->fim_curso."'
        WHERE curso_id='".$curso->curso_id."'";

        if($con->query($sql) === TRUE){

        }else{

        }    
    }
    close_connection($con);
}

?>