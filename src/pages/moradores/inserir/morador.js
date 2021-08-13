"use strict"

function confirm_submit() {
	confirm("Tem certeza ?");

	var nome = document.forms["Form"]["nome_field"].value;
	
	if (nome !== "") {
		setTimeout(() => {
			document.querySelector('.add_morador').classList.add("hidden");
		}, 1);
	}
}
