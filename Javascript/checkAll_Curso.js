// revalidating everything, one by one, before sending
function validarCurso() {
	if (document.getElementById("APN").checked) {
		document.getElementById("APN").focus();
		document.getElementById("cursoI").style.visibility = "visible";
		alert("Existem campos que precisam de sua atenção");
		return false;
	}else {
		return true;
	}
}