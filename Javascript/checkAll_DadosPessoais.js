// revalidating everything, one by one, before sending
function validarDadosPessoais() {
	
	
	
	if (document.getElementById("nome").value == "" || document.getElementById("nome").value.length <= 7) {
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
		document.getElementById("cpf").value = "";
		document.getElementById("cpf").focus();
		alert("Existem campos que precisam de sua atenção");
		return false;
	}
	else {
		return true;
	}
}