<?php 

include("../conexao.php");
include("../bean/instituicao.php");

function create($instituicao){
    $sql = "";
    $con = open_connection();
    if($con != null){
        $sql = "INSERT INTO instituicao VALUES (
        '".$instituicao->instituicao_id."',
        '".$instituicao->nome."',
        '".$instituicao->fk_endereco_id."')"

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
        $sql = "SELECT * FROM instituicao";
        $result = $con->query($sql);

        if($result->num_rows > 0){
            return $result;
        }else{
            return null;
        }
    }
    close_connection($con);
}
function delete($instituicao){
    $sql = "";
    $con = open_connection();
    if($con != null){
        $sql = "DELETE FROM instituicao WHERE instituicao_id='".$instituicao->instituicao_id."'";
        if($con->query($sql) === TRUE){

        }else{

        }
    }
    close_connection($con);
}
function update($instituicao){
    $sql = "";
    $con = open_connection();
    if($con != null){
        $sql = "UPDATE instituicao SET 
        nome='".$instituicao->nome."',
        fk_endereco_id='".$instituicao->fk_endereco_id."', WHERE 
        instituicao_id='".$instituicao->instituicao_id."'";

        if($con->query($sql) === TRUE){
            
        }else{

        }
    }
    close_connection($con);
}

?>