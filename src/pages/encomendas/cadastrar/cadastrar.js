'use strict'

function confirm_submit() {
	confirm("Tem certeza ?");
	var nome = document.forms["Form"]["encomenda_nome_field"].value;
}

// mensagem de sucesso ou erro ou cadastrar encomenda
let cadastro_status = document.getElementById('encomenda_id').value;

if (cadastro_status == 1) {
	document.getElementById("encomenda_cadastrada").innerHTML = "Encomenda cadastrada";
	document.getElementById("encomenda_cadastrada").classList.add("cadastro_ok");
}
else if (cadastro_status == -1) {
	document.getElementById("encomenda_cadastrada").innerHTML = "Erro. Encomenda não cadastrada";
	document.getElementById("encomenda_cadastrada").classList.add("cadastro_error");
}

