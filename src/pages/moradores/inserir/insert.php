<?php

include_once "../../../database/conexao.php";
include_once "../../../database/funcoes_gerais.php";
include_once "../../../routers.php";

/* connecting */
$database = new Database();
$db = $database->getConnection();

/* get info from the front-end */
$nome = $_POST['nome_field'];
$cpf = $_POST['cpf_field'];
$telefone = $_POST['telefone_field'];
$endereco = $_POST['endereco_field']; 

$arrayDados = array($nome, $cpf, $telefone, $endereco);

if ($nome !== " " && $cpf !== " ") {
	
	$morador = new Funcoes_gerais($db);

	/* verify if the name is already been taken */
	//$exist = 0 //NEED TO CHANGE

	//if ($exist) {
	
	/* warning morador already exist */
	//}
	//else { /* set morador's name */
	$fields = 'nome, cpf, telefone, endereco';
	$morador->gravarArrayNoBanco('morador', $fields, $arrayDados);

	sleep(1.5);
	
	/* stay in the same page */
	header("Location: " . $add_morador);
	exit();
	//}
}
else {
	/* show   an error */
}

?>
