"use strict"

// quando abrir essa tela os campos vão está configurado da seguinte forma:

// div forms
document.querySelector('.forms').style.height = "270px";

// campos
document.querySelector('.morador_nome').style.display = "none";
document.querySelector('.morador_telefone').style.display = "none";
document.querySelector('.morador_endereco').style.display = "none";
document.querySelector('.morador_recebe_encomenda').style.display = "none";

// botões
document.querySelector('.exclui_morador').style.visibility = 'hidden';
document.querySelector('.edita_morador').style.visibility = 'hidden';

//aux
var hidden_name = document.getElementById('aux_nome').value;
var hidden_cpf = document.getElementById('aux_cpf').value;
var hidden_phone = document.getElementById('aux_phone').value;
var hidden_endereco = document.getElementById('aux_endereco').value;
var hidden_recebe = document.getElementById('aux_recebe').value;

/* se encontrar o cpf, mostra e organiza os outros campos */
if (hidden_cpf > 0) {

	// div forms
	document.querySelector('.forms').style.height = "520px";

	// campos
	document.querySelector('.morador_nome').style.display = "block";
	//document.getElementById("cpf_id").readOnly = true;
	document.querySelector('.morador_telefone').style.display = "block";
	document.querySelector('.morador_endereco').style.display = "block";
	document.querySelector('.morador_recebe_encomenda').style.display = "block";

	// botões
	var exclui_btn = document.querySelector('.exclui_morador');
	var edita_btn = document.querySelector('.edita_morador');

	edita_btn.style.visibility = 'visible';
	edita_btn.style.display = "inline";
	edita_btn.style.marginLeft = "20px";
	
	exclui_btn.style.visibility = 'visible';
	exclui_btn.style.display = "inline";
	exclui_btn.style.marginLeft = "15px";

	/* preenche campos */
	document.getElementById("nome_id").value = hidden_name;
	document.getElementById("cpf_id").value = hidden_cpf;
	document.getElementById("phone_id").value = hidden_phone;
	document.getElementById("endereco_id").value = hidden_endereco;

	/* marca o checkbox se o morador recebe a encomenda */
	if (hidden_recebe == 1) {
		document.getElementById("recebe_encomenda_id").checked = true;
	}
}
