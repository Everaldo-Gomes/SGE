'use strict'


let cadastro_status = document.getElementById('encomenda_status_id').value;

if (cadastro_status == 1) {
	document.getElementById("entregar_status").innerHTML = "Agora foi é o responsável por essa entrega";
	document.getElementById("entregar_status").classList.add("cadastro_ok");
}
