<?php
    include('../conexao.php');
    include('../returnID.php');
    
    $con=open_connection();
    // = returnIDInstituicao($_GET['local'],$con);
    // = returnIDCourse($_GET['curso'],$con);
    $instituicaoID = $_GET['instituicaoID'];
    
    $courseID = $_GET['courseID'];

     $sql = "DELETE FROM `periodo_curso` WHERE fk_cursoID='$courseID' AND fk_instituicaoID='$instituicaoID'";
    
     if(!$rs = mysqli_query($con,$sql)){
                                    
        echo("Error description: " . mysqli_error($con)."<br>");
        close_connection($con);
    }else{
        $sql = "DELETE FROM `curso_instituicao` WHERE fk_idCurso='$courseID' AND fk_instituicao_id='$instituicaoID'";
        if(!$rs = mysqli_query($con,$sql)){
                                    
            echo("Error description: " . mysqli_error($con)."<br>");
            close_connection($con);
        }else{
            echo"<script>alert('Remoção bem sucedida!')</script>";
			$_SESSION['instituicaoID'] = $instituicaoID;
			echo "<script>location.href='listarCursos-Instituicao.php'</script>";
			close_connection($con);
        }
    }
?>