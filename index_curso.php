<?php
	
	include("conexao.php");
	session_start();

	if(	empty($_POST['CEP']) || 
		empty($_POST['rua']) || 
		empty($_POST['bairro']) || 
		empty($_POST['cidade']) || 
		empty($_POST['numeroResidencia'])){

			echo "<script> alert('Existem campos vazios que precisam ser preenchidos');</script>";
			echo "<script>history.back();</script>";
	}else{

		$CEP = $_POST['CEP'];
		$rua = $_POST['rua'];
		$bairro = $_POST['bairro'];
		$cidade = $_POST['cidade'];
		$numeroResidencia = $_POST['numeroResidencia'];

		$_SESSION['CEP']=$CEP;
		$_SESSION['rua']=$rua;
		$_SESSION['bairro']=$bairro;
		$_SESSION['cidade']=$cidade;
		$_SESSION['numeroResidencia']=$numeroResidencia;

		$con = open_connection();
		
		$sql="SELECT * FROM curso";
		$resultado = mysqli_query($con,$sql) or die("Erro ao retornar dados");

		echo"
			<html>
				<head>
					<title>Formulário de Mátricula - Curso</title>
					
					<link REL='SHORTCUT ICON' HREF='icones/favicon.ico'>
					<link REL='STYLESHEET' HREF='CSS/STYLE.CSS' TYPE='TEXT/CSS'/>
					
					<meta charset='ISO-8859-1'>

					
					<script type='text/javascript' src='Javascript/checkFields.js'></script>
					<script type='text/javascript' src='Javascript/checkAll_Curso.js'></script>
					
				</head>
				
				<body>
					<div class='caixa'>
						<form name='CadastroCurso' action='index_socioeconomico.php' method='POST'>
							
							<!--Aviso a respeito da obrigatoriedade dos campos-->
							
							<p class='obrigatorio'>todos os campos com asterisco (\"*\") são de preenchimento obrigatório</p></br>	

							<p class='separador'>Cursos</p> 
							</br>
							
							<p id='teste' class='formulario'>O candidato opta pelo curso de:<font color='red'>*</font></p></br> 
							<!--<input  class='entrada'  name='curso'  id='curso'  type='text'  size='52'  disabled/>-->
							
							<p class='ocultos' id='cursoI'><b>escolha um dos cursos abaixo</b></p>
							<div>
								<input  id='APN' type='radio'onclick='escolheCurso()' name='escolha' value=\"\" checked/>selecione um dos campos abaixo</br>";

								

								while($registro = mysqli_fetch_array($resultado))
								{
									$nome=  $registro["nome"];
									echo"<input onclick='escolheCurso()' onfocus=\"desabilitar('cursoI');\" type='radio' name='escolha' value='$nome'>".$nome."<br>";
									
								}
					

								close_connection($con);
								
								echo"</br>
							</div>
							</br>
							<input class='bntEnviar' type='submit' value='Próximo' onclick='return validarCurso()'/>
							
						</form>
						<br>
					</div>
				</body>
			</html>
		"; 
}
?>