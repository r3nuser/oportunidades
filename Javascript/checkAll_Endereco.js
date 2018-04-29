// revalidating everything, one by one, before sending
function validarEndereco() {
	
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
	if (document.getElementById("numeroResidencia").value == "") {
		document.getElementById("numeroResidencia").focus();
		alert("Existem campos que precisam de sua atenção");
		return false;
	}else {
		return true;
	}
}