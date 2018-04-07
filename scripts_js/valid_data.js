
//add focus to input
function focar(ID)
{
	document.getElementById(ID).focus();
}
//Show hidden element
function habilitar(ID)
{
	document.getElementById(ID).style.visibility= "visible";
}
// hide element
function desabilitar(ID)
{
	document.getElementById(ID).style.visibility= "hidden";	
}
//Null field verification
function verify(valor,ElementID,errorMessageID)
{
	if(valor=="")
	{
		focar(ElementID);
		habilitar(errorMessageID);
		return 0;
	}
	else
	{
		desabilitar(errorMessageID);
		return 1;
	}
}
//Check if email is valid
function IsEmail(email)
{
	var exclude=/[^@\-\.\w]|^[_@\.\-]|[\._\-]{2}|[@\.]{2}|(@)[^@]*\1/;
	var check=/@[\w\-]+\./;
	var checkend=/\.[a-zA-Z]{2,3}$/;

	if(((email.search(exclude) != -1)||(email.search(check)) == -1)||(email.search(checkend) == -1))
	{
		Cadastro.email.focus();
		document.getElementById("ei").style.visibility = "visible";
		return false;
	}
	
	else 
	{
		document.getElementById("ei").style.visibility = "hidden";
		return true;
	}
}
function ValidarCPF(Objcpf)
{
	var cpf = Objcpf.value;
	
	// Descartando logo de inicio alguns formatos inválidos de cpf 

	if(cpf =="111.111.111-11")
	{
		Cadastro.CPF.focus(); 
		document.getElementById("cpfi").style.visibility = "visible";
		return false;
	}
	if(cpf =="222.222.222-22")
	{
		Cadastro.CPF.focus(); 
		document.getElementById("cpfi").style.visibility = "visible";
		return false;
	}
	if(cpf =="333.333.333-33")
	{
		Cadastro.CPF.focus(); 
		document.getElementById("cpfi").style.visibility = "visible";
		return false;
	}
	if(cpf =="444.444.444-44")
	{
		Cadastro.CPF.focus(); 
		document.getElementById("cpfi").style.visibility = "visible";
		return false;
	}
	if(cpf =="555.555.555-55")
	{
		Cadastro.CPF.focus(); 
		document.getElementById("cpfi").style.visibility = "visible";
		return false;
	}
	if(cpf =="666.666.666-66")
		{
		Cadastro.CPF.focus(); 
		document.getElementById("cpfi").style.visibility = "visible";
		return false;
	}
	if(cpf =="777.777.777-77")
	{
		Cadastro.CPF.focus(); 
		document.getElementById("cpfi").style.visibility = "visible";
		return false;
	}
	if(cpf =="888.888.888-88")
	{
		Cadastro.CPF.focus(); 
		document.getElementById("cpfi").style.visibility = "visible";
		return false;
	}
	if(cpf =="999.999.999-99")
	{
		Cadastro.CPF.focus(); 
		document.getElementById("cpfi").style.visibility = "visible";
		return false;
	}
	if(cpf =="000.000.000-00")
	{
		Cadastro.CPF.focus(); 
		document.getElementById("cpfi").style.visibility = "visible";
		return false;
	}
				
	exp = /\.|\-/g
	cpf = cpf.toString().replace( exp, "" ); 
	var digitoDigitado = eval(cpf.charAt(9)+cpf.charAt(10));
	var soma1=0, soma2=0;
	var vlr =11;

	for(i=0;i<9;i++)
	{
		soma1+=eval(cpf.charAt(i)*(vlr-1));
		soma2+=eval(cpf.charAt(i)*vlr);
		vlr--;
	}
			
	soma1 = (((soma1*10)%11)==10 ? 0:((soma1*10)%11));
	soma2=	(((soma2+(2*soma1))*10)%11);

	var digitoGerado=(soma1*10)+soma2;
	
	if(digitoGerado!=digitoDigitado)
	{	
		Cadastro.CPF.focus(); 
		document.getElementById("cpfi").style.visibility = "visible";
		return false;
	}
	
	else
	{
		document.getElementById("cpfi").style.visibility = "hidden";
		return true;
	}
}
// revalidating everything, one by one, before sending
function validarTudo()
{
	if(document.getElementById("nome").value=="" || document.getElementById("nome").value.length<7)
	{
		document.getElementById("nome").value= "";
		document.getElementById("nome").focus();
		alert("Existem campos que precisam de sua atenção");
		return false;
	}
	if(document.getElementById("data").value=="")
	{
		document.getElementById("data").focus();
		alert("Existem campos que precisam de sua atenção");
		return false;
	}
	if(document.getElementById("cpf").value=="")
	{
		document.getElementById("cpf").focus();
		alert("Existem campos que precisam de sua atenção");
		return false;
	}
	if(document.getElementById("telefone").value=="")
	{
		document.getElementById("telefone").focus();
		alert("Existem campos que precisam de sua atenção");
		return false;
	}
	if(document.getElementById("celular").value=="")
	{
		document.getElementById("celular").focus();
		alert("Existem campos que precisam de sua atenção");
		return false;
	}
	if(document.getElementById("email").value=="")
	{
		document.getElementById("email").focus();
		alert("Existem campos que precisam de sua atenção");
		return false;
	}
	if(document.getElementById("rua").value=="")
	{
		document.getElementById("rua").focus();
		alert("Existem campos que precisam de sua atenção");
		return false;
	}
	if(document.getElementById("bairroI").value=="")
	{
		document.getElementById("bairroI").focus();
		alert("Existem campos que precisam de sua atenção");
		return false;
	}
	if(document.getElementById("cidade").value=="")
	{
		document.getElementById("cidade").focus();
		alert("Existem campos que precisam de sua atenção");
		return false;
	}
	if(document.getElementById("curso").value=="")
	{
		document.getElementById("APN").focus();
		document.getElementById("cursoI").style.visibility="visible";
		alert("Existem campos que precisam de sua atenção");
		return false;
	}
	if(document.getElementById("job").value=="Selecionar")
	{
		document.getElementById("job").focus();
		alert("Existem campos que precisam de sua atenção");
		return false;
	}
	if(document.getElementById("expectativa").value=="Selecionar")
	{
		document.getElementById("expectativa").focus();
		alert("Existem campos que precisam de sua atenção");
		return false;
	}
	if(document.getElementById("expectativa").value=="Outra")
	{
		document.getElementById("ExpectativaInput").disabled= false;
		if(document.getElementById("ExpectativaInput").value=="")
		{
			alert("Existem campos que precisam de sua atenção");
			document.getElementById("ExpectativaInput").disabled= false;
			document.getElementById("ExpectativaInput").focus();
			return false;
		}
	}
	if(document.getElementById("discoveredTheCourse").value=="Selecionar")
	{
		document.getElementById("discoveredTheCourse").focus();
		alert("Existem campos que precisam de sua atenção");
		return false;
	}
	if(document.getElementById("discoveredTheCourse").value=="Outro")
	{
		document.getElementById("discoveredTheCourseInput").disabled= false;
		if(document.getElementById("discoveredTheCourseInput").value=="")
		{
			alert("Existem campos que precisam de sua atenção");
			document.getElementById("discoveredTheCourseInput").disabled= false;
			document.getElementById("discoveredTheCourseInput").focus();
			return false;
		}
	}
	else
	{
		return true;
	}
}

