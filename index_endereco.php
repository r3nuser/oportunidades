<?php

	session_start();

	if(	empty($_POST['telefone']) || empty($_POST['celular']) || empty($_POST['email']))
	{
			echo "<script> alert('Existem campos vazios que precisam ser preenchidos');</script>";
			echo "<script>history.back();</script>";
	}else{

		$telefone1 = $_POST['telefone'];
		$telefone2 = $_POST['celular'];
		$email = $_POST['email'];

		$_SESSION['telefone1']=$telefone1;
		$_SESSION['telefone2']=$telefone2;
		$_SESSION['email']=$email;

		echo"
			<html>
				<head>
					<title>Formulário de Mátricula - Endereço</title>
					
					<link REL='SHORTCUT ICON' HREF='icones/favicon.ico'>
					<link REL='STYLESHEET' HREF='CSS/STYLE.CSS' TYPE='TEXT/CSS'/>
					
					<meta charset='ISO-8859-1'>

					<script type='text/javascript' src='Javascript/formatterFields.js'></script>
					<script type='text/javascript' src='Javascript/CEP.js'></script>
					<script type='text/javascript' src='Javascript/checkFields.js'></script>
					<script type='text/javascript' src='Javascript/checkAll_Endereco.js'></script>
				</head>
				
				<body>
					<div class='caixa'>
						<form name='CadastroEndereco' action='index_curso.php' method='POST'>
							
							<!--Aviso a respeito da obrigatoriedade dos campos-->
							
							<p class='obrigatorio'>todos os campos com asterisco (\"*\") são de preenchimento obrigatório</p></br>	

							<p class='separador'>Endereço</p>

							<!--Campo CEP--><!--Não está sendo validado com JS-->
							<label class='formulario'>CEP:<font color='red'>*</font></label><br>
							<input class='entrada'  name='CEP'  id='CEP'  type='text'  value=\"\"  onkeydown='javascript: fMasc( this, mCEP );'   maxlength='10'  onblur='return search_cep(this.value);'/> 
							<p class='ocultos' id='cepI'><b>Infome um CEP válido</b></p>
							</br>

							<!--Campo Rua-->
							<label class='formulario'>Rua:<font color='red'>*</font></label><br>
							<input class='entrada'  type='text'  value=\"\"  name='rua'  id='rua' onblur=\"verify(this.value,'rua','ruaI')\" />
							<p class='ocultos' id='ruaI'><b>Informe o nome da rua</b></p>
							<br>

							<!--Campo bairro-->
							<label class='formulario'>Bairro:<font color='red'>*</font></label></br>
							<input class='entrada'  type='text'  name='bairro'  value=\"\"  id='bairro' onblur=\"verify(this.value,'bairro','bairroI')\" />
							<p class='ocultos' id='bairroI'><b>Informe o nome do bairro</b></p>
							<br>

							<!--Campo Cidade-->
							<label class='formulario'>Cidade:<font color='red'>*</font></label><br>
							<input class='entrada'  type='text'  name='cidade'  value=\"\"  id='cidade' onblur=\"verify(this.value,'cidade','cidadeI')\"/>
							<p class='ocultos' id='cidadeI'><b>Informe o nome da cidade</b></p>
							<br>
							
							<!--Campo Número da Residência-->
							<label class='formulario'>Número da Residência:<font color='red'>*</font></label><br>
							<input class='entrada'  type='number' min='0'  name='numeroResidencia'  value=\"\"  id='numeroResidencia' onblur=\"verify(this.value,'numeroResidencia','numI')\"/>
							<p class='ocultos' id='numI'><b>Informe o número da residência</b></p>
							<br>

							
							<input class='bntEnviar' type='submit' value='Próximo' onclick='return validarEndereco()'/>
							
						</form>
						<br>
					</div>
				</body>
			</html>
		";
	} 
?>