'use strict';

function confirm_submit() {
	confirm("Tem certeza ?");
}

// mensagem de sucesso ou erro ou cadastrar encomenda
let encomenda_status = document.getElementById('encomenda_status').value;
let encomenda_editada = document.getElementById('encomenda_editada').value;

if (encomenda_status == 1) {
	document.getElementById("encomenda_aviso").innerHTML = "Encomenda excluida";
	document.getElementById("encomenda_aviso").classList.add("encomenda_excluida_ok");
}

if (encomenda_editada == 1) {
	document.getElementById("encomenda_aviso").innerHTML = "Encomenda Editada";
	document.getElementById("encomenda_aviso").classList.add("encomenda_editada_ok");
}


