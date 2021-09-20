<?php
include("../../../routers.php");
include_once "../../../database/conexao.php";
include_once "../../../database/funcoes_gerais.php";

session_start();

$database = new Database();
$db = $database->getConnection();

$encomenda = new funcoes_gerais($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if (isset($_POST['btn_cancelar_entrega'])) {
        
        $query = "UPDATE encomenda SET entregador_id = cadastrada_morador_id, entregador_pegou = 0 WHERE id = {$_POST['btn_cancelar_entrega']}";
        $encomenda->alteraRegistroGeral($query);

        $_SESSION['encomenda_cancelada'] = 2;
    }
}

header("Location: " . $editar_encomenda_path);
exit();
?>
