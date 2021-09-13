<?php 

include_once "../../../../database/conexao.php";
include_once "../../../../database/funcoes_gerais.php";
include_once "../../../../routers.php";

$database = new Database();
$db = $database->getConnection();

$entregar_obj = new funcoes_gerais($db);
$encomenda_info = array();

/* busca info sobre a encomenda clicada */
session_start();	
$params = "id = {$_SESSION['encomenda_id']}";
$_SESSION['encomenda_info'] = $entregar_obj->lerRegistrosJoin('encomenda', 'morador', 'id', $params);

unset($_SESSION['encomenda_id']);

/* redireciona para a página de visualização */
header("Location: " . $entregar_encomenda_path);
exit();
?>