// Select course
function escolheCurso()
{
	var escolha = document.forms[0];
	var i=0;
	var valor="";

	for (i = 0; i < escolha.length; i++) 
	{
		if(escolha[i].checked)
		{
			valor = valor + escolha[i].value +"";
			
		}
	}
	document.getElementById("curso").value= valor;
}
 
//verify if "selecionar" is selected
function ifIsSelected(value,ID,ocultoID)
{
	if(value=="Selecionar")
	{
		focar(ID);
		habilitar(ocultoID);
	}
	else
	{
		desabilitar(ocultoID);
	}
}
//Action if "Outra" is selected
function ifOutraIsSelected(value,inputID)
{
	if(value=="Outra")
	{
		habilitarInput(inputID);
	}
	else
	{
		desabilitarInput(inputID);
	}
}
//Action if "Outro" is selected
function ifOutroIsSelected(value,inputID)
{
	if(value=="Outro")
	{
		habilitarInput(inputID);
	}
	else
	{
		desabilitarInput(inputID);
	}
}


// makes the input enable
function habilitarInput(ID)
{
	document.getElementById(ID).disabled = false;
}
//makes the input disable
function desabilitarInput(ID)
{
	document.getElementById(ID).disabled = true;
}
//Back to the form
function Voltar()
	{
		history.back(1);
	}