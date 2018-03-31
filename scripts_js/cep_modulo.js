// CLEANING ELEMENTS
function clear_data(){
	document.getElementById("rua").value="";
	document.getElementById("bairro").value="";
	document.getElementById("cidade").value="";
}
// CALLBACK WITH CONTENT
function my_callback(content){
	if(!("erro" in content)){
		document.getElementById("rua").value=(content.logradouro);
		document.getElementById("bairro").value=(content.bairro);
		document.getElementById("cidade").value=(content.localidade);
		document.getElementById("cepI").style.visibility = "hidden";
		document.getElementById("ruaI").style.visibility="hidden";	
		document.getElementById("bairroI").style.visibility="hidden";
		document.getElementById("cidadeI").style.visibility="hidden";


		
	}else{
		clear_data();
		alert("CEP não encontrado !");
		
	}
}
// SEARCHING CEP USING ViaCEP
function search_cep(value){
	//New var only digits
	var cep = value.replace(/\D/g, '');
	//Verifies if the cep have anything
	if(cep!="")
	{
		// regular expression for validate CEP
		var validacep = /^[0-9]{8}$/;
		if(validacep.test(cep)){
			//FILL IT ELEMENTS WHILE YOU CONSULT THE WEB SERVICE
			document.getElementById("rua").value="...";
			document.getElementById("bairro").value="...";
			document.getElementById("cidade").value="...";
			//CREATE A ELEMENT AND SYNC ViaCEP WITH THE CALLBACK 
			var script = document.createElement("script");
			script.src= "https://viacep.com.br/ws/"+cep+"/json/?callback=my_callback";
			document.body.appendChild(script);
			
		}else{
			//INVALID CEP
			
			
			clear_data();
			
		}
	}
	
	
}


//Fazendo a verificação se os campos estão vazios
function focar(ID)
{
	document.getElementById(ID).focus();
}

function habilitar(ID)
{
	document.getElementById(ID).style.visibility= "visible";
}

function desabilitar(ID)
{
	document.getElementById(ID).style.visibility= "hidden";	
}

function verify(valor,ElementID,errorMessageID)
{
	

	if(valor =="")
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

//####################################################################################################



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
// revalidando tudo antes de enviar
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
	if(document.getElementById("selecao").value=="Selecionar")
	{
		document.getElementById("selecao").focus();
		alert("Existem campos que precisam de sua atenção");
		return false;
	}
	
	if(document.getElementById("selecao2").value=="Selecionar")
	{
		document.getElementById("selecao2").focus();
		alert("Existem campos que precisam de sua atenção");
		return false;
	}
	if(document.getElementById("selecao2").value=="Outra")
	{
		if(document.getElementById("qual").value=="")
		{
			alert("Existem campos que precisam de sua atenção");
			document.getElementById("qual").disabled= false;
			document.getElementById("qual").focus();
			return false;
		}
	}
	if(document.getElementById("selecao3").value=="Selecionar")
	{
		document.getElementById("selecao3").focus();
		alert("Existem campos que precisam de sua atenção");
		return false;
	}
	if(document.getElementById("selecao3").value=="Outro")
	{
		if(document.getElementById("qual2").value=="")
		{
			alert("Existem campos que precisam de sua atenção");
			document.getElementById("qual2").disabled= false;
			document.getElementById("qual2").focus();
			return false;
		}
	}
	else
	{
		return true;
	}
}	
// Adicionando  Mascaras aos campos 

function fMasc(objeto,mascara) 
{
	obj=objeto
	masc=mascara
	setTimeout("fMascEx()",1)
}
function fMascEx() 
{
		obj.value=masc(obj.value)
}
function mTel(tel)
{
	
	tel=tel.replace(/\D/g,"")
	tel=tel.replace(/^(\d)/,"($1")
	tel=tel.replace(/(.{3})(\d)/,"$1)$2")
	
	if(tel.length == 9)
	{
		tel=tel.replace(/(.{1})$/,"-$1")
	} 
	else if (tel.length == 10) 
	{
		tel=tel.replace(/(.{2})$/,"-$1")
	} 
	else if (tel.length == 11)
	{
		tel=tel.replace(/(.{3})$/,"-$1")
	} 
	else if (tel.length == 12)
	{
		tel=tel.replace(/(.{4})$/,"-$1")
	} 
	else if (tel.length > 12) 
	{
		tel=tel.replace(/(.{4})$/,"-$1")
	}
	return tel;
}
function mCNPJ(cnpj)
{
	cnpj=cnpj.replace(/\D/g,"")
	cnpj=cnpj.replace(/^(\d{2})(\d)/,"$1.$2")
	cnpj=cnpj.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3")
	cnpj=cnpj.replace(/\.(\d{3})(\d)/,".$1/$2")
	cnpj=cnpj.replace(/(\d{4})(\d)/,"$1-$2")
	return cnpj
}
function mCPF(cpf)
{
	cpf=cpf.replace(/\D/g,"")
	cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
	cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
	cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
	return cpf
}
function mCEP(cep)
{
	cep=cep.replace(/\D/g,"")
	cep=cep.replace(/^(\d{2})(\d)/,"$1.$2")
	cep=cep.replace(/\.(\d{3})(\d)/,".$1-$2")
	return cep
}
function mData(data)
{
	data=data.replace(/\D/g,"")
	data=data.replace(/(\d{2})(\d)/,"$1/$2")
	data=data.replace(/(\d{2})(\d)/,"$1/$2")
	return data
}

function ecolheCurso()
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


//#######################################


function habilitarInput(ID)
{
	document.getElementById(ID).disabled = false;
}
function desabilitarInput(ID)
{
	document.getElementById(ID).disabled = true;
}

function verificarSelect(value,inputID)
{
	if(value=="Outra"|| value=="Outro")
	{
		habilitarInput(inputID);
	}
	else
	{
		desabilitarInput(inputID);
	}
}