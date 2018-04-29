// revalidating everything, one by one, before sending
function validarSocio() {
	
	
	
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
	}else {
		return true;
	}
}