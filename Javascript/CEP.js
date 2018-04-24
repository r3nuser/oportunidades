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



