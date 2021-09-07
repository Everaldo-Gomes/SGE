<?php

include_once("../../../routers.php");
include_once("../../../template/top.php");
include_once("../../../database/funcoes_gerais.php");
include_once("../../../database/conexao.php");

$database = new Database();
$db = $database->getConnection();

$funcoesBanco = new Funcoes_gerais($db);

if(isset($_POST['idMoradorEdicao'])){


    $parametros = "id = {$_POST['idMoradorEdicao']}";
    
    $recebedor = $_POST['recebedorMoradorEdicao'] == 0 ? "0" : "1";
    
    $dados = array(
        'nome' => $funcoesBanco -> formataInputStringBanco($_POST['nomeMoradorEdicao']),
        'cpf' => $funcoesBanco -> formataInputStringBanco($_POST['cpfMoradorEdicao']),
        'telefone' => $funcoesBanco -> formataInputStringBanco($_POST['telefoneMoradorEdicao']),
        'endereco' => $funcoesBanco -> formataInputStringBanco($_POST['enderecoMoradorEdicao']),
        'recebe' => $recebedor
    );

    $morador = $funcoesBanco-> alterarRegistroComArrayAssociativo('morador', $dados, $parametros);

    header("Location: " . $listar_morador_path);
}




?>