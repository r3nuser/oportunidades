<?php
	

	echo"
		<html>
			<head>
				<title>Formulário de Mátricula</title>
				
				<link REL='SHORTCUT ICON' HREF='icones/favicon.ico'>
				<link REL='STYLESHEET' HREF='CSS/STYLE.CSS' TYPE='TEXT/CSS'/>
				<link REL='STYLESHEET' HREF='CSS/index-div.css' TYPE='TEXT/CSS'/>
				<meta charset='UTF-8'>
				
				<script type='text/javascript' src='Javascript/formatterFields.js'></script>
				<script type='text/javascript' src='Javascript/CEP.js'></script>
				<script type='text/javascript' src='Javascript/checkCPF.js'></script>
				<script type='text/javascript' src='Javascript/checkFields.js'></script>
				<script type='text/javascript' src='Javascript/checkEmail.js'></script>
				<script type='text/javascript' src='Javascript/checkCourse.js'></script>
				
				<script type='text/javascript' src='Javascript/checkAll.js'></script>

			</head>
			
			<body>
				<div class='container-principal'>
				
					<form name='Cadastro' action='exibir.php' method='POST'>
						
						<!--Aviso a respeito da obrigatoriedade dos campos-->
						
							<p class='obrigatorio'>todos os campos com asterisco (\"*\") são de preenchimento obrigatório</p></br>

								<div class='container-interno-Dados-Pessoais'>
									<p class='separador'>Dados Pessoais</p>
									<div class='div-cotainer-dados-pessoais'>
									
									<!--Campo Nome-->
									<label class='formulario'>Nome Completo: <font color='red'>*</font></label>
									<input class='entrada' type='text' name='nome' id='nome'size='30' onblur=\"return verify(this.value,'nome','nomeIncorreto')\"/>
									<span class='ocultos' id='nomeIncorreto'><b>Informe seu nome completo</b></span>
									
									<!--Campo CPF-->
									<label class='formulario'>CPF:<font color='red'>*</font></label>
									<input class='entrada'  type='text'  name='CPF'  id='cpf'  onkeydown='javascript: fMasc( this, mCPF );'  maxlength='14'  onblur=\"return ValidarCPF(Cadastro.cpf);\"/>
									<span class='ocultos' id='cpfi'><b>Informe um CPF válido</b></span><br>

									
									<!--Campo Data de nascimento-->
									<label class='formulario'>Data de Nascimento:<font color='red'>*</font></label>
									<input class='entrada' type='text' name='data' id='data' onkeydown='javascript: fMasc( this, mData );'  maxlength='10' onblur=\"verify(this.value,'data','dataN')\"/>
									<span class='ocultos' id='dataN'><b>Informe sua data de nascimento</b></span>
									
									
									
									
								</div>
								</div>
					
								<div class='container-interno-Cursos'>
								
									<p class='separador'>Cursos</p> 
									

									<div class='div-cotainer'>
									
									<span id='teste' class='formulario'>O candidato opta pelo curso de:<font color='red'>*</font></span></br> 
							
									<!--<input  class='entrada'  name='curso'  id='curso'  type='text'  size='52'  disabled/>-->
							
									<span class='ocultos' id='cursoI'><b>escolha um dos cursos abaixo</b></span>
									<br>
									<br>
							
									<input  id='APN' type='radio'onclick='escolheCurso()' name='escolha' value=\"\" checked/>selecione um dos campos abaixo</br>
									
									";
		
									include("conexao.php");
									$con = open_connection();

									$sql="SELECT * FROM curso";
									$resultado = mysqli_query($con,$sql) or die("Erro ao retornar dados");
		
									while($registro = mysqli_fetch_array($resultado))
									{
										$nome=  $registro["nome"];
										echo"<input onclick='escolheCurso()' onfocus=\"desabilitar('cursoI');\" type='radio' name='escolha' value='$nome'>".$nome."<br>";
									
									}
					
		
							
									close_connection($con);
								
									echo"
						
								</div>
								</div>
								<div class='container-interno-Contatos'>
					
					
					
									<p class='separador'>Contato</p>
									
									<div class='div-cotainer'>
									
									<!--Campo Telefone1-->
										<label class='formulario'>Telefone/Celular 01:<font color='red'>*</font></label>
										<input class='entrada'  type='text'  name='telefone'  id='telefone'  size='14'  maxlength='14'  onkeydown='javascript: fMasc( this, mTel );'  onblur=\"verify(this.value,'telefone','tel')\"/>
										<span class='ocultos' id='tel'><b>Infome um telefone</b></span>
										
										
										<!--Campo Telefone2-->
										<label class='formulario'>Telefone/Celular 02:<font color='red'>*</font></label>
										<input class='entrada'  type='text'  name='celular'  id='celular'  size='14'  maxlength='14'  onkeydown='javascript: fMasc( this, mTel );'  onblur=\"verify(this.value,'celular','cel')\"/>
										<span class='ocultos' id='cel'><b>Infome um telefone</b></span></br>
										
										
										
										<!--Campo E-mail-->
										<label class='formulario'>E-mail:<font color='red'>*</font></label>
										<input class='entrada' 	 type='mail' name='email'  id='email'  value=\"\"  size='25'  onblur='return IsEmail(this.value)'/>
										<span class='ocultos' id='ei'><b> Informe um endereço de e-mail </b></span>
										
										
										</div>
										</div>
										
										<div class='container-interno-Enderecos'>
										
										
										<p class='separador'>Endereço</p>
										
										<div class='div-cotainer'>

											<!--Campo CEP--><!--Não está sendo validado com JS-->
											<label class='formulario'>CEP:<font color='red'>*</font></label>	
											<input class='entrada'  name='CEP'  id='CEP'  type='text'  value=\"\"  onkeydown='javascript: fMasc( this, mCEP );'   maxlength='10'  onblur='return search_cep(this.value);'/> 
											<span class='ocultos' id='cepI'><b>Infome um CEP válido</b></span>
											
											<br>
											<!--Campo Rua-->
											<label class='formulario'>Rua:<font color='red'>*</font></label>	
											<input class='entrada'  type='text'  value=\"\"  name='rua'  id='rua' onblur=\"verify(this.value,'rua','ruaI')\" />
											<span class='ocultos' id='ruaI'><b>Informe o nome da rua</b></span>
											
											<br>
											<!--Campo bairro-->
											<label class='formulario'>Bairro:<font color='red'>*</font></label>
											<input class='entrada'  type='text'  name='bairro'  value=\"\"  id='bairro' onblur=\"verify(this.value,'bairro','bairroI')\" />
											<span class='ocultos' id='bairroI'><b>Informe o nome do bairro</b></span>
											
											<br>
											<!--Campo Cidade-->
											<label class='formulario'>Cidade:<font color='red'>*</font></label>	
											<input class='entrada'  type='text'  name='cidade'  value=\"\"  id='cidade' onblur=\"verify(this.value,'cidade','cidadeI')\"/>
											<span class='ocultos' id='cidadeI'><b>Informe o nome da cidade</b></span>
											
											<br>
											<!--Campo Número da Residência-->
											<label class='formulario'>Número da Residência:<font color='red'>*</font></label>	
											<input class='entrada'  type='number' min='0'  name='numeroResidencia'  value=\"\"  id='numeroResidencia' onblur=\"verify(this.value,'numeroResidencia','numI')\"/>
											<br>
											<span class='ocultos' id='numI'><b>Informe o número da residência</b></span>
										</div>
										</div>
					
										<div class='container-interno-SocioEconomicas'>
					
											<p class='separador'>Informações Socioeconômicas</p>
											<div class='div-cotainer'>
											<!-- Sobre trabalho -->
											
											<label class='formulario'>Você está trabalhando atualmente?</label><font color='red'>*</font>
											</br>
											<select class='entrada' name='job' id='job' onblur=\"ifIsSelected(this.value,'job','trabalho')\"onfocus='courseUnchecked()'/>
											<option>Selecionar</option>
											<option>Sim</option>
											<option>Não</option>
											</select>
											<br>
											
											<span id='trabalho' class='ocultos'><b>Selecione uma das opções</b></span>
											
											<!--Sobre a expectativa-->
											<br>
											<br>
											<label class='formulario'>Qual a sua expectativa sobre o curso?</label><font color='red'>*</font>
											
											<select  class='entrada' name='expectativa' id='expectativa' onclick=\"ifOutraIsSelected(this.value,'ExpectativaInput')\"onblur=\"ifIsSelected(this.value,'expectativa','expectativaError')\"/>
											<option >Selecionar</option>
											<option>Conseguir um emprego</option>
											<option>Agregar conhecimento</option>
											<option>Gerara renda com um empreendimento próprio</option>
											<option>Outra</option>
											</select>
											<input  class='entrada'   type='text'  name='ExpectativaInput'  id='ExpectativaInput'  onblur=\"verify(this.value,'ExpectativaInput','expectativaError')\" disabled/>
											
											<br>
											
											<span id='expectativaError' class='ocultos'><b>Informe sua expectativa com o curso</b></span>
											<br>
											<br>
											<label class='formulario'>Como você ficou sabendo dos cursos presenciais do projeto oportunidades?</label>
											
											<select class='entrada' name='discoveredTheCourse' id='discoveredTheCourse' onclick=\"ifOutroIsSelected(this.value,'discoveredTheCourseInput')\"onblur=\"ifIsSelected(this.value,'discoveredTheCourse','discoveredTheCourseError')\"/>
											<option>Selecionar</option>
											<option>Divulgação na TV</option>
											<option>Noticiários em Jornais</option>
											<option>Internet</option>
											<option>Por meio de amigos</option>
											<option>Outro</option>
											</select> 
											<input  class='entrada'   type='text'  name='discoveredTheCourseInput'  id='discoveredTheCourseInput'  onblur=\"verify(this.value,'discoveredTheCourseInput','discoveredTheCourseError')\" disabled/>
											<br>
											<span id='discoveredTheCourseError' class='ocultos'><b>Informe a forma pela qual você soube do oportunidades</b></span>
											
										</div>
										</div>
						<div class='contenerBotao'>		
						<div class='enviar-apagar'>	
						<input class='bnt' type='reset' value='Cancelar'/> <input class='bnt' type='submit' value='Próximo' onclick='return validarTudo();'/>
						</div>
						</div>
					</div>
				</form>
			</body>
					
		</html>
 	"; 
?>