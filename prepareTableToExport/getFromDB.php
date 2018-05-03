<?php
    include('../conexao.php');
    include('../returnID.php');
    $con = open_connection();
?>


<html>
    <head>
		<title>Alunos Matriculados</title>
	
		<link REL="SHORTCUT ICON" HREF="../icones/favicon.ico">
		<link REL="STYLESHEET" HREF="../CSS/STYLE.CSS" TYPE="TEXT/CSS"/>
		<link REL="STYLESHEET" HREF="style-table.CSS" TYPE="TEXT/CSS"/>	
		<meta charset='UTF-8'>
       
        <style>
        iframe{
            width: 90%;
            height: 80%;
            margin-left: 5%;
            margin-right: 5%;
            border: none;
            
            
        }
        </style>
    </head>
    <body>
        <div class='caixaExportar'>
            
        <p class ='separador'>Alunos Matriculados</p>
        
        <form action="buidTable.php" target="my-iframe" method="post">
       
       <label class="formularioTable" for="curso">Selecione um curso: </label><select class="entrada" name="curso">

        <?php
            
            $sql = "SELECT DISTINCT fk_cursoID FROM curso_aluno";
    
             if(!$rs = mysqli_query($con,$sql)){
                
                 echo("Error description: " . mysqli_error($con)."<br>");
                 
             }else{
                 
                 while($rg = mysqli_fetch_array($rs)){
                        
                     $id = $rg['fk_cursoID'];
                    
                    
                     $id = returnNameCourse($rg['fk_cursoID'],$con);
                     echo"<option>$id</option>";
                   
             }
            }
            close_connection($con);
        ?>
        </select>






        <input class="botao" type="submit" value="Enviar">
       
       
        </form>


    <iframe name="my-iframe" src="buidTable.php" ></iframe>
    </div>
    </body>
</html>