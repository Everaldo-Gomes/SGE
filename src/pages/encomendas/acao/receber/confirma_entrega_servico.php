<?php 

include_once "../../../../database/conexao.php";
include_once "../../../../database/funcoes_gerais.php";
include_once "../../../../routers.php";

$database = new Database();
$db = $database->getConnection();
$entregar_obj = new funcoes_gerais($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	
    if (isset($_POST['btn_confirma_entrega'])) {
        $encomenda_id = $_POST['btn_confirma_entrega'];
    }
}

// algumas info
$encomenda_info = $entregar_obj->lerRegistros("encomenda", "WHERE id = {$encomenda_id }");
$destinatario_info = $entregar_obj->lerRegistros("morador", "WHERE id = {$encomenda_info[2]}");
$entregador_info = $entregar_obj->lerRegistros("morador", "WHERE id = {$encomenda_info[3]}");

// marca a encomenda como entregue
$entregar_obj->alteraRegistroGeral("UPDATE encomenda set foi_entregue = 1 WHERE id = {$encomenda_id}");

// salva histórico de entrega

// Gerando o  código da entrega
// formato: //ET = entrega + códgio gerado + BR = brasil
$cod_entrega = "ET";
$aux = $entregar_obj->selectRegistroGeral("SELECT MAX(id) FROM encomenda");
$cod_entrega .= $aux[0][0];
$cod_entrega .= "BR";

$current_date = date('Y-m-d H:i:s');
$query = "INSERT INTO historico_entrega (morador_entrega_id, morador_recebe_id, encomenda_id, data_entrega, cod_entrega) 
          VALUES ({$entregador_info[0]}, {$destinatario_info[0]}, {$entregador_info[0]}, '{$current_date }', '{$cod_entrega}')";

$entregar_obj->inserirRegistroGeral($query);

// mostra notificação que foi marcadda como entregue
session_start();

$_SESSION['encomenda_entregue'] = 1;

//header("Location: " . $editar_encomenda_path);
//exit();
?>
