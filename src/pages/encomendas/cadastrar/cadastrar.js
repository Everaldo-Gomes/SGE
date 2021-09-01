'use strict'

function confirm_submit() {
	confirm("Tem certeza ?");
	//var nome = document.forms["Form"]["encomenda_nome_field"].value;
}

// cadastrando
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

// editando
let edita_id = document.getElementById('encomenda_id_edita').value;
let edita_nome = document.getElementById('encomenda_nome').value;
let edita_data = document.getElementById('encomenda_data').value;

if (edita_id > 0) {
	
	document.getElementById('nome_field_id').value = edita_nome;

	var date = new Date();
	var data_registrada = date.toISOString().substring(0,10);
	//var hora_registrada = date.toISOString().substring(11,16);
	document.getElementById('previsao_entrega_id').value = data_registrada;

	let btn_edita = document.getElementById('btn_cadastra_edita_id');
	btn_edita.value = 'Editar Encomenda';
	btn_edita.classList.add('btn_edita_style');
}

