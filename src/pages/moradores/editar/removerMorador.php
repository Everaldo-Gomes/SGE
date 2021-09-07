<?php

$title = 'SGC - testeExcluir';
include_once("../../../routers.php");
include_once("../../../template/top.php");
include_once("../../../database/funcoes_gerais.php");
include_once("../../../database/conexao.php");


if(isset($_GET['id'])){
    $database = new Database();
    $db = $database->getConnection();

    $funcoesBanco = new Funcoes_gerais($db);
    $id = $_GET['id'];

    $result = $funcoesBanco -> deletarRegistro('morador', "id = $id");

    header("Location: " . $listar_morador_path);
    //par a execução, mas n sei se precisa
    // exit();

}

include_once("../../../template/bottom.php");

?>