<?php

include("./routers.php");
include("./database/conexao.php");
include("./database/funcoes_gerais.php");

function carrega_entregar() {

	$id_logado = 1; //URGENTE, tem que mudar para o usuário logado
	$params = "WHERE cadastrada_morador_id != {$id_logado} AND foi_entregue = 0 AND excluido = 0 ORDER BY previsao_data_entrega ASC";
	return carrega_info($params);
}

function carrega_receber() {

	$id_logado = 1; //URGENTE, tem que mudar para o usuário logado
	$params = "WHERE cadastrada_morador_id = {$id_logado} AND foi_entregue = 0 AND excluido = 0 ORDER BY previsao_data_entrega ASC";
	return carrega_info($params);	
}

function carrega_info($params) {

	$database = new Database();
	$db = $database->getConnection();

	$index_obj = new Funcoes_gerais($db);
	$lista = $index_obj->lista_obj('encomenda', $params, '*');

	$div = "";
	
	for ($i = 0; $i < count($lista); $i++) {
		
		$div .="
        <form action='{$index_servico_path}' method='POST' name='Form'>
            <button type='submit' class='encomenda_box' name='btn_encomenda' value='{$lista[$i][0]}'>
                Nome: {$lista[$i][1]} </br>
                Entrega: {$lista[$i][4]}
            </button>
        </form>	
		";
	}

	return $div;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_encomenda'])) {

	/* descobrir se clicou na entregar ou receber */
    
}

// put an if in the fucntion for example. if the entragar is clicked set 1, receber = 0. set this values as an id or something else

?>
