<?php

include_once "../../../database/conexao.php";
include_once "../../../database/funcoes_gerais.php";
include_once "../../../routers.php";

/* connecting */
$database = new Database();
$db = $database->getConnection();

/* informações vinda do front-end */
$nome = $_POST['nome_field'];
$cpf = $_POST['cpf_field'];
$telefone = $_POST['telefone_field'];
$endereco = $_POST['endereco_field']; 
$arrayDados = array($nome, $cpf, $telefone, $endereco);

if ($nome !== " " || $cpf !== " ") {

	$morador = new Funcoes_gerais($db);
	$parametros = "WHERE cpf = '{$cpf}'";
	$arrayResultado = $morador->lerRegistros('morador', $parametros, '*');

	/* se cpf não tiver cadastrado, cadastra o novo morador */
	if ($arrayResultado[2] != $cpf) {
	
		$fields = 'nome, cpf, telefone, endereco';
		$morador->gravarArrayNoBanco('morador', $fields, $arrayDados);

		sleep(1.8);
		
		/* redireciona para  a mesma pagina */
		header("Location: " . $cadastrar_morador_path);
		exit();
	}
	else {
		/* Falta colocar esse aviso no front */
		echo 'já cadastrado';
	}
}
?>
