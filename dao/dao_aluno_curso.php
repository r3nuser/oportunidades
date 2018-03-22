<?php

public class dao_aluno_curso{

	include("../conexao.php");
	include("../bean/aluno_curso.php");


	function create($aluno_curso){
	    $sql = "";
	    $con = open_connection();
	    if($con != null){
	        $sql = "INSERT INTO aluno_curso VALUES(
	        '".$aluno_curso->fk_aluno_cpf."', 
	        '".$aluno_curso->fk_curso_id."', 
	        '".$aluno_curso->fk_instituicao_id."',
	        '".$aluno_curso->situacao."')";
	
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
	        $sql = "SELECT * FROM aluno_curso";
	        $result = $con->query($sql);
	
	        if($result->num_rows > 0){
	            return $result;
	        }else{
	            return null;
	        }
	    }
	    close_connection($con);
	}
	function delete($aluno_curso){
	    $sql = ""
	    $con = open_connection();
	    if($con != null){
	        $sql = "DELETE FROM aluno_curso WHERE 
	        fk_aluno_cpf='".$aluno_curso->fk_aluno_cpf."' and
	        fk_curso_id='".$aluno_curso->fk_curso_id."' and
	        fk_instituicao_id='".$aluno_curso->fk_instituicao_id."'
	        ";
	
	        if($con->query($sql) === TRUE){
	
	        }else{
	
	        }
	    }
	    close_connection($con);
	}
	function update($aluno_curso){
	    $sql = "";
	    $con = open_connection();
	    if($con != null){
	        $sql = "UPDATE aluno_curso SET 
	        situacao='".$aluno_curso->situacao."' WHERE 
	        fk_aluno_cpf='".$aluno_curso->fk_aluno_cpf."' and
	        fk_curso_id='".$aluno_curso->fk_curso_id."' and
	        fk_instituicao_id='".$aluno_curso->fk_instituicao_id."'
	        ";
	
	        if($con->query($sql) === TRUE){

	        }else{
	
	        }
	    }
	    close_connection($con);
	}

}
?>
