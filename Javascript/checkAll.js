// revalidating everything, one by one, before sending
function validarTudo() {
	
	
	
	if (document.getElementById("nome").value == "" || document.getElementById("nome").value.length < 7) {
		document.getElementById("nome").value = "";
		document.getElementById("nome").focus();
		alert("Existem campos que precisam de sua atenção");
		return false;
	}
	if (document.getElementById("data").value == "") {
		document.getElementById("data").focus();
		alert("Existem campos que precisam de sua atenção");
		return false;
	}
	if (document.getElementById("cpf").value == "") {
		document.getElementById("cpf").focus();
		alert("Existem campos que precisam de sua atenção");
		return false;
	}
	if(ValidarCPF(Cadastro.cpf)==false)
	{
		document.getElementById("cpf").focus();
		alert("Existem campos que precisam de sua atenção");
		return false;
	}



	if (document.getElementById("telefone").value == "") {
		document.getElementById("telefone").focus();
		alert("Existem campos que precisam de sua atenção");
		return false;
	}
	if (document.getElementById("celular").value == "") {
		document.getElementById("celular").focus();
		alert("Existem campos que precisam de sua atenção");
		return false;
	}
	if (document.getElementById("email").value == "") {
		document.getElementById("email").focus();
		alert("Existem campos que precisam de sua atenção");
		return false;
	}
	if(IsEmail(document.getElementById("email").value)==false)
	{
		document.getElementById("email").focus();
		alert("Existem campos que precisam de sua atenção");
		return false;	
	}
	if (document.getElementById("rua").value == "") {
		document.getElementById("rua").focus();
		alert("Existem campos que precisam de sua atenção");
		return false;
	}
	if (document.getElementById("bairroI").value == "") {
		document.getElementById("bairroI").focus();
		alert("Existem campos que precisam de sua atenção");
		return false;
	}
	if (document.getElementById("cidade").value == "") {
		document.getElementById("cidade").focus();
		alert("Existem campos que precisam de sua atenção");
		return false;
	}
	if (document.getElementById("APN").checked) {
		document.getElementById("APN").focus();
		document.getElementById("cursoI").style.visibility = "visible";
		alert("Existem campos que precisam de sua atenção");
		return false;
	}
	if (document.getElementById("job").value == "Selecionar") {
		document.getElementById("job").focus();
		alert("Existem campos que precisam de sua atenção");
		return false;
	}
	if (document.getElementById("expectativa").value == "Selecionar") {
		document.getElementById("expectativa").focus();
		alert("Existem campos que precisam de sua atenção");
		return false;
	}
	if (document.getElementById("expectativa").value == "Outra") {
		document.getElementById("ExpectativaInput").disabled = false;
		if (document.getElementById("ExpectativaInput").value == "") {
			alert("Existem campos que precisam de sua atenção");
			document.getElementById("ExpectativaInput").disabled = false;
			document.getElementById("ExpectativaInput").focus();
			return false;
		}
	}
	if (document.getElementById("discoveredTheCourse").value == "Selecionar") {
		document.getElementById("discoveredTheCourse").focus();
		alert("Existem campos que precisam de sua atenção");
		return false;
	}
	if (document.getElementById("discoveredTheCourse").value == "Outro") {
		document.getElementById("discoveredTheCourseInput").disabled = false;
		if (document.getElementById("discoveredTheCourseInput").value == "") {
			alert("Existem campos que precisam de sua atenção");
			document.getElementById("discoveredTheCourseInput").disabled = false;
			document.getElementById("discoveredTheCourseInput").focus();
			return false;
		}
	}
	else {
		return true;
	}
}