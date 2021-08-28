<?php
include("../../../routers.php");
include_once "../../../database/conexao.php";
include_once "../../../database/funcoes_gerais.php";

$database = new Database();
$db = $database->getConnection();

$encomenda = new funcoes_gerais($db);

/* verifica qual foi botão foi pressionado  */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	
    if (isset($_POST['btn_editar'])) {

		$parametros = "WHERE id = {$_POST['btn_editar']}";
		$arrayResultado = $encomenda->lerRegistros('encomenda', $parametros, '*');
		
		session_start();
		$_SESSION['field_info'] = $arrayResultado;
		
		/* redireciona para  a mesma pagina */
		header("Location: " . $cadastrar_encomenda_path);
		exit();
	}

	else if (isset($_POST['btn_cancelar'])) {

		/* exclui */
		$encomenda->deletarRegistro('encomenda', "id = {$_POST['btn_cancelar']}");

		/* envia confirmação */
		session_start();
		$_SESSION['encomenda_cancelada'] = 1;
		
		header("Location: " . $editar_encomenda_path);
		exit();
	}
}
?>
