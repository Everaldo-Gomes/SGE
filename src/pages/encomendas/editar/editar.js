'use strict';

function confirm_submit() {
	confirm("Tem certeza ?");
}

// mensagem de sucesso ou erro ou cadastrar encomenda
let encomenda_status = document.getElementById('encomenda_status').value;

if (encomenda_status == 1) {
	document.getElementById("encomenda_excluida").innerHTML = "Encomenda excluida";
	document.getElementById("encomenda_excluida").classList.add("encomenda_excluida_ok");
}
