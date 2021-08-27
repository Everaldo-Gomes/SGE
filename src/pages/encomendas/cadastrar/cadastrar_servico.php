<?php 

include_once "../../../database/conexao.php";
include_once "../../../database/funcoes_gerais.php";
include_once "../../../routers.php";

$database = new Database();
$db = $database->getConnection();

/* informações vinda do front-end */
$encomenda_nome = $_POST['encomenda_nome_field'];
$previsao_entrega = $_POST['previsao_entrega_field'];

/* conferi se foi digitado apenas espaços em branco */
$apenas_branco = 1;
for ($i = 0; $i < strlen($encomenda_nome); $i++) {
 	if ($encomenda_nome[i] != " ") {
 		$apenas_branco = 0;
 		break;
 	}
}

if (!$apenas_branco) {

	//é necessário pegar o morador que vai está logado
	$morador_logado_id = 1; // <-- URGENTE !!!! PRECISA MUDAR
	//-------------------------------------------------------

	$fields = 'nome, cadastrada_morador_id, data_cadastro, previsao_data_entrega, foi_entregue, excluido';
	$arrayDados = array($encomenda_nome, $morador_logado_id, date("Y-m-d H:i:s"), $previsao_entrega, 0, 0); //0 é o campo "foi_entregue e excluida"

	$encomenda = new funcoes_gerais($db);
	$encomenda->gravarArrayNoBanco('encomenda', $fields, $arrayDados);

	/* aviso que encomenda foi cadastrada */
	session_start();
	$_SESSION['encomenda_status'] = 1;
	
	/* retorna o id da encomenda cadastrada APENAS por este morado 
	   para que o morador possa consultar/editar  */

	//NÃO está sendo usada, mas funciona
	//$id_encomenda_cadastrada = $encomenda->ultimo_id('encomenda', "cadastrada_morador_id = {$morador_logado_id}"); 	
	
	header("Location: " . $cadastrar_encomenda_path);
	exit();
}
else {
	
	/* aviso que encomenda não foi cadastrada */
	session_start();
	$_SESSION['encomenda_status'] = -1;

	header("Location: " . $cadastrar_encomenda_path);
	exit();
}
?>
