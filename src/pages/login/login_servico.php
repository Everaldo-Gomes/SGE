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
if ($_SESSION['morador_logado'][2] == $cpf && $_SESSION['morador_logado'][7] == $password) {

    header("Location: " . $index_path);
    exit();
}
else {  //erro, morador não encontrado

    $_SESSION['login_status'] = -1;
    unset($_SESSION['morador_logado']);
    
    header("Location: " . $login_form_path);
    exit();
}
?>	
