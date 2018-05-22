 <?php
    include("../../conexao.php");
    include("../../returnID.php");
    
    $con=open_connection(); 
   $nome = $_GET['nome'];
   $alunoID = $_GET['alunoID'];
    
   $courseName = returnNameCourse(returnFKCourseByAlunoID($alunoID,$con),$con);

    $sql = "UPDATE `aluno` SET `nome`='$nome' WHERE alunoID='$alunoID'";
                        
    if(!$rs = mysqli_query($con,$sql)){
                                    
        echo("Error description: " . mysqli_error($con)."<br>");
        close_connection($con);
    }else{
    echo"<script>alert('Atualização bem sucedida!')</script>";
    echo "<script>location.href='buidTable.php?curso=$courseName'</script>";
    close_connection($con);
    }
?>