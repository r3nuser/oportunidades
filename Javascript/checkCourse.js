//verify if "selecionar" is selected
function ifIsSelected(value, ID, ocultoID) {
	if (value == "Selecionar") {
		focar(ID);
		habilitar(ocultoID);
	}
	else {
		desabilitar(ocultoID);
	}
}
//Action if "Outra" is selected
function ifOutraIsSelected(value, inputID) {
	if (value == "Outra") {
		habilitarInput(inputID);
	}
	else {
		desabilitarInput(inputID);
	}
}
//Action if "Outro" is selected
function ifOutroIsSelected(value, inputID) {
	if (value == "Outro") {
		habilitarInput(inputID);
	}
	else {
		desabilitarInput(inputID);
	}
}


// makes the input enable
function habilitarInput(ID) {
	document.getElementById(ID).disabled = false;
}
//makes the input disable
function desabilitarInput(ID) {
	document.getElementById(ID).disabled = true;
}