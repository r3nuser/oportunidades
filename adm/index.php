<?php
    include("../conexao.php");
    include('../returnID.php');
    $con = open_connection();
$sql="SELECT * FROM instituicao";

$resultado = mysqli_query($con,$sql) or die("Erro ao retornar dados");




?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="style-menu.css">
        <link REL="SHORTCUT ICON" HREF="../icones/favicon.ico">
        <script type="text/javascript" src="../Javascript/formatterFields.js"></script>
		<script type="text/javascript" src="../Javascript/CEP.js"></script>
        <title>Oportunidades - Admin</title>
    </head>
    <body>
        <div class="navbar">
          <a class="link" href="#item1">Cadastrar Cursos </a>
          <a class="link" href="#item2">Cadastrar Instituições</a>
          <a class="link" href="#item3">Cadastrar Curso nas instituições</a>
          <a class="link" href="#item4">Exportar Matricula de alunos Alunos</a>
        </div>

        <div class="main">         
            <div id="item1">
               <center>
                    <br>
                    <fieldset class="cadCurso-Field">
                        <legend>Cadastrar Novo Curso</legend>
                        
                        <form action="verCursos.php" target="curso" method="POST">
                            <label class="formulario" for="cursoNome">Nome do Curso:<font color="red">*</font></label>:
                            <input required class="entrada" type="text" name="cursoNome">
                            <br>
                            <input class="bntEnviar" type="submit" value="Cadastrar"> 
                        </form>
                    </fieldset>
                    <iframe name="curso" src="verCursos.php"></iframe>
                </center>
            </div>
            <div id="item2">
                <center>
                <fieldset class="cad-insti">
                <legend>Cadastrar Instituição</legend>
                 
                    <form name="instituicaoForm" target="instituicao" action="verinstituicoes.php" method="POST">
                        <!--Campo Nome-->
                        <label class="formulario">Nome da Instituição: <font color="red">*</font></label>
                        <input required class="entrada" type="text" name="nome" id="nome"size="30"/>
                        
                        
                        <!--Campo Telefone-->
                        <label class="formulario">Telefone:<font color="red">*</font></label>
                        <input required  class="entrada"  type="text"  name="telefone"  id="telefone"  size="14"  maxlength="14"  onkeydown="javascript: fMasc( this, mTel );"/>
                        <br>
                        <!--Campo Telefone2-->
                        <label class="formulario">Telefone2:<font color="red">*</font></label>
                        <input required  class="entrada"  type="text"  name="telefone2"  id="telefone2"  size="14"  maxlength="14"  onkeydown="javascript: fMasc( this, mTel );"/>

                        <!--Campo CEP-->
                        <label class="formulario">CEP:<font color="red">*</font></label>
                        <input required class="entrada"  name="CEP"  id="CEP"  type="text"  value=""  onkeydown="javascript: fMasc( this, mCEP );"   maxlength="10"  onblur="return search_cep(this.value);"/> 
                        
                        
                        <!--Campo Rua-->
                        <label class="formulario">Rua:<font color="red">*</font></label>
                        <input required class="entrada"  type="text"  value=""  name="rua"  id="rua"/>
                        <br>
                        
                        <!--Campo bairro-->
                        <label class="formulario">Bairro:<font color="red">*</font></label>
                        <input required class="entrada"  type="text"  name="bairro"  value=""  id="bairro"/>
                        
                        
                        <!--Campo Cidade-->
                        <label class="formulario">Cidade:<font color="red">*</font></label>
                        <input required class="entrada"  type="text"  name="cidade"  value=""  id="cidade"/>
                        <br>
                        
                        <!--Campo Número-->
                        <label class="formulario">Número (S/N caso não haja):<font color="red">*</font></label>
                        <input required class="entrada"  type="text"  name="numeroResidencia"  value=""  id="numeroResidencia"/>
                        
                         <br> 
                         <br>              
                        <input class="bntEnviar" type="submit" value="Enviar" />

                    </form>    
                </fieldset>
                    <iframe name="instituicao" src="verinstituicoes.php"></iframe>
                </center>
            </div>
            <div id="item3">
                <center>
                    <fieldset  class="cad-insti">
                        <legend>Cadastrar curso na istituição</legend>
                        <form name="curso-instituicao"  action="listarCursos-Instituicao.php" target="listar" method="post">
                            <label for="local">Instituição onde o curso ocorrerá:<font color="red">*</font></label>
                            <select name="local" class="entrada" id="local">
                            <?php  
                                    while($registro = mysqli_fetch_array($resultado))
                                        {
                                            $nome = $registro['nome'];
                                            
                                            echo "<option>$nome</option>";
                                        }
                                        
                                ?>
                            </select>
                            <br>
                            <label for="local">Curso:<font color="red">*</font></label>
                            <select class="entrada" name="curso" id="curso">
                                <?php
                                    
                                    $sql="SELECT * FROM curso";
                                    if(!$resultado = mysqli_query($con,$sql))
                                    {
                                        echo("Erro ao retornar dados<br>Error description: " . mysqli_error($con)."<br>");
                                    }else{

                                        
                                        while($registro = mysqli_fetch_array($resultado))
                                        {
                                            $nome=  $registro["nome"];
                                            echo"<option>$nome</option>";
                                            
                                        }
                                    }
                                ?>
                            </select>

                            <br>
                            <br>
                            
                                <label class="formulario" for="cursoInicio">Data de inicio:<font color="red">*</font></label>
                                <input required maxlength="10" class="entrada" type="text" name="cursoInicio" onkeydown="javascript: fMasc( this, mData );" >
                                <label class="formulario" for="cursoFim">Data de Término:<font color="red">*</font></label>
                                <input required maxlength="10" class="entrada" type="text"name="cursoFim" onkeydown="javascript: fMasc( this, mData );"> 
                                <br>
                                <br>
                                <input class="bntEnviar" type="submit" value="Enviar" />
                        </form>
                    </fieldset>
                    <br>
                    <fieldset  class="cad-insti">
                        <legend>Listar Cadastros</legend>
                        <form action="listarCursos-Instituicao.php" target="listar" method="post">
                        <label class="formulario">Selecione o local do curso:</label>
                        <select name="local2" class="entrada" id="local">
                            <?php  
                                    $sql="SELECT * FROM instituicao";
                                    
                                    $resultado = mysqli_query($con,$sql) or die("Erro ao retornar dados");
                                    
                                    while($registro = mysqli_fetch_array($resultado))
                                        {
                                            $nome = $registro['nome'];
                                            
                                            echo "<option>$nome</option>";
                                        }
                                        
                                        ?>
                            </select>
                            <br>
                            <br>
                            <input class="bntEnviar" type="submit" value="Listar" />
                        </form>
                    </fieldset>
                    <br>
                    <iframe  name="listar" src="listarCursos-Instituicao.php" ></iframe>
                </center>
            </div>
            <div id="item4">
                <center>
                    <form action="prepareTableToExport/buidTable.php" target="my-iframe" method="post">
                        <label class="formularioTable" for="curso">Selecione um curso: </label>
                        <select class="entrada" name="curso">

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
                        <input class='bntEX' type="submit" value="Enviar">
                    </form>
                    <iframe class="exportar-iframe" name="my-iframe" src="prepareTableToExport/buidTable.php" ></iframe>
                    </center>
            </div>  
        </div>
    </body>
</html>