<?php
include('../conexao.php');
include('../returnID.php');

$con = open_connection();
/* realização do cadastro do curso na instituição */
    // recebe os dados
    if(!empty($_POST['local']) && !empty($_POST['curso']) && !empty($_POST['cursoInicio'])  &&!empty($_POST['cursoFim']))
    {
    $instituicaoNome = $_POST['local'];
    $cursoNome = $_POST['curso'];
    $inicio = $_POST['cursoInicio'];
    $Fim = $_POST['cursoFim'];

    $instituicaoID = returnIDInstituicao($instituicaoNome,$con);
    $curseID = returnIDCourse($cursoNome,$con);

    if(!courseAlredyRegistered($curseID,$instituicaoID,$con)){

        // Realiza a conversão do formato da data
            $cursoInicioBRFormat = DateTime::createFromFormat('d/m/Y', $inicio);
            $cursoInicioUSformat = $cursoInicioBRFormat->format('Y-m-d');

            $cursoFimBRFormat = DateTime::createFromFormat('d/m/Y', $Fim);
            $cursoFimUSformat = $cursoFimBRFormat->format('Y-m-d');
        //


    // CADASTRA O LOCAL DO CURSO 
        $sql = "INSERT INTO `curso_instituicao`(`fk_idCurso`, `fk_instituicao_id`) VALUES ('$curseID','$instituicaoID')";
        if(!mysqli_query($con,$sql))
        {
            echo("Error description: " . mysqli_error($con)."<br>");
        }else{
        
        // cadastro do periodo do curso
            $curseID = returnIDCourse($cursoNome,$con);

            $sql = "INSERT INTO `periodo_curso`(`fk_cursoID`, `fk_instituicaoID`, `dataInicio`, `dataFim`) VALUES ('$curseID','$instituicaoID','$cursoInicioUSformat','$cursoFimUSformat')";
            if(!mysqli_query($con,$sql))
            {
                echo("Error description: " . mysqli_error($con)."<br>");
            }else{
                echo"<script>alert('cadastro realizado com sucesso')</script>";
            }
        } 
    }else{
        echo"<script>alert('O curso \"$cursoNome\" já foi cadastrado na istituição \"$instituicaoNome\" ')</script>";
    }
}
/* ********************************************** */
if(!empty($_POST['local2'])){
    
    $instituicaoNome = $_POST['local2'];
    $instituicaoID = returnIDInstituicao($instituicaoNome,$con);
}



    

?>
<html>
    <head>
    <link REL="STYLESHEET" HREF="prepareTableToExport/style-table.CSS" TYPE="TEXT/CSS"/>
    </head>
    <body>
  
    
   
    <br>
    <table>
        <thead>
            <caption> <?php echo isset($instituicaoNome)? "<b>". $instituicaoNome."</b>": 'Escolha Uma Instituição'; ?></caption>
            <th>Curso</th>
            <th>Inicio</th>
            <th>Término</th>
        </thead>
        <tbody>
        <?php
            if(isset($instituicaoID)){
            $sql = "SELECT `fk_idCurso` FROM `curso_instituicao` WHERE fk_instituicao_id='$instituicaoID'";
            if(!$rs = mysqli_query($con,$sql)){

                echo("Error description: " . mysqli_error($con)."<br>");
                
            }else{

            while($rg = mysqli_fetch_array($rs)){
                
                $id= returnNameCourse($rg['fk_idCurso'],$con);
                $periodo =  returnArrayPeriodo($rg['fk_idCurso'],$instituicaoID,$con);
           
                echo "
            <tr>
                <td>$id</td>
                <td>$periodo[0]</td>
                <td>$periodo[1]</td>
            ";
            }
        }
    }
    close_connection($con);
?>
        <tbody>
    </table>
</html>