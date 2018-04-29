<?php
	include("conexao.php");
	include("returnID.php");
	session_start();

	if(empty($_POST['nome']) || empty($_POST['data']) ||  empty($_POST['CPF'])){

		echo "<script> alert('Existem campos vazios que precisam ser preenchidos');</script>";
		echo "<script>history.back();</script>";
	
	}else{

	$con = open_connection();
	
	$nome = $_POST['nome'];
	$data = $_POST['data'];
	$CPF = $_POST['CPF'];
	


		// convert date format to know the age of the candidate

		$BrazilianDateTimeFormat = DateTime::createFromFormat('d/m/Y', $data);
		$AmericanDateTimeFormat = $BrazilianDateTimeFormat->format('Y-m-d');
		
		// getting current date time
		$ano=date("Y")-16;
		$dia=date("d");
		$mes=date("m");
		
		// cheching the date time
		function ValidaData($dat){
			$data = explode("/","$dat"); 
			$d = $data[0];
			$m = $data[1];
			$y = $data[2];
		
			$res = checkdate($m,$d,$y);
			if ($res == 1){
			return true;
			} else {
			return false;
			}
		}


		$Menor16=false;
		$MaisDe100=false;
		$DataIncorreta=false;

		if(strtotime($AmericanDateTimeFormat)> strtotime(''.$ano.'-'.$mes.'-'.$dia.'')){	
			$Menor16 = true;
		}
		if(strtotime($AmericanDateTimeFormat) < strtotime('1918-'.$mes.'-'.$dia.'')){
			$MaisDe100=true;
		}
		if(!ValidaData($data)){
			$DataIncorreta=true;
		}

		if($Menor16==true||$MaisDe100==true||$DataIncorreta==true)
		{
			echo "<script> alert('A idade minima para se inscrever é de 16 anos');</script>";
			echo "<script>history.back();</script>";
		}
		else{
		
			if(returnCPF($CPF,$con))
			{
				echo "<script> alert('O CPF $CPF já está cadastrado');</script>";
				close_connection($con);
				echo "<script>history.back();</script>";
			}
		
			close_connection($con);

			// putting data into a session
			$_SESSION['nome']=$nome;
			$_SESSION['data']=$AmericanDateTimeFormat;
			$_SESSION['CPF']=$CPF;
			$_SESSION['BrazilianDateTimeFormat'] = $data;

		echo"
			<html>
				<head>
					<title>Formulário de Mátricula - Contato</title>
					
					<link REL='SHORTCUT ICON' HREF='icones/favicon.ico'>
					<link REL='STYLESHEET' HREF='CSS/STYLE.CSS' TYPE='TEXT/CSS'/>
					
					<meta charset='ISO-8859-1'>

					<script type='text/javascript' src='Javascript/formatterFields.js'></script>
					<script type='text/javascript' src='Javascript/CEP.js'></script>
					<script type='text/javascript' src='Javascript/checkFields.js'></script>
					<script type='text/javascript' src='Javascript/checkEmail.js'></script>
					<script type='text/javascript' src='Javascript/checkAll_Contatos.js'></script>
				</head>
				
				<body>
					<div class='caixa'>
						<form name='CadastroContatos' action='index_endereco.php' method='POST'>
							
							<!--Aviso a respeito da obrigatoriedade dos campos-->
							
							<p class='obrigatorio'>todos os campos com asterisco (\"*\") são de preenchimento obrigatório</p></br>	

							<p class='separador'>Contato</p>

							<!--Campo Telefone1-->
							<label class='formulario'>Telefone/Celular 01:<font color='red'>*</font></label></br>
							<input class='entrada'  type='text'  name='telefone'  id='telefone'  size='14'  maxlength='14'  onkeydown='javascript: fMasc( this, mTel );'  onblur=\"verify(this.value,'telefone','tel')\"/>
							<p class='ocultos' id='tel'><b>Infome um número de contato</b></p>
							</br>

							<!--Campo Telefone2-->
							<label class='formulario'>Telefone/Celular 02:<font color='red'>*</font></label></br>
							<input class='entrada'  type='text'  name='celular'  id='celular'  size='14'  maxlength='14'  onkeydown='javascript: fMasc( this, mTel );'  onblur=\"verify(this.value,'celular','cel')\"/>
							<p class='ocultos' id='cel'><b>Infome um número de contato</b></p>
							</br>

							<!--Campo E-mail-->
							<label class='formulario'>E-mail:<font color='red'>*</font></label></br>
							<input class='entrada' 	 type='mail' name='email'  id='email'  value=\"\"  size='25'  onblur='return IsEmail(this.value)'/>
							<p class='ocultos' id='ei'><b> Informe um endereço de e-mail válido</b></p>
							</br>
							</br>
							<input class='bntEnviar' type='submit' value='Próximo' onclick='return validarContato()'/>
						</form>
						<br>
					</div>
				</body>
			</html>
		"; 
	}
}
?>