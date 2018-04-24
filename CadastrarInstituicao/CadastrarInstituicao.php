<html>
    <head>
        <meta charset="ISO-8859-1">
        <title>Cadastrar Instituição</title>
        <link REL="SHORTCUT ICON" HREF="../icones/favicon.ico">
        <link REL="STYLESHEET" HREF="../CSS/STYLE.CSS" TYPE="TEXT/CSS"/>

        <script type="text/javascript" src="../Javascript/formatterFields.js"></script>
		<script type="text/javascript" src="../Javascript/CEP.js"></script>
        <script type="text/javascript" src="../Javascript/checkFields.js"></script>
    </head>
    
    <body>
    <form name="instituicao" action="cadastrarInstituicaoNoBD.php" method="POST">
        <div class="caixa">

            <p class="separador">Cadastrar Instituição</p>
            <br>
            <!--Campo Nome-->
				<label class="formulario">Nome da Instituição: <font color="red">*</font></label></br>
				<input required class="entrada" type="text" name="nome" id="nome"size="30" onblur="return verify(this.value,'nome','nomeIncorreto')"/>
				<p class="ocultos" id="nomeIncorreto">Informe seu nome da Instituição</p>
				</br>
                <!--Campo Telefone-->
				<label class="formulario">Telefone:<font color="red">*</font></label></br>
				<input required  class="entrada"  type="text"  name="telefone"  id="telefone"  size="14"  maxlength="14"  onkeydown="javascript: fMasc( this, mTel );"  onblur="verify(this.value,'telefone','tel')"/>
				<p class="ocultos" id="tel">Infome um número de contato</p>
				</br>
                <!--Campo CEP-->
				<label class="formulario">CEP:<font color="red">*</font></label><br>
				<input required class="entrada"  name="CEP"  id="CEP"  type="text"  value=""  onkeydown="javascript: fMasc( this, mCEP );"   maxlength="10"  onblur="return search_cep(this.value);"/> 
				<p class="ocultos" id="cepI">Infome um CEP válido</p>
				</br>

				<!--Campo Rua-->
				<label class="formulario">Rua:<font color="red">*</font></label><br>
				<input required class="entrada"  type="text"  value=""  name="rua"  id="rua" onblur="verify(this.value,'rua','ruaI')" />
				<p class="ocultos" id="ruaI">Informe o nome da rua</p>
				<br>

				<!--Campo bairro-->
				<label class="formulario">Bairro:<font color="red">*</font></label></br>
				<input required class="entrada"  type="text"  name="bairro"  value=""  id="bairro" onblur="verify(this.value,'bairro','bairroI')" />
				<p class="ocultos" id="bairroI">Informe o nome do bairro</p>
				<br>

				<!--Campo Cidade-->
				<label class="formulario">Cidade:<font color="red">*</font></label><br>
				<input required class="entrada"  type="text"  name="cidade"  value=""  id="cidade" onblur="verify(this.value,'cidade','cidadeI')" />
				<p class="ocultos" id="cidadeI">Informe o nome da cidade</p>
				<br>
				
				<!--Campo Número-->
				<label class="formulario">Número (S/N casa não haja):<font color="red">*</font></label><br>
				<input required class="entrada"  type="text"  name="numeroResidencia"  value=""  id="numeroResidencia" onblur="verify(this.value,'numeroResidencia','numI')" />
				<p class="ocultos" id="numI">Informe o número da residência</p>
                <br>
                
                <!--Campo Seleciona o curso-->
                <label class="formulario">Cursos: <font color="red">*</font></label></br>
                <p id="availableCoursesError" class="ocultos">selecione algum curso abaixo</p>
               
                <?php
                        include("../conexao.php");

                        $con = open_connection();
                        $sql="SELECT * FROM curso";
            
                        $resultado = mysqli_query($con,$sql) or die("Erro ao retornar dados");
            
            
            
                        while($registro = mysqli_fetch_array($resultado))
                        {
                            $nome= $registro['nome'];
                            $id= $registro['idCurso'];
                           

                            echo" 
                            
                            <input type='checkbox' name='course[]' value='$id'/>$nome<br>
                            
                            ";
                                    
                        }
                       close_connection($con);
                    ?>
                    
                <input class="bntEnviar" type="submit" value="Enviar" />
                <br>
                <br>
        </div>
        
    </form>
    </body>
</html>