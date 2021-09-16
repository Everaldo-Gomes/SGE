<?php

include_once "../../database/conexao.php";
include_once "../../database/funcoes_gerais.php";
include_once "../../routers.php";

/* connecting */
$database = new Database();
$db = $database->getConnection();
$login = new Funcoes_gerais($db);

// obtem info vinda dos formulários
$cpf      = $_POST['cpf_field'];
$password = $_POST['password_field'];


// procura o cpf no banco, se encontrar faz o login, se não mostra um aviso
$parametros = "WHERE cpf = '{$cpf}'"; 

session_start();
$_SESSION['morador_logado'] = $login->lerRegistros('morador', $parametros, '*');


/* se cpf estiver cadastrado e a senha estiver correta efetua o login */
// if ($arrayResultado[2] != $cpf || $arrayResultado[senha posição] != $password) {

    
// }
// else {
//     //error
//     echo "morador não encontrado";
// }
?>	
