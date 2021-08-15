<?php

include_once "../../../database/conexao.php";
include_once "../../../database/funcoes_gerais.php";
include_once "../../../routers.php";

/* connecting */
$database = new Database();
$db = $database->getConnection();

/* morador obj */
$morador = new Funcoes_gerais($db);

/* forms */
$nome     = $_POST['nome_field'];
$cpf      = $_POST['cpf_field'];
$telefone = $_POST['telefone_field'];
$endereco = $_POST['endereco_field'];
$arrayDados = array($nome, $cpf, $telefone, $endereco);


/* conferiindo se o cpf existe */
$parametros = "WHERE cpf = '{$cpf}'";
$arrayResultado = $morador->lerRegistros('morador', $parametros, '*');


/* se cpf não tiver cadastrado, cadastra o novo morador */
if ($arrayResultado[2] == $cpf) {

	/* salva info para poder liberar e preencher os outros campos */
	session_start();
	$_SESSION['field_info'] = $arrayResultado;
	
	/* pega as info */

	/* conferi o cpf */
	
	/* salva */
	//$fields = 'nome, cpf, telefone, endereco';
	//$morador->gravarArrayNoBanco('morador', $fields, $arrayDados);

	/* redireciona para  a mesma pagina */
	header("Location: " . $editar_morador_path);
	exit();
}
else {
	/* Falta colocar aviso de erro no front */
	header("Location: " . $editar_morador_path);
	exit();
}
?>
