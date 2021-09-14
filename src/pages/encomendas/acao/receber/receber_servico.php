<?php 

include_once "../../../../database/conexao.php";
include_once "../../../../database/funcoes_gerais.php";
include_once "../../../../routers.php";

$database = new Database();
$db = $database->getConnection();

$obter_obj = new funcoes_gerais($db);
$encomenda_info = array();

/* busca info sobre a encomenda clicada */
session_start();	


$_SESSION['encomenda_info'] = $obter_obj->lerRegistros("encomenda", "WHERE id = {$_SESSION['encomenda_id']}");
$_SESSION['destinatario_info'] = $obter_obj->lerRegistros("morador", "WHERE id = {$_SESSION['encomenda_info'][2]}");
$_SESSION['entregador_info'] = $obter_obj->lerRegistros("morador", "WHERE id = {$_SESSION['encomenda_info'][3]}");


unset($_SESSION['encomenda_id']);

/* redireciona para a página de visualização */
header("Location: " . $receber_encomenda_path);
exit();
?>
