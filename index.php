<?php

	echo"
		<html>
			<head>
				<title>Formulário de Mátricula - Dados pessoais</title>
				
				<link REL='SHORTCUT ICON' HREF='icones/favicon.ico'>
				<link REL='STYLESHEET' HREF='CSS/STYLE.CSS' TYPE='TEXT/CSS'/>
				
				<meta charset='UTF-8'>

				<script type='text/javascript' src='Javascript/formatterFields.js'></script>
				<script type='text/javascript' src='Javascript/checkFields.js'></script>
				<script type='text/javascript' src='Javascript/checkCPF.js'></script>
				<script type='text/javascript' src='Javascript/checkAll_DadosPessoais.js'></script>
			</head>
			
			<body>
				<div class='caixa'>
					<form name='Cadastro' action='index_contatos.php' method='POST'>
						
						<!--Aviso a respeito da obrigatoriedade dos campos-->
						
						<p class='obrigatorio'>todos os campos com asterisco (\"*\") são de preenchimento obrigatório</p></br>	
						
						<p class='separador'>Dados Pessoais</p>
						
						<!--Campo Nome-->
						<label class='formulario'>Nome Completo: <font color='red'>*</font></label></br>
						<input class='entrada' type='text' name='nome' id='nome'size='30' onblur=\"return verify(this.value,'nome','nomeIncorreto')\"/>
						<p class='ocultos' id='nomeIncorreto'><b>Informe seu nome completo</b></p>
						</br>
						
						<!--Campo Data de nascimento-->
						<label class='formulario'>Data de Nascimento:<font color='red'>*</font></label></br>
						<input class='entrada' type='text' name='data' id='data' onkeydown='javascript: fMasc( this, mData );'  maxlength='10' onblur=\"verify(this.value,'data','dataN')\"/>
						<p class='ocultos' id='dataN'><b>Informe sua data de nascimento</b></p>
						</br>

						<!--Campo CPF-->
						<label class='formulario'>CPF:<font color='red'>*</font></label></br>
						<input class='entrada'  type='text'  name='CPF'  id='cpf'  onkeydown='javascript: fMasc( this, mCPF );'  maxlength='14'  onblur=\"return ValidarCPF(Cadastro.cpf);\"/>
						<p class='ocultos' id='cpfi'><b>Informe um CPF válido</b></p>
						</br>

						
						<br>
						<input class='bntEnviar' type='submit' value='Próximo' onclick='return validarDadosPessoais()'/>
						
					</form>
					<br>
				</div>
			</body>
			
		</html>
	"; 
?>