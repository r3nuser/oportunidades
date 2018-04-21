<html>
	<head>
		<title>Formulário de Mátricula</title>
		<link REL="SHORTCUT ICON" HREF="icones/favicon.ico">
		<link REL="STYLESHEET" HREF="CSS/STYLE.CSS" TYPE="TEXT/CSS"/>
		<meta charset="ISO-8859-1">
		<script type="text/javascript" src="scripts_js/mask_camp.js"></script>
		<script type="text/javascript" src="scripts_js/cep_modulo.js"></script>
		<script type="text/javascript" src="scripts_js/valid_data.js"></script>
	</head>
	
	<body>
		<div class="caixa">
			<form name="Cadastro" action="ValidarComPHP.php" method="POST">
				
				<!--Aviso a respeito da obrigatoriedade dos campos-->
				
				<p class="obrigatorio">todos os campos com "*" são de preenchimento obrigatório</p></br>	
				
				<p class="separador">Dados Pessoais</p>
				
				<!--Campo Nome-->
				<label class="formulario">Nome Completo: <font color="red">*</font></label></br>
				<input required class="entrada" type="text" name="nome" id="nome"size="30" onblur="return verify(this.value,'nome','nomeIncorreto')"/>
				<p class="ocultos" id="nomeIncorreto">Informe seu nome completo</p>
				</br>
				
				<!--Campo Data de nascimento-->
				<label class="formulario">Data de Nascimento:<font color="red">*</font></label></br>
				<input required class="entrada" type="text" name="data" id="data" onkeydown="javascript: fMasc( this, mData );"  maxlength="10" onblur="verify(this.value,'data','dataN')"/>
				<p class="ocultos" id="dataN">Informe sua data de nascimento</p>
				</br>

				<!--Campo CPF-->
				<label class="formulario">CPF:<font color="red">*</font></label></br>
				<input required  class="entrada"  type="text"  name="CPF"  id="cpf"  onkeydown="javascript: fMasc( this, mCPF );"  maxlength="14"  onblur="return ValidarCPF(Cadastro.cpf)"/>
				<p class="ocultos" id="cpfi">Informe um CPF válido</p>
				</br>

				<p class="separador">Contato</p>

				<!--Campo Telefone-->
				<label class="formulario">Telefone/Celular 01:<font color="red">*</font></label></br>
				<input required  class="entrada"  type="text"  name="telefone"  id="telefone"  size="14"  maxlength="14"  onkeydown="javascript: fMasc( this, mTel );"  onblur="verify(this.value,'telefone','tel')"/>
				<p class="ocultos" id="tel">Infome um número de contato</p>
				</br>

				<!--Campo Celular-->
				<label class="formulario">Telefone/Celular 02:<font color="red">*</font></label></br>
				<input required  class="entrada"  type="text"  name="celular"  id="celular"  size="14"  maxlength="14"  onkeydown="javascript: fMasc( this, mTel );"  onblur="verify(this.value,'celular','cel')"/>
				<p class="ocultos" id="cel">Infome um número de contato</p>
				</br>

				<!--Campo E-mail-->
				<label class="formulario">E-mail:<font color="red">*</font></label></br>
				<input required  class="entrada" 	 type="mail" name="email"  id="email"  value=""  size="25"  onblur="return IsEmail(document.getElementById('email').value)"/>
				<p class="ocultos" id="ei"> Informe um endereço de e-mail válido</p>
				</br>

				<p class="separador">Endereço</p>

				<!--Campo CEP-->
				<label class="formulario">CEP:<font color="red">*</font></label><br>
				<input required  class="entrada"  name="CEP"  id="CEP"  type="text"  value=""  onkeydown="javascript: fMasc( this, mCEP );"   maxlength="10"  onblur="return search_cep(this.value);"/> 
				<p class="ocultos" id="cepI">Infome um CEP válido</p>
				</br>

				<!--Campo Rua-->
				<label class="formulario">Rua:<font color="red">*</font></label><br>
				<input required  class="entrada"  type="text"  value=""  name="rua"  id="rua" onblur="verify(this.value,'rua','ruaI')" />
				<p class="ocultos" id="ruaI">Informe o nome da rua</p>
				<br>

				<!--Campo bairro-->
				<label class="formulario">Bairro:<font color="red">*</font></label></br>
				<input required  class="entrada"  type="text"  name="bairro"  value=""  id="bairro" onblur="verify(this.value,'bairro','bairroI')" />
				<p class="ocultos" id="bairroI">Informe o nome do bairro</p>
				<br>

				<!--Campo Cidade-->
				<label class="formulario">Cidade:<font color="red">*</font></label><br>
				<input required  class="entrada"  type="text"  name="cidade"  value=""  id="cidade" onblur="verify(this.value,'cidade','cidadeI')" />
				<p class="ocultos" id="cidadeI">Informe o nome da cidade</p>
				<br>
				
				<!--Campo Número da Residência-->
				<label class="formulario">Número da Residência:<font color="red">*</font></label><br>
				<input required  class="entrada"  type="number"  name="numeroResidencia"  value=""  id="numeroResidencia" onblur="verify(this.value,'numeroResidencia','numI')" />
				<p class="ocultos" id="numI">Informe o número da residência</p>
				<br>

				<p class="separador">Cursos</p> 
				</br>

				<label class="formulario">O candidato opta pelo curso de:</label> 
				<input  class="entrada"  name="curso"  id="curso"  type="text"  size="52"  disabled/>
				<font color="red">*</font></br>
				<p class="ocultos" id="cursoI">escolha um dos cursos abaixo</p>
				<div>
					<input id="APN" type="radio"onclick="escolheCurso()" name="escolha" value="" checked/>selecione um dos campos abaixo</br>
					<?php
					include("conexao.php");
                    $con = open_connection();
                    $sql="SELECT * FROM curso";
        
                    $resultado = mysqli_query($con,$sql) or die("Erro ao retornar dados");
        
        
        
                    while($registro = mysqli_fetch_array($resultado))
                    {
						$nome=  $registro["nome"];
						echo"<input onclick='escolheCurso()' type='radio' name='escolha' value='$nome'>".$nome."<br>";
						
					}
        

                    close_connection($con);
                    ?></br>
				</div>
				</br>

				<p class="separador">Informações Socioeconômicas</p>
				
				<!-- Sobre trabalho -->

				<label class="formulario">Você está trabalhando atualmente?</label><font color="red">*</font>
				</br>
				<select class="entrada" name="job" id="job" onfocus=" verify(Cadastro.curso.value,'APN','cursoI')" onblur="ifIsSelected(this.value,'job','trabalho')"/>
					<option>Selecionar</option>
					<option>Sim</option>
					<option>Não</option>
				</select>
				<p id="trabalho" class="ocultos">Selecione uma das opções</p>
				
				<!--Sobre a expectativa-->

				<label class="formulario">Qual a sua expectativa sobre o curso?</label><font color="red">*</font>
				</br>
				<select  class="entrada" name="expectativa" id="expectativa" onclick="ifOutraIsSelected(this.value,'ExpectativaInput')"onblur="ifIsSelected(this.value,'expectativa','expectativaError')"/>
					<option >Selecionar</option>
					<option>Conseguir um emprego</option>
					<option>Agregar conhecimento</option>
					<option>Gerara renda com um empreendimento próprio</option>
					<option>Outra</option>
				</select>
				<input  class="entrada"   type="text"  name="ExpectativaInput"  id="ExpectativaInput"  onblur="verify(this.value,'ExpectativaInput','expectativaError')" disabled/>

				<br>
				<p id="expectativaError" class="ocultos">Informe sua expectativa com o curso</p>
				<br>

				<label class="formulario">Como você ficou sabendo dos cursos presenciais do projeto oportunidades?</label>
				</br>
				<select class="entrada" name="discoveredTheCourse" id="discoveredTheCourse" onclick="ifOutroIsSelected(this.value,'discoveredTheCourseInput')"onblur="ifIsSelected(this.value,'discoveredTheCourse','discoveredTheCourseError')"/>
					<option>Selecionar</option>
					<option>Divulgação na TV</option>
					<option>Noticiários em Jornais</option>
					<option>Internet</option>
					<option>Por meio de amigos</option>
					<option>Outro</option>
				</select> 
				<input  class="entrada"   type="text"  name="discoveredTheCourseInput"  id="discoveredTheCourseInput"  onblur="verify(this.value,'discoveredTheCourseInput','discoveredTheCourseError')" disabled/>
				<br>
				<p id="discoveredTheCourseError" class="ocultos">Informe a forma pela qual você soube do oportunidades</p>
				<br>
				<input class="bntEnviar" type="submit" value="Enviar" onclick="return validarTudo()"/>
			</form>
			<br>
		</div>
	</body>
</html> 