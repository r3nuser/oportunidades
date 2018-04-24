
//add focus to input
function focar(ID) {
	document.getElementById(ID).focus();
}
//Show hidden element
function habilitar(ID) {
	document.getElementById(ID).style.visibility = "visible";
}
// hide element
function desabilitar(ID) {
	document.getElementById(ID).style.visibility = "hidden";
}
//Null field verification
function verify(valor, ElementID, errorMessageID) {
	if (valor == "") {
		focar(ElementID);
		habilitar(errorMessageID);
		return 0;
	}
	else {
		desabilitar(errorMessageID);
		return 1;
	}
}

function courseUnchecked()
{
	if(document.getElementById("APN").checked)
	{
		focar("APN");
		habilitar("cursoI");
	}
	else{
		desabilitar("cursoI");
	}
}


// Select course
function escolheCurso() {
	var escolha = document.forms[0];
	var i = 0;
	var valor = "";

	for (i = 0; i < escolha.length; i++) {
		if (escolha[i].checked) {
			valor = valor + escolha[i].value;

		}
	}
	//document.getElementById("curso").value = valor;
	document.getElementById("teste").innerHTML = "O candidato opta pelo curso de: " + valor+"<font color='red'>*</font>"

}


//Back to the form
function Voltar() {
	history.back(1);
}