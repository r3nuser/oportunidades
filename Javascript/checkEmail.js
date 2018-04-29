//Check if email is valid
function IsEmail(email) {
	var exclude = /[^@\-\.\w]|^[_@\.\-]|[\._\-]{2}|[@\.]{2}|(@)[^@]*\1/;
	var check = /@[\w\-]+\./;
	var checkend = /\.[a-zA-Z]{2,3}$/;

	if (((email.search(exclude) != -1) || (email.search(check)) == -1) || (email.search(checkend) == -1)) {
		CadastroContatos.email.focus();
		document.getElementById("ei").style.visibility = "visible";
		return false;
	}

	else {
		document.getElementById("ei").style.visibility = "hidden";
		return true;
	}
}