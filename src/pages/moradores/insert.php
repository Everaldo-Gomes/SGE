<?php

include_once "../../database/conexao.php";
include_once "../../database/funcoes_gerais.php";

/* connecting */
$database = new Database();
$db = $database->getConnection();

/* get info from the front-end */
$nome = $_POST['nome_field'];
$telefone = $_POST['telefone_name_field'];
$endereco = $_POST['endereco_name_field']; 

$arrayDados = array($nome, $telefone, $endereco);

if ($nome !== " ") {
	
	$morador = new Funcoes_gerais($db);

	/* verify if the name is already been taken */
	//$exist = 0 //NEED TO CHANGE

	//if ($exist) {
	
	/* warning morador already exist */
	//}
	//else { /* set morador's name */
	$fields = 'nome, telefone, endereco';
	$morador->gravarArrayNoBanco('morador', $fields, $arrayDados);
	//}
}
else {
	/* show   an error */
}

?>
