function ValidarCPF(Objcpf) {
	var cpf = Objcpf.value;

	// Descartando logo de inicio alguns formatos inválidos de cpf 

	if (cpf == "111.111.111-11") {
		// Cadastro.CPF.focus();
		document.getElementById("cpfi").style.visibility = "visible";
		return false;
	}
	if (cpf == "222.222.222-22") {
		// Cadastro.CPF.focus();
		document.getElementById("cpfi").style.visibility = "visible";
		return false;
	}
	if (cpf == "333.333.333-33") {
		// Cadastro.CPF.focus();
		document.getElementById("cpfi").style.visibility = "visible";
		return false;
	}
	if (cpf == "444.444.444-44") {
		// Cadastro.CPF.focus();
		document.getElementById("cpfi").style.visibility = "visible";
		return false;
	}
	if (cpf == "555.555.555-55") {
		// Cadastro.CPF.focus();
		document.getElementById("cpfi").style.visibility = "visible";
		return false;
	}
	if (cpf == "666.666.666-66") {
		// Cadastro.CPF.focus();
		document.getElementById("cpfi").style.visibility = "visible";
		return false;
	}
	if (cpf == "777.777.777-77") {
		// Cadastro.CPF.focus();
		document.getElementById("cpfi").style.visibility = "visible";
		return false;
	}
	if (cpf == "888.888.888-88") {
		// Cadastro.CPF.focus();
		document.getElementById("cpfi").style.visibility = "visible";
		return false;
	}
	if (cpf == "999.999.999-99") {
		// Cadastro.CPF.focus();
		document.getElementById("cpfi").style.visibility = "visible";
		return false;
	}
	if (cpf == "000.000.000-00") {
		// Cadastro.CPF.focus();
		document.getElementById("cpfi").style.visibility = "visible";
		return false;
	}

	exp = /\.|\-/g
	cpf = cpf.toString().replace(exp, "");
	var digitoDigitado = eval(cpf.charAt(9) + cpf.charAt(10));
	var soma1 = 0, soma2 = 0;
	var vlr = 11;

	for (i = 0; i < 9; i++) {
		soma1 += eval(cpf.charAt(i) * (vlr - 1));
		soma2 += eval(cpf.charAt(i) * vlr);
		vlr--;
	}

	soma1 = (((soma1 * 10) % 11) == 10 ? 0 : ((soma1 * 10) % 11));
	soma2 = (((soma2 + (2 * soma1)) * 10) % 11);

	var digitoGerado = (soma1 * 10) + soma2;

	if (digitoGerado != digitoDigitado) {
		// Cadastro.CPF.focus();
		document.getElementById("cpfi").style.visibility = "visible";
		return false;
	}

	else {
		document.getElementById("cpfi").style.visibility = "hidden";
		return true;
	}
}