<?php

include("./routers.php");
include("./database/conexao.php");
include("./database/funcoes_gerais.php");

function carrega_itens($condicao, $acao) {

	$id_logado = 1; //URGENTE, tem que mudar para o usuário logado
	$params = "WHERE cadastrada_morador_id {$condicao} {$id_logado} AND foi_entregue = 0 AND excluido = 0 ORDER BY previsao_data_entrega ASC";
	echo carrega_info($params, $acao);	
}


/* para cada item encontrado no banco, monta uma div com o nome da encomenda, data de entrega e o ID da encomenda */

function carrega_info($params, $acao) {

	$database = new Database();
	$db = $database->getConnection();

	$index_obj = new Funcoes_gerais($db);
	$lista = $index_obj->lista_obj('encomenda', $params, '*');
	
	$div = "";
	
	for ($i = 0; $i < count($lista); $i++) {

		$div .="
        <form action='{$index_servico_path}' method='POST' name='Form'>
            <button type='submit' class='encomenda_box' name='btn_encomenda' value='{$lista[$i][0]}{$acao}'>
                Nome: {$lista[$i][1]} </br>
                Entrega: {$lista[$i][4]}
            </button>
        </form>	
		";
	}

	return $div;
}


/* descobrir se o item que foi clicado está na div "entregar" ou "receber" encomenda */

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_encomenda'])) {

	$valor = $_POST['btn_encomenda'];
	$encomenda_id = round($valor / 10);	
	$acao = $valor % 10;

	session_start();
	$_SESSION['encomenda_id'] = $encomenda_id;
	
	/* se ação == 1, clicou em receber encomendas */
	if ($acao) {

		//header("Location: " . $receber_encomenda_path);
		header("Location: " . $receber_encomenda_servico_path);
		exit();
	}

	/* clicou em entregar encomendas */
	else {
		
		header("Location: " . $entregar_encomenda_servico_path);
		exit();
	}
}

?>
