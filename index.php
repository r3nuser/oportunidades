<?php include("conexao.php"); ?>

<html>
<head>
	<link REL="STYLESHEET" HREF="CSS/STYLE.CSS" TYPE="TEXT/CSS"/>
	<meta charset="utf-8">
	<script type="text/javascript" src="scripts_js/cep_modulo.js"></script>
</head>
<body>
	<div>
		<form name="Cadastro" action="ValidarComPHP.php" method="POST">
			
			
			
			<!--Aviso a respeito da obrigatoriedade dos campos-->
			
			<p class="obrigatorio">todos os campos com "*" são obrigatórios</p></br>				
			
			
			<p class="separador">Dados Pessoais</p>
			
			<!--Campo Nome-->

			<label class="formulario">Nome Completo: <font color="red">*</font></label></br>
			<input class="entrada" type="text" name="nome" id="nome" size="30" onblur="return validarNome()"/>
			<p class="ocultos" id="nomeIncorreto">Informe seu nome completo</p>
			
			
			</br>
			
			<!--Campo Data de nascimento-->
			
			<label class="formulario">Data de Nascimento:<font color="red">*</font></label></br>
			<input class="entrada" type="text" name="data" id="data" onkeydown="javascript: fMasc( this, mData );" maxlength="10" onblur="return validarData()" />
			<p class="ocultos" id="dataN">Informe sua data de nascimento</p>
			
			</br>
			
			<!--Campo CPF-->
			
			<label class="formulario">CPF:<font color="red">*</font></label></br>
			<input class="entrada" type="text" name="CPF" id="cpf" onkeydown="javascript: fMasc( this, mCPF );" maxlength="14" onblur="return ValidarCPF(Cadastro.cpf)"/>
			<p class="ocultos" id="cpfi">Informe seu CPF</p>
			
			</br>
			
			<p class="separador">Contato</p>
			<!--Campo Telefone-->
			
			<label class="formulario">Telefone/Celular 01:<font color="red">*</font></label></br>
			<input class="entrada" type="text" name="telefone" id="telefone" size="14" maxlength="14" onkeydown="javascript: fMasc( this, mTel );" onblur="return validarTelefone()"/>
			<p class="ocultos" id="tel">Infome um número de contato</p>
			
			</br>
			
			<!--Campo Celular-->
			
			<label class="formulario">Telefone/Celular 02:<font color="red">*</font></label></br>
			<input class="entrada" type="text" name="celular" id="celular" size="14" maxlength="14" onkeydown="javascript: fMasc( this, mTel );" onblur="return validarCelular()"/>
			<p class="ocultos" id="cel">Infome um número de contato</p>
			
			</br>
			
			
			
			<!--Campo E-mail-->
			
			<label class="formulario">E-mail:<font color="red">*</font></label></br>
			<input class="entrada" type="mail" name="email" id="email" value="" size="25" onblur="return IsEmail(document.getElementById('email').value)"/>
			<p class="ocultos" id="ei"> Informe um endereço de e-mail válido</p>
			
			</br>

			<p class="separador">Endereço</p>
			
			<!--Campo CEP-->
			
			<label class="formulario">CEP:<font color="red">*</font></label><br>
			<input class="entrada" name="CEP" id="CEP" type="text" value="" onkeydown="javascript: fMasc( this, mCEP );"  maxlength="10" onblur="return search_cep(this.value);"/> 
			<p class="ocultos" id="cepI">Infome um CEP válido</p>
			
			</br>
			
			<!--Campo Rua-->
		
			<label class="formulario">Rua:<font color="red">*</font></label><br>
			<input class="entrada" type="text" onblur="return validarRua()" value="" name="rua" id="rua">
			<p class="ocultos" id="ruaI">Informe o nome da rua</p>
			
			<br>
			
			<!--Campo bairro-->
			
			<label class="formulario">Bairro:<font color="red">*</font></label></br>
			<input class="entrada" type="text" onblur="return validarBairro()" name="bairro" value="" id="bairro">
			<p class="ocultos" id="bairroI">Informe o nome do bairro</p>
			
			<br>
			
			<!--Campo Cidade-->
			
			<label class="formulario">Cidade:<font color="red">*</font></label><br>
			<input class="entrada" type="text" onblur="return validarCidade()" name="cidade" value="" id="cidade">
			<p class="ocultos" id="cidadeI">Informe o nome da cidade</p>
			
			<br>
			
			<p class="separador">Cursos</p> </br>
			<label class="formulario">O candidato opta pelo curso de:</label> <input class="entrada" name="curso" id="curso" type="text" size="52" disabled/><font color="red">*</font></br>
			<p class="ocultos" id="cursoI">escolha um dos cursos abaixo</p>
			
			<div>
				<input  onclick="ecolheCurso()" type="radio" name="escolha" value="Auxiliar de pequenos negócios"/>Auxiliar de pequenos negócios</br>
				<input  onclick="ecolheCurso()" type="radio" name="escolha" value="Auxiliar de Departamento pessoal"/>Auxiliar de Departamento pessoal</br>
				<input  onclick="ecolheCurso()" type="radio" name="escolha" value="Balconista de Farmácia"/>Balconista de Farmácia</br>
				<input  onclick="ecolheCurso()" type="radio" name="escolha" value="Berçarista"/>Berçarista</br>
				<input  onclick="ecolheCurso()" type="radio" name="escolha" value="Como Organizar seu Evento"/>Como Organizar seu Evento</br>
				<input  onclick="ecolheCurso()" type="radio" name="escolha" value="Cuidador Infantil"/>Cuidador Infantil</br>
				<input  onclick="ecolheCurso()" type="radio" name="escolha" value="Excel Avançado"/>Excel Avançado</br>
				<input  onclick="ecolheCurso()" type="radio" name="escolha" value="Gestão de Rotinas Administrativas"/>Gestão de Rotinas Administrativas</br>
				<input  onclick="ecolheCurso()" type="radio" name="escolha" value="Gestão Financeiras de Empresa pequena e Médias Empresas"/>Gestão Financeiras de Empresa pequena e Médias Empresas</br>
				<input  onclick="ecolheCurso()" type="radio" name="escolha" value="Informática Básica"/>Informática Básica        </br>
				<input  onclick="ecolheCurso()" type="radio" name="escolha" value="Informática para Concursos"/>Informática para Concursos</br>
				<input  onclick="ecolheCurso()" type="radio" name="escolha" value="Informática para Educadres"/>Informática para Educadres</br>
				<input  onclick="ecolheCurso()" type="radio" name="escolha" value="Informática Avançada"/>Informática Avançada      </br>
				<input  onclick="ecolheCurso()" type="radio" name="escolha" value="Inglês Básico"/>Inglês Básico</br>
				<input  onclick="ecolheCurso()" type="radio" name="escolha" value="Introdução à Nova Legislação Trabalhista"/>Introdução à Nova Legislação Trabalhista</br>		
				<input  onclick="ecolheCurso()" type="radio" name="escolha" value="Logística"/>Logística</br>
				<input  onclick="ecolheCurso()" type="radio" name="escolha" value="Operador de Caixa"/>Operador de Caixa</br>
				<input  onclick="ecolheCurso()" type="radio" name="escolha" value="Rede de Computadores"/>Rede de Computadores</br>
				<input  onclick="ecolheCurso()" type="radio" name="escolha" value="Secretaria Escolar"/>Secretaria Escolar</br>		
				<input  onclick="ecolheCurso()" type="radio" name="escolha" value="Segurança na Internet"/>Segurança na Internet</br>
				</br>
			</div>
				
				</br>

				<p class="separador">Informações Socioeconômicas</p>

				<label class="formulario">Você está trabalhando atualmente?</label><font color="red">*</font>
					</br>
					<select class="entrada" name="selecao" id="selecao" onfocus=" return validaCurso()" onblur="return seleciona()">
						<option class="font14">Selecionar</option>
						<option class="font14">Sim</option>
						<option class="font14">Não</option>
					</select>
				<p id="trabalho" class="ocultos">Selecione uma das opções</p>
			
				<label class="formulario">Qual a sua expectativa sobre o curso?</label><font color="red">*</font>
					</br>
					<select onclick="return selecionaOutra()" onblur="return selecionaExpec()" class="entrada" name="selecao2" id="selecao2" >
						<option class="font14">selecionar</option>
						<option class="font14">Conseguir um emprego</option>
						<option class="font14">Agregar conhecimento</option>
						<option class="font14">Gerara renda com um empreendimento próprio</option>
						<option class="font14">Outra</option>
					</select>
					<br>
					<p id="trabalho2" class="ocultos">Selecione uma das opções</p>
					<br>
					
					<p name="p"class="ocultos" id="texto">
						<label class="formulario">
							<font color="black"> Qual? </font>
						</label>
						<textarea name="qual" id="qual" onblur="return OutraIsselected()" value="" cols="20" rows="5" class="area"></textarea>
						<p id="expectativa" class="ocultos">Informe sua expectativa com o curso</p>
					</p>
					
					<label class="formulario">Como você ficou sabendo dos cursos presenciais do projeto oportunidades?</label>
						</br>
						<select onclick="return selecionaOutro()" onblur="selecionaConhece()"class="entrada" name="selecao3" id="selecao3" >
							<option class="font14">selecionar</option>
							<option class="font14">Divulgação na TV</option>
							<option class="font14">Noticiários em Jornais</option>
							<option class="font14">Internet</option>
							<option class="font14">Por meio de amigos</option>
							<option class="font14">Outros</option>
						</select>
						<br>
						<p id="conheceu" class="ocultos">Selecione uma das opções</p>
						<br>

					
					<p class="ocultos" id="texto2">
						<label class="formulario">
							<font color="black"> Qual? </font>
						</label>							
						<textarea name="qual2" id="qual2" onblur="return outroSelecionado()" value="" cols="20" rows="5" class="area"></textarea>
						<p id="soube" class="ocultos">Informe como conheceu o curso</p>
					</p>
			<input type="submit" value="Enviar" onclick="return validarTudo()"/>
		</form>
		<br>
		
	</div>
</body>
</html>
