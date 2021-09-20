'use strict';

// define qual tela vai ser mostrada
var encomenda_pendente = document.querySelector(".encomenda_pendente");
var encomenda_entregar = document.querySelector(".encomenda_entregar");
var btn_pendente = document.getElementById("btn_encomenda_pendente");
var btn_entregar = document.getElementById("btn_encomenda_entregar");

encomenda_pendente.style.display = "none";
encomenda_entregar.style.display = "none";

// mensagem de sucesso ou erro ou cadastrar encomenda
let encomenda_status = document.getElementById('encomenda_status').value;
let encomenda_editada = document.getElementById('encomenda_editada').value;
var aba_selecionada = 0;

if (encomenda_status == 1 || encomenda_status == 2) {
	document.getElementById("encomenda_aviso").innerHTML = "Encomenda excluida";
	document.getElementById("encomenda_aviso").classList.add("encomenda_excluida_ok");

	if (encomenda_status == 2) {
		aba_selecionada = 1;
		btn_entregar.click();
	}
	//encomenda_status == 1 ? btn_pendente.click(); : btn_entregar.click();
}

if (encomenda_editada == 1) {
	document.getElementById("encomenda_aviso").innerHTML = "Encomenda Editada";
	document.getElementById("encomenda_aviso").classList.add("encomenda_editada_ok");
}

// define se o botão entrega pendente vai ser clicado ou não
if (!aba_selecionada) {
	btn_pendente.click();
}

function mostra_esconde_telas(btn) {


	// se foi o botão de entregas à fazer que foi precionado
	if (btn.value == 1) {
		encomenda_pendente.style.display = "none";
		encomenda_entregar.style.display = "block";
		btn_pendente.style.backgroundColor = "gray";
		btn_entregar.style.backgroundColor = "#17a2b8";
	}

	// se o botão clicado foi o de encomendas pendente
	// nesse caso não pode ser um if-else porque o valor do bnt2 não é avaliado se clicar no btn1, e vice versa
	if (btn.value == 0){
		encomenda_entregar.style.display = "none";
		encomenda_pendente.style.display = "block";
		btn_entregar.style.backgroundColor = "gray";
		btn_pendente.style.backgroundColor = "#17a2b8";
	}
}

function confirm_submit() {
	confirm("Tem certeza ?");
}
