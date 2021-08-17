<?php

include_once "../../database/conexao.php";
include_once "../../database/funcoes_gerais.php";
include_once "../../routers.php";

/* connecting */
$database = new Database();
$db = $database->getConnection();

$funcoesBanco = new Funcoes_gerais($db);

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
var_dump($funcoesBanco);
$result = $funcoesBanco -> executarQuery("DELETE FROM morador WHERE id=$id");

// if(mysqli_affected_rows($conn)){
//     header("Location: lista.php");
// }
?>