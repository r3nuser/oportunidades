<?php include("conexao.php"); ?>
<html>
<head>
	<style rel="stylesheet" href="styles.css"></style>
	<meta charset="utf-8">
	<script type="text/javascript" src="scripts_js/cep_modulo.js"></script>
</head>
<body>
	<div>
		<form>
			<label>Nome: <input type="text" value=""></label><br>
			<label>Telefone: <input type="text" value=""></label><br>
			<label>E-mail: <input type="text" value=""></label><br>
			<label>CEP: <input type="text" value="" maxlength="10" onblur="search_cep(this.value);"></label><br>
			<label>Rua: <input type="text" value="" id="rua"></label><br>
			<label>Bairro: <input type="text" value="" id="bairro"></label><br>
			<label>Cidade: <input type="text" value="" id="cidade"></label><br>
		</form>
	</div>
	
<body>
</html>
