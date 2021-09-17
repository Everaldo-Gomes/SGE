'use strict'

// mostra mensagem de erro
let login_status = document.getElementById('login_status_id').value;

if (login_status == -1) {
	document.getElementById("login_erro").innerHTML = "CPF ou senha está errado";
	document.getElementById("login_erro").classList.add("login_erro");
}

// remove mensagem de erro quando digita
let cpf_campo = document.getElementById('cpf_id');
let senha_campo = document.getElementById('senha_id');

cpf_campo.addEventListener('input', escode_msg_erro);
senha_campo.addEventListener('input', escode_msg_erro);

function escode_msg_erro() {
	
	document.getElementById("login_erro").innerHTML = "";
	document.getElementById("login_erro").classList.remove("login_erro");
}



