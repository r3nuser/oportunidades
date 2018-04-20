<html>
    <head>
        <meta charset="ISO-8859-1">
        <title>Cadastrar Cursos</title>
        <link REL="SHORTCUT ICON" HREF="../icones/favicon.ico">
        <link REL="STYLESHEET" HREF="../CSS/STYLE.CSS" TYPE="TEXT/CSS"/>
        <script type="text/javascript" src="../scripts_js/mask_camp.js"></script>
		<script type="text/javascript" src="../scripts_js/cep_modulo.js"></script>
        <script type="text/javascript" src="../scripts_js/valid_data.js"></script>
    </head>
    
    <body>
        <div class="caixa">

            <p class="separador">Cadastrar novo curso</p>
            <br>
            <form action="sendCourseToDatabase.php" method="POST">
                <label class="formulario" for="cursoNome">Nome do Curso</label><br>
                <input class="entrada" type="text" name="cursoNome"><br>
                <label class="formulario" for="cursoInicio">Data de inicio</label><br>
                <input maxlength="10" class="entrada" type="text" name="cursoInicio" onkeydown="javascript: fMasc( this, mData );" ><br>
                <label class="formulario" for="cursoFim">Data de Témino</label><br>
                <input maxlength="10" class="entrada" type="text"name="cursoFim" onkeydown="javascript: fMasc( this, mData );"><br>
                <br>
                <input class="bntEnviar" type="submit" value="Cadastrar"> 
            </form>
            <p class="separador">Cursos atualmente disponíveis</p>
            <table>
                <thead>
                    <th>ID do curso</th>
                    <th>Curso</th>
                    <th>Data de Início</th>
                    <th>Data de Término</th>
                </thead>
               
                <tbody>
                    <?php
                        include("../conexao.php");

                        $con = open_connection();
                        $sql="SELECT * FROM curso";
            
                        $resultado = mysqli_query($con,$sql) or die("Erro ao retornar dados");
            
            
            
                        while($registro = mysqli_fetch_array($resultado))
                        {
                            $nome= $registro['nome'];
                            $id= $registro['idCurso'];
                            $cursoInicio =$registro['cursoInicio'];
                            $cursoFim = $registro['cursoFim'];

                            $cursoInicioUSformat = DateTime::createFromFormat('Y-m-d',$cursoInicio);
                            $cursoInicioBRFormat = $cursoInicioUSformat->format('d/m/Y');
                        
                            $cursoFimUSformat = DateTime::createFromFormat('Y-m-d',$cursoFim);
                            $cursoFimBRFormat = $cursoFimUSformat->format('d/m/Y');

                            echo" <tr>
                                    <td>$id</td>
                                    <td>$nome</td>
                                    <td>$cursoInicioBRFormat</td>
                                    <td>$cursoFimBRFormat</td>
                                </tr>";
                        }
                       close_connection($con);
                    ?>
                </tbody>
                
            </table>
        </div>
    </body>
</html>