// revalidating everything, one by one, before sending
function validarContato() {
	
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
	}else {
		return true;
	}
}