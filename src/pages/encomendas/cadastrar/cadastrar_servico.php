<?php 

include_once "../../../database/conexao.php";
include_once "../../../database/funcoes_gerais.php";
include_once "../../../routers.php";

session_start();

$database = new Database();
$db = $database->getConnection();

/* informações vinda do front-end */
$encomenda_id = $_POST['encomenda_id_nome'];
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


// verifica se o usuário está logado, se não tiver redireciona para a página de login

if (!$apenas_branco) {
	
	$encomenda = new funcoes_gerais($db);
	$morador_logado_id = $_SESSION['morador_logado'][0]; 

	/* editando */
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {	
		if (isset($_POST['btn_cadastra_edita_nome']) && $_POST['btn_cadastra_edita_nome'] == 'Editar Encomenda') {

			$fields = array("nome", "previsao_data_entrega");
			$dados = array($encomenda_nome, $previsao_entrega);
			$encomenda->edita_encomenda('encomenda', $fields, $dados, "id = {$encomenda_id}"); 

			/* cofirmação */
			$_SESSION['encomenda_editada'] = 1;
			
			/* redireciona */
			header("Location: " . $editar_encomenda_path);
			exit();
		}
	}
	
	/* cadastrando 
	   por padrão quando uma encomenda é cadastrada o ID do morador que vai entregar vai ser o próprio morador que está cadastrando */
	$fields = 'nome, cadastrada_morador_id, entregador_id, data_cadastro, previsao_data_entrega, foi_entregue, entregador_pegou, excluido';
	$arrayDados = array($encomenda_nome, $morador_logado_id, $morador_logado_id, date("Y-m-d H:i:s"), $previsao_entrega, 0, 0, 0); //0 é o campo "foi_entregue, entregador_pegou e excluida"
	
	$encomenda->gravarArrayNoBanco('encomenda', $fields, $arrayDados);

	/* aviso que encomenda foi cadastrada */
	session_start();
	$_SESSION['encomenda_status'] = 1;
	
	/* retorna o id da encomenda cadastrada APENAS pora este morado 
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
