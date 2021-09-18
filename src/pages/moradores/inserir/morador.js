"use strict"

// mensagem de sucesso ou erro ao cadastrar morador
let cadastro_status = document.getElementById('morador_status_id').value;

if (cadastro_status == 1) {
	document.getElementById("morador_cadastrado").innerHTML = "Morador cadastrado";
	document.getElementById("morador_cadastrado").classList.add("cadastro_ok");
}
else if (cadastro_status == -1) {
	document.getElementById("morador_cadastrado").innerHTML = "Erro. morador não cadastrado";
	document.getElementById("morador_cadastrado").classList.add("cadastro_error");
}
