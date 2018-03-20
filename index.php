<?php include("conexao.php"); ?>

<html>
<head>
	<link REL="STYLESHEET" HREF="CSS/STYLE.CSS" TYPE="TEXT/CSS"/>
	<meta charset="utf-8">
	<script type="text/javascript" src="scripts_js/cep_modulo.js"></script>
</head>
<body>
	<div>
		<form name="Cadastro" action="cadastrar.php" method="POST">
			
			
			
			<!--Aviso a respeito da obrigatoriedade dos campos-->
			
			<p class="obrigatorio">todos os campos com "*" são obrigatórios</p></br>				
			<!--Campo Nome-->
			
			<label class="formulario">Nome Completo: <font color="red">*</font></label></br>
			<input class="entrada" type="text" name="nome" id="nome" size="30" onblur="return validarNome()"/>
			<p class="ocultos" id="nomeIncorreto">O campo <i>nome</i> é obrigatório</p>
			
			</br>
			
			<!--Campo Telefone-->
			
			<label class="formulario">Telefone:<font color="red">*</font></label></br>
			<input class="entrada" type="text" name="telefone" id="telefone" size="14" maxlength="14" onkeydown="javascript: fMasc( this, mTel );" onblur="return validarTelefone()"/>
			<p class="ocultos" id="tel">O campo <i>telefone</i> é obrigatório</p>
			
			</br>
			
			<!--Campo Celular-->
			
			<label class="formulario">Celular:<font color="red">*</font></label></br>
			<input class="entrada" type="text" name="celular" id="celular" size="14" maxlength="14" onkeydown="javascript: fMasc( this, mTel );" onblur="return validarCelular()"/>
			<p class="ocultos" id="cel">O campo <i>celular</i> é obrigatório</p>
			
			</br>
			
			<!--Campo Data de nascimento-->
			
			<label class="formulario">Data de Nascimento:<font color="red">*</font></label></br>
			<input class="entrada" type="text" name="data" id="data" onkeydown="javascript: fMasc( this, mData );" maxlength="10" onblur="return validarData()" />
			<p class="ocultos" id="dataN">O campo <i>Data de nascimento</i> é obrigatório</p>
			
			</br>
			
			<!--Campo E-mail-->
			
			<label class="formulario">E-mail:<font color="red">*</font></label></br>
			<input class="entrada" type="mail" name="email" id="email" value="" size="25" onblur="return IsEmail(document.getElementById('email').value)"/>
			<p class="ocultos" id="ei"> O campo <i>e-mail</i> é obrigatório</p>
			
			</br>

			<!--Campo CPF-->
			
			<label class="formulario">CPF:<font color="red">*</font></label></br>
			<input class="entrada" type="text" name="CPF" id="cpf" onkeydown="javascript: fMasc( this, mCPF );" maxlength="14" onblur="return ValidarCPF(Cadastro.cpf)"/>
			<p class="ocultos" id="cpfi">O campo <i>CPF</i> é obrigatório</p>
			
			</br>
			
			<!--Campo CEP-->
			
			<label class="formulario">CEP:<font color="red">*</font></label><br>
			<input class="entrada" name="cep" type="text" value="" onkeydown="javascript: fMasc( this, mCEP );"  maxlength="10" onblur="return search_cep(this.value);"/> 
			<p class="ocultos" id="cepI">O campo <i>CEP</i> é obrigatório</p>
			
			</br>
			
			<!--Campo Rua-->
			
			<label class="formulario">Rua:<font color="red">*</font></label><br>
			<input class="entrada" type="text" onblur="return validarRua()" value="" name="rua" id="rua">
			<p class="ocultos" id="ruaI">O campo <i>Rua</i> é obrigatório</p>
			
			<br>
			
			<!--Campo bairro-->
			
			<label class="formulario">Bairro:<font color="red">*</font></label></br>
			<input class="entrada" type="text" onblur="return validarBairro()" name="bairro" value="" id="bairro">
			<p class="ocultos" id="bairroI">O campo <i>Bairro</i> é obrigatório</p>
			
			<br>
			
			<!--Campo Cidade-->
			
			<label class="formulario">Cidade:<font color="red">*</font></label><br>
			<input class="entrada" type="text" onblur="return validarCidade()" name="cidade" value="" id="cidade">
			<p class="ocultos" id="cidadeI">O campo <i>Cidade</i> é obrigatório</p>
			
			<br>
					
		</form>
		<input type="submit" value="Enviar" onclick="return validarAPorraToda()"/>
	</div>
	
<body>
</html>
