<?php
	session_start();

	
	if(empty($_POST['escolha'])){
		
		echo "<script> alert('Existem campos vazios que precisam ser preenchidos');</script>";
		echo "<script>history.back();</script>";
		
	}else{
		
		$curso = $_POST['escolha'];
		$_SESSION['curso']=$curso;

		echo"
			<html>
				<head>
					<title>Formulário de Mátricula</title>
					
					<link REL='SHORTCUT ICON' HREF='icones/favicon.ico'>
					<link REL='STYLESHEET' HREF='CSS/STYLE.CSS' TYPE='TEXT/CSS'/>
					
					<meta charset='ISO-8859-1'>
					<script type='text/javascript' src='Javascript/checkFields.js'></script>
					<script type='text/javascript' src='Javascript/checkAll_Socioeconomico.js'></script>
					<script type='text/javascript' src='Javascript/checkCourse.js'></script>
				</head>
				
				<body>
					<div class='caixa'>
						<form name='CadastroSocioeconomico' action='exibir.php' method='POST'>
							
							<!--Aviso a respeito da obrigatoriedade dos campos-->
							
							<p class='obrigatorio'>todos os campos com asterisco (\"*\") são de preenchimento obrigatório</p></br>	
							
							<p class='separador'>Informações Socioeconômicas</p>
							
							<!-- Sobre trabalho -->

							<label class='formulario'>Você está trabalhando atualmente?</label><font color='red'>*</font>
							</br>
							<select class='entrada' name='job' id='job' onblur=\"ifIsSelected(this.value,'job','trabalho')\"/>
								<option>Selecionar</option>
								<option>Sim</option>
								<option>Não</option>
							</select>
							<p id='trabalho' class='ocultos'><b>Selecione uma das opções</b></p>
							
							<!--Sobre a expectativa-->

							<label class='formulario'>Qual a sua expectativa sobre o curso?</label><font color='red'>*</font>
							</br>
							<select  class='entrada' name='expectativa' id='expectativa' onclick=\"ifOutraIsSelected(this.value,'ExpectativaInput')\"onblur=\"ifIsSelected(this.value,'expectativa','expectativaError')\"/>
								<option >Selecionar</option>
								<option>Conseguir um emprego</option>
								<option>Agregar conhecimento</option>
								<option>Gerara renda com um empreendimento próprio</option>
								<option>Outra</option>
							</select>
							<input  class='entrada'   type='text'  name='ExpectativaInput'  id='ExpectativaInput'  onblur=\"verify(this.value,'ExpectativaInput','expectativaError')\" disabled/>

							<br>
							<p id='expectativaError' class='ocultos'><b>Informe sua expectativa com o curso</b></p>
							<br>

							<label class='formulario'>Como você ficou sabendo dos cursos presenciais do projeto oportunidades?</label>
							</br>
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
							<p id='discoveredTheCourseError' class='ocultos'><b>Informe a forma pela qual você soube do oportunidades</b></p>
							<br>
							<input class='bntEnviar' type='submit' value='Enviar' onclick='return validarSocio()'/>
							
						</form>
						<br>
					</div>
				</body>
			</html>
		";
	}
?>