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
			
			<label class="formulario">Cursos:<font color="red">*</font></label> <br>
			<p class="ocultos" id="cursoI">escolha um dos cursos abaixo</p>
			<div>
				<input onclick="ecolheCurso()" type="radio" name="escolha" value="Auxiliar de pequenos negócios"/>Auxiliar de pequenos negócios</br>
				<input onclick="ecolheCurso()" type="radio" name="escolha" value="Auxiliar de Departamento pessoal"/>Auxiliar de Departamento pessoal</br>
				<input onclick="ecolheCurso()" type="radio" name="escolha" value="Balconista de Farmácia"/>Balconista de Farmácia</br>
				<input onclick="ecolheCurso()" type="radio" name="escolha" value="Berçarista"/>Berçarista</br>
				<input onclick="ecolheCurso()" type="radio" name="escolha" value="Como Organizar seu Evento"/>Como Organizar seu Evento</br>
				<input onclick="ecolheCurso()" type="radio" name="escolha" value="Cuidador Infantil"/>Cuidador Infantil</br>
				<input onclick="ecolheCurso()" type="radio" name="escolha" value="Excel Avançado"/>Excel Avançado</br>
				<input onclick="ecolheCurso()" type="radio" name="escolha" value="Gestão de Rotinas Administrativas"/>Gestão de Rotinas Administrativas</br>
				<input onclick="ecolheCurso()" type="radio" name="escolha" value="Gestão Financeiras de Empresa pequena e Médias Empresas"/>Gestão Financeiras de Empresa pequena e Médias Empresas</br>
				<input onclick="ecolheCurso()" type="radio" name="escolha" value="Informática Básica"/>Informática Básica        </br>
				<input onclick="ecolheCurso()" type="radio" name="escolha" value="Informática para Concursos"/>Informática para Concursos</br>
				<input onclick="ecolheCurso()" type="radio" name="escolha" value="Informática para Educadres"/>Informática para Educadres</br>
				<input onclick="ecolheCurso()" type="radio" name="escolha" value="Informática Avançada"/>Informática Avançada      </br>
				<input onclick="ecolheCurso()" type="radio" name="escolha" value="Inglês Básico"/>Inglês Básico</br>
				<input onclick="ecolheCurso()" type="radio" name="escolha" value="Introdução à Nova Legislação Trabalhista"/>Introdução à Nova Legislação Trabalhista</br>		
				<input onclick="ecolheCurso()" type="radio" name="escolha" value="Logística"/>Logística</br>
				<input onclick="ecolheCurso()" type="radio" name="escolha" value="Operador de Caixa"/>Operador de Caixa</br>
				<input onclick="ecolheCurso()" type="radio" name="escolha" value="Rede de Computadores"/>Rede de Computadores</br>
				<input onclick="ecolheCurso()" type="radio" name="escolha" value="Secretaria Escolar"/>Secretaria Escolar</br>		
				<input onclick="ecolheCurso()" type="radio" name="escolha" value="Segurança na Internet"/>Segurança na Internet</br>
				</br>
				<label class="formulario">Curso escolhido:</label></br>
				<input class="entrada" id="curso" type="text" size="52" disabled>

				
			</div>
				
				<input class="entrada" type="text" onfocus=" return validaCurso()">
			

		</form>
		<input type="submit" value="Enviar" onclick="return validarTudo()"/>
	</div>
</body>
</html>
