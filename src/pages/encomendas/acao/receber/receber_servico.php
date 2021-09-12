<?php 

include_once "../../../../database/conexao.php";
include_once "../../../../database/funcoes_gerais.php";
include_once "../../../../routers.php";

$database = new Database();
$db = $database->getConnection();

$receber_obj = new funcoes_gerais($db);

$encomenda_info = array();

/* busca info sobre a encomenda clicada */
session_start();	
$params = "id = {$_SESSION['encomenda_id']}";
$_SESSION['encomenda_id'] = $receber_obj->lerRegistrosJoin('encomenda', 'morador', 'id', $params);

//echo $_SESSION['encomenda_id'][0];

/* redireciona para a página de visualização */
header("Location: " . $receber_encomenda_path);
exit();
?>
