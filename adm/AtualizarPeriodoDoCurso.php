<?php
	 include("../conexao.php");
	 include("../returnID.php");
	 session_start();
	 
	 if($_GET['inicio']==" "|| $_GET['fim']==" " || $_GET['turno']==" "){
		echo"<script>alert('preencha o campo e tente novamente')</script>";
		echo "<script>location.href='listarCursos-Instituicao.php'</script>";
	}else{
		
		$con = open_connection();
		
		$instituicaoID = $_SESSION['instituicaoID']; 
		$courseID = returnIDCourse($_GET['nome'],$con);  
		$inicio = $_GET['inicio'];
		$fim = $_GET['fim'] ;
		$turno = $_GET['turno'];

		/************************CONVERSÃO DA DATA************************/
		$cursoInicioBRFormat = DateTime::createFromFormat('d/m/Y', $inicio);
		$cursoInicioUSformat = $cursoInicioBRFormat->format('Y-m-d');
        
		$cursoFimBRFormat = DateTime::createFromFormat('d/m/Y', $fim);
		$cursoFimUSformat = $cursoFimBRFormat->format('Y-m-d');
		/****************************************************************/
	
		$sql = "UPDATE `periodo_curso` SET `dataInicio`='$cursoInicioUSformat',`dataFim`='$cursoFimUSformat',`turno`='$turno' WHERE fk_instituicaoID='$instituicaoID' AND fk_cursoID='$courseID'";

		if(!$rs = mysqli_query($con,$sql)){
                                    
			echo("Error description: " . mysqli_error($con)."<br>");
			close_connection($con);
		}else{
			echo"<script>alert('Atualização bem sucedida!')</script>";
			$_SESSION['instituicaoID'] = $instituicaoID;
			echo "<script>location.href='listarCursos-Instituicao.php'</script>";
			close_connection($con);
		}
	}
?>