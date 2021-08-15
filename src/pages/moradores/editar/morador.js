"use strict"

// quando abrir essa tela os campos vão está configurado da seguinte forma:

// div formms
document.querySelector('.forms').style.height = "270px";

// campos
document.querySelector('.morador_nome').style.display = "none";
document.querySelector('.morador_telefone').style.display = "none";
document.querySelector('.morador_endereco').style.display = "none";

// botões
document.querySelector('.exclui_morador').style.visibility = 'hidden';
document.querySelector('.edita_morador').style.visibility = 'hidden';

function confirm_submit() {
	confirm("Tem certeza ?");

	var nome = document.forms["Form"]["nome_field"].value;
	
	if (nome !== "") {
		setTimeout(() => {
			document.querySelector('.add_morador').classList.add("hidden");
		}, 1);
	}
}
