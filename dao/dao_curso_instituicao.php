<?php 

include("../conexao.php");
include("../bean/curso_instituicao");

function create($curso_instituicao){
    $sql = "";
    $con = open_connection();
    if($con != null){
        $sql = "INSERT INTO curso_instituicao VALUES(
        '".$curso_instituicao->fk_curso_id."',
        '".$curso_instituicao->fk_instituicao_id."')";

        if($con->query($sql) === TRUE){

        }else{

        }
    }
    close_connection($con);
}
function read(){
    $result = "";
    $sql = "";
    $con = open_connection();
    if($con != null){
        $sql = "SELECT * FROM curso_instituicao";
        $result = $con->query($sql);

        if($result->num_rows > 0){
            return $result;
        }else{
            return null;
        }
    }
    close_connection($con);
}
function delete($curso_instituicao){
    $sql = "";
    $con = open_connection();
    if($con != null){
        $sql = "DELETE FROM curso_instituicao WHERE 
        fk_curso_id='".$curso_instituicao->."' and 
        fk_instituicao_id='".$curso_instituicao->."'";

        if($con->query($sql) === TRUE){

        }else{

        }
    }
    close_connection($con);
}
function update($curso_instituicao, $new_curso_instituicao){
    $sql = "";
    $con = open_connection();
    if($con != null){
        $sql = "UPDATE curso_instituicao SET 
        fk_curso_id='".$new_curso_instituicao->fk_curso_id."',
        fk_instituicao_id='".$new_curso_instituicao->fk_instituicao_id."' WHERE 
        fk_curso_id='".$curso_instituicao->fk_curso_id."' and 
        fk_instituicao_id='".$curso_instituicao->fk_instituicao_id."'";

        if($con->query($sql) === TRUE){
            
        }else{

        }
    }
    close_connection($con);
}

?>