<?php
    //Includes de arquivos necessários
    include("../conexao.php");
    include('../returnID.php');
    //seleciona do banco todos os registros em instituição
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
        <!-- Lincando os CSS -->
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="style-menu.css">
        <link rel="stylesheet" href="../css/index-div.css">
        <!-- Adicionando o icone do titulo -->
        <link rel="SHORTCUT ICON" href="../icones/favicon.ico">
        <!-- Lincando os arquivos com de formatação e busca de CEP -->
        <script type="text/javascript" src="../Javascript/formatterFields.js"></script>
		<script type="text/javascript" src="../Javascript/CEP.js"></script>
        <script type="text/javascript" src="../Javascript/submit.js"></script>
        <title>Oportunidades - Admin</title>
       <!-- Script inline que muda o action dos formulários -->
        <script>
            
            
        </script>
    </head>
    <body>
        <!-- Barra de menu -->
        <div class="navbar">
          <a class="link" href="#item1">Cadastrar Cursos </a>
          <a class="link" href="#item2">Cadastrar Instituições</a>
          <a class="link" href="#item3">Cadastrar Curso nas instituições</a>
          <a class="link" href="#item4">Exportar Matricula de alunos Alunos</a>
        </div>
        <!-- inicio da div main -->
        <div class="main">         
            <!-- inicio da div item1 -->
            <div id="item1">
               <center>
                    <br>
                    <fieldset class="cadCurso-Field"><!-- Inicio do fieldset -->
                        <legend>Cadastrar Novo Curso</legend>
                        
                        <form action="cursos/verCursos.php" target="curso" method="GET">
                            <label class="formulario" for="cursoNome">Nome do Curso:<font color="red">*</font></label>
                            <input class="entrada" onkeypress="handleEnter(event)" type="text" value="" name="cursoNome" required/>
                            
                                <!-- Botões submit: On click a função Submit é disparada para mudar o action do formulário -->
                               <input class="bntEX" type="submit" onclick="return confirmCadastro()" value="Cadastrar"> 
                               <!-- <input class="bntDeletar" type="button" onclick="Submit('2');" value="Deletar"> -->
                        </form><!-- fim do formulário -->
                    </fieldset><!-- fim do fieldset -->
                    <!-- iframe verinstituicoes.php na pagina, do ponto de vista do usuário correponde àpenas uma tabela com os dados do curso  -->
                    <iframe name="curso" src="cursos/verCursos.php"></iframe>
                </center>
            </div><!-- fim da div item 1 -->

            <div id="item2"><!-- Inicio da div item2 -->
                <center>
                    <fieldset class="cad-insti">
                    <legend>Cadastrar Instituição</legend>
                    <form id="insti"name="instituicaoForm" target="instituicao" action="instituicao/verInstituicoes.php" method="POST"><!-- inicio do formulário "insti" -->
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
                                     
                         <!-- Botões submit: On click a função SubmitInstituicao é disparada para mudar o action do formulário -->
                        <input class="bntEX" type="submit" onclick="return confirmCadastro()" value="Cadastrar"> 
                        
                    </form><!-- fim do formulário -->
                </fieldset><!-- fim do fieldset -->
                    <!-- iframe verinstituicoes.php na pagina, do ponto de vista do usuário correponde àpenas uma tabela com os dados da instituição  -->
                    <iframe name="instituicao" src="instituicao/verInstituicoes.php"></iframe>
                </center>
            </div><!-- fim da divi item2 -->
            <div id="item3"><!-- inicio div item3 -->
                <center>
                    <fieldset  class="cad-insti"><!-- inicio do fieldset -->
                        <legend>Cadastrar curso na istituição</legend>
                        <form name="curso-instituicao" id="cad" action="listarCursos-Instituicao.php" target="listar" method="post"><!-- inicio do form -->
                            <label for="local">Instituição onde o curso ocorrerá:<font color="red">*</font></label>
                            <!-- retorna do banco o nome das instituições -->
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
                            <!-- retorna do banco de dados o nome dos cursos -->
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
                            <!-- Data de inicio  -->
                            <label class="formulario" for="cursoInicio">Data de inicio:<font color="red">*</font></label>
                            <input required maxlength="10" class="entrada" type="text" name="cursoInicio" onkeydown="javascript: fMasc( this, mData );" >
                            <!-- Data de término -->
                            <label class="formulario" for="cursoFim">Data de Término:<font color="red">*</font></label>
                            <input required maxlength="10" class="entrada" type="text"name="cursoFim" onkeydown="javascript: fMasc( this, mData );"> 
                            <!-- Turno -->
                            <label class="formulario" for="turno">Turno:<font color="red">*</font></label>
                            <select name="turno" class="entrada" id="turno">
                                <option>Matutino</option>
                                <option>Vespertino</option>
                                <option>Noturno</option>
                            </select>
                            
                            <br>
                            <br>
                            <!-- Botões submit: On click a função SubmitInstituicao é disparada para mudar o action do formulário 
                            não houve necessidade de criar uma função especifica para esse formulário, como o do item 3 possúi pois estes estão identificados por
                            um id e sendo "pegos" apartir dele-->
                            <input class="bntEnviar" type="submit" onclick="return confirmCadastro()" value="Cadastrar"> 
                            
                        </form><!-- fim do form -->
                    </fieldset><!-- fim do fielset -->
                    <br>
                    <fieldset  class="cad-insti"><!-- inicio 2º fieldset -->
                        <legend>Listar Cadastros</legend>
                        <form action="listarCursos-Instituicao.php" target="listar" method="post"><!-- inicio 2º form -->
                        <!-- Retorna do banco as instituições cadastradas  -->
                        <label class="formulario">Selecione o local do curso:</label>
                        <select name="local2" class="entrada" id="local">
                            <?php       
                                $sql="SELECT * FROM instituicao";
                                
                                $resultado = mysqli_query($con,$sql) or die("Erro ao retornar dados");
                                
                                while($registro = mysqli_fetch_array($resultado)){
                                    $nome = $registro['nome'];    
                                    echo "<option>$nome</option>";
                                }
                            ?>
                            </select>
                            <br>
                            <br>
                            <!-- quando clicado envia os dados à uma iframe que irá monta-los na tela -->
                            <input class="bntEnviar" type="submit" value="Listar" /><!--classe em: CSS/style.css -->
                        </form><!-- fim do form -->
                    </fieldset><!-- fim do fieldset -->
                    <br>
                    <!-- para usuário corresponderá à lista de cursos com a relação de inicio, fim e instituição que oferece -->
                    <iframe  name="listar" src="listarCursos-Instituicao.php" ></iframe>
                </center>
            </div><!--fim de item 3  -->
            <div id="item4"><!-- inicio da div item4 -->
                <center>
                    <form action="prepareTableToExport/buidTable.php" target="my-iframe" method="get"><!-- inicio do form que possúi um action para prepareTableToExport/buidTable.php  -->
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
                        <input class='bntEX' type="submit" value="OK"><!-- classe localizada em css/style.css -->
                    </form>
                    <!-- tabela correspondente ao que será exportado para excel (ponto de vista do usuário) -->
                    <iframe class="exportar-iframe" name="my-iframe" src="prepareTableToExport/buidTable.php" ></iframe>
                    </center>
            </div>  
        </div>
    </body>
</html>
