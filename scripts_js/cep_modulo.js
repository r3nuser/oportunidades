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



function validarNome()
{
	var nome= Cadastro.nome.value;

	if(nome =="" || nome.length<14)
	{
		Cadastro.nome.focus();
		document.getElementById("nomeIncorreto").style.visibility = "visible";
		return false;
	} 
	
	else
	{
		document.getElementById("nomeIncorreto").style.visibility = "hidden";
		return true;
	}
}

function validarTelefone()
{
	var tel= Cadastro.telefone.value;
	
	if(tel =="")
	{
	
		Cadastro.telefone.focus();
		document.getElementById("tel").style.visibility = "visible";
		return false;
		
	}
	
	else
	{
	
		document.getElementById("tel").style.visibility = "hidden";
		return true;
	}
}
function validarCelular()
{
	var cel= Cadastro.celular.value;
	
	if(cel =="")
	{
		Cadastro.celular.focus();
		document.getElementById("cel").style.visibility = "visible";
		return false;
	}
	
	else
	{
		document.getElementById("cel").style.visibility = "hidden";
		return true;
	}
}
function validarData()
{
	var data= Cadastro.data.value;
	
	if(data =="")
	{
		
		Cadastro.data.focus();
		document.getElementById("dataN").style.visibility = "visible";
		return false;
	}
	
	else
	{	
		document.getElementById("dataN").style.visibility = "hidden";
		return true;
	}
}
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

function validarRua()
{
	var rua= Cadastro.rua.value;
	
	if(rua =="")
	{
	
		Cadastro.rua.focus();
		document.getElementById("ruaI").style.visibility = "visible";
		return false;
		
	}
	
	else
	{
	
		document.getElementById("ruaI").style.visibility = "hidden";
		return true;
	}
}
function validarBairro()
{
	var bairro= Cadastro.bairro.value;
	
	if(bairro =="")
	{
	
		Cadastro.bairro.focus();
		document.getElementById("bairroI").style.visibility = "visible";
		return false;
		
	}
	
	else
	{
	
		document.getElementById("bairroI").style.visibility = "hidden";
		return true;
	}
}
function validarCidade()
{
	var cidade= Cadastro.cidade.value;
	
	if(cidade =="")
	{
	
		Cadastro.cidade.focus();
		document.getElementById("cidadeI").style.visibility = "visible";
		return false;
		
	}
	
	else
	{
	
		document.getElementById("cidadeI").style.visibility = "hidden";
		return true;
	}
}


function validarTudo()
{
	var nome = validarNome();
	var Telefone = validarTelefone();
	var Celular = validarCelular();
	var Data = validarData();
	var email = IsEmail(document.getElementById('email').value);
	var cpf = ValidarCPF(Cadastro.cpf);
	var rua = validarRua();
	var bairro = validarBairro();
	var cidade = validarCidade();
	
	var curso = validaCurso();
	var trabalho = seleciona();
	var expectativa = selecionaExpec();
	var outra = OutraIsselected();
	var conheceu = selecionaConhece();
	var	outro = outroSelecionado();

	if(conheceu==false||outro==false || outra==false || expectativa == false || trabalho == false || curso == false || cpf== false || email==false || nome ==false || Telefone ==false || Celular ==false || Data ==false ||cidade ==false || bairro ==false || rua ==false)
	{
		alert("preencha os campos obrigatórios corretamente");
		return false;
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
function validaCurso()
{
	var cur = document.getElementById("curso").value;
 if(cur=="")
 {	

 	document.getElementById("cursoI").style.visibility="visible";

 	return false;
 }
 else
 {	
 	document.getElementById("cursoI").style.visibility="hidden";
 	return true;
 }
} 

function seleciona()
{
	var selecao = document.getElementById("selecao");
	if(selecao.selectedIndex==0)
	{
		document.getElementById("trabalho").style.visibility = "visible";
		document.getElementById("selecao").focus();
		return false;
	}
	else
	{
		document.getElementById("trabalho").style.visibility = "hidden";
		return true;
	}

}
function selecionaExpec()
{
	var selecao = document.getElementById("selecao2");
	if(selecao.selectedIndex==0)
	{
		document.getElementById("trabalho2").style.visibility = "visible";
		document.getElementById("selecao2").focus();
		return false;
	}
	else
	{
		document.getElementById("trabalho2").style.visibility = "hidden";
		return true;
	}
}

function selecionaConhece()
{
	var selecao = document.getElementById("selecao3");
	if(selecao.selectedIndex==0)
	{
		document.getElementById("conheceu").style.visibility = "visible";
		document.getElementById("selecao3").focus();
		return false;
	}
	else
	{
		document.getElementById("conheceu").style.visibility = "hidden";
		return true;
	}
}



function selecionaOutra()
{	
	var selecao = document.getElementById("selecao2");
	
	if (selecao.selectedIndex==4) 
	{
		document.getElementById("texto").style.visibility = "visible";
		document.getElementById("texto").focus();
		
		return false;
	}
	else
	{
		document.getElementById("texto").style.visibility = "hidden";
		document.getElementById("expectativa").style.visibility = "hidden";
		return true;
	}
}

function selecionaOutro()
{	
	var selecao = document.getElementById("selecao3");
	
	if (selecao.selectedIndex==5) 
	{
		document.getElementById("texto2").style.visibility = "visible";
		document.getElementById("texto2").focus();
		
		return false;
	}
	else
	{
		document.getElementById("texto2").style.visibility = "hidden";
		document.getElementById("soube").style.visibility = "hidden";
		return true;
	}
}

function OutraIsselected()
{
	var selecao = document.getElementById("selecao2");
	

	if (selecao.selectedIndex==4) 
	{
		var valor = document.getElementById("qual").value;
	
		if (valor=="") 
		{
			document.getElementById("qual").focus();
			document.getElementById("expectativa").style.visibility="visible";
			return false;
		}
		else
		{
			document.getElementById("expectativa").style.visibility="hidden";
			return true;	
		}
	}
	else
	{
		return true;
	}
}

function outroSelecionado()
{
	var selecionou = document.getElementById("selecao3");
	if (selecionou.selectedIndex==5) 
		{
			var valor2 = document.getElementById("qual2").value;
		
			if (valor2=="") 
			{
				document.getElementById("qual2").focus();
				document.getElementById("soube").style.visibility="visible";
				return false;
			}
			else
			{
				document.getElementById("soube").style.visibility="hidden";
				return true;	
			}
		}
		else
		{
			return true;
		}
}






