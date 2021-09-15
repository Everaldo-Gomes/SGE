<?php 

include_once "../../../../database/conexao.php";
include_once "../../../../database/funcoes_gerais.php";
include_once "../../../../routers.php";

session_start();

$database = new Database();
$db = $database->getConnection();

$entregar_obj = new funcoes_gerais($db);

/* verifica se clicou no botão entregar ou cancelar */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	
    if (isset($_POST['btn_acao_entregar'])) {

		$id_logado = 1; //UREGENTE pegar do login
		
		/* atualiza a encomenda, dizendo que alguém está responsável por entrega-la */
		$entregar_obj->alteraRegistroGeral("UPDATE encomenda set entregador_id = {$id_logado} WHERE id = {$_SESSION['encomenda_id']}");

		/* retira a encomenda da lista de encomendas que podem ser pegas para a entrega */
		$entregar_obj->alteraRegistroGeral("UPDATE encomenda set entregador_pegou = 1 WHERE id = {$_SESSION['encomenda_id']}");

		// confirmação front e back FALTA FAZER 
		$_SESSION['op_status'] = 1;
		
		/* volta para o inicio */
		header("Location: " . $index_path);
		exit();
	}
	else { //btn_acao_cancelar

		/* apenas redireciona para a página inicial */
		header("Location: " . $index_path);
		exit();
	}
}

/* se não, carrega as informações normalmente */
else {

	/* busca info sobre a encomenda clicada */
	
	$encomenda_info = array();

	$_SESSION['encomenda_info'] = $entregar_obj->lerRegistros("encomenda", "WHERE id = {$_SESSION['encomenda_id']}");
	$_SESSION['destinatario_info'] = $entregar_obj->lerRegistros("morador", "WHERE id = {$_SESSION['encomenda_info'][2]}");

	//unset($_SESSION['encomenda_id']);

	/* redireciona para a página de visualização */
	header("Location: " . $entregar_encomenda_path);
	exit();	
}
?>
