<?php
include('../conexao.php');
include('../returnID.php');
session_start();

$con = open_connection();
/* realização do cadastro do curso na instituição */
    // recebe os dados
    if(!empty($_POST['local']) && !empty($_POST['curso']) && !empty($_POST['cursoInicio'])  &&!empty($_POST['cursoFim']) && !empty($_POST['turno']))
    {
         $instituicaoNome = $_POST['local'];
         $cursoNome = $_POST['curso'];
         $inicio = $_POST['cursoInicio'];
         $Fim = $_POST['cursoFim'];
         $turno = $_POST['turno'];

         $instituicaoID = returnIDInstituicao($instituicaoNome,$con);
         $curseID = returnIDCourse($cursoNome,$con);

        if(!courseAlredyRegistered($curseID,$instituicaoID,$con)){
        
            /*** Realiza a conversão do formato da data ****/
               
                $cursoInicioBRFormat = DateTime::createFromFormat('d/m/Y', $inicio);
                $cursoInicioUSformat = $cursoInicioBRFormat->format('Y-m-d');
        
                $cursoFimBRFormat = DateTime::createFromFormat('d/m/Y', $Fim);
                $cursoFimUSformat = $cursoFimBRFormat->format('Y-m-d');

            /******/
        
        
            // CADASTRA O LOCAL DO CURSO 

            $sql = "INSERT INTO `curso_instituicao`(`fk_idCurso`, `fk_instituicao_id`) VALUES ('$curseID','$instituicaoID')";
            
            if(!mysqli_query($con,$sql)){
                echo("Error description: " . mysqli_error($con)."<br>");
            }else{
            
                 // cadastro do periodo do curso
                $curseID = returnIDCourse($cursoNome,$con);
            
                $sql = "INSERT INTO `periodo_curso`(`fk_cursoID`, `fk_instituicaoID`, `dataInicio`, `dataFim`,`turno`) VALUES ('$curseID','$instituicaoID','$cursoInicioUSformat','$cursoFimUSformat','$turno')";
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
        $_SESSION['instituicaoID'] = $instituicaoID;
        
    }else{
        $instituicaoID = $_SESSION['instituicaoID'];
    }



    

?>
<html>
    <head>
    <!-- <link REL="STYLESHEET" HREF="prepareTableToExport/style-table.CSS" TYPE="TEXT/CSS"/> -->
    <script type="text/javascript" src="../Javascript/formatterFields.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <style>
    body{
        background-image: none;
        
    }
    input{
        border: none;
    }
    </style>
    </head>
    <body>
  
    
   
    <br>
<center>
    <table>
        <thead>
            <caption> <?php echo isset($instituicaoNome)? "<b>". $instituicaoNome."</b>": 'Escolha Uma Instituição'; ?></caption>
            <th>Curso</th>
            <th>Inicio</th>
            <th>Término</th>
            <th>Turno</th>
            <th>Atualizar</th>
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
                <form id='formulario' action='AtualizarPeriodoDoCurso.php?' method='get'>
                    <td><input name='nome' required maxlength='10' size='30' class='entrada' type='text' value='$id'/></td>
                    <td><input name='inicio' required maxlength='10' size='8' class='entrada' type='text' onkeydown='javascript: fMasc( this, mData );' value='$periodo[0]'></td>
                    <td><input name='fim' required maxlength='10' size='8' class='entrada' type='text' onkeydown='javascript: fMasc( this, mData );' value='$periodo[1]'></td>
                    <td><input name='turno' required maxlength='10' size='6' class='entrada' type='text' value='$periodo[2]'></td>
                    <td><input type='image' src='../icones/editar.png' value='Editar'/> </td>
                </form>
            </tr>";
            }
        }
    }
    close_connection($con);
?>
        <tbody>
    </table>
</center>
</html>