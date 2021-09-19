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
$recebedor_id = $_POST['btn_recebedor_id']; //botão editar que está na listagem dos recebedores
$senha = $_POST['password_field'];
$recebe_encomenda = 0;

/* verifica se o checkbox está marcado */
if(isset($_POST['recebe_encomenda_nome'])) {
	$recebe_encomenda = 1;
}

/* verifica qual foi botão foi pressionado  */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    session_start();
    
    /* arrayResultado tem todas as info o usuario */
    if (isset($_POST['btn_pesquisa_cpf'])) {

        $parametros = "WHERE cpf = '{$cpf}' AND excluido = 0";
        $_SESSION['arrayResultado'] = $morador->lerRegistros('morador', $parametros, '*');
        
        /* verifica se o cpf existe */
		if ($_SESSION['arrayResultado'][2]  == $cpf) {
            
			/* salva info para poder liberar e preencher os outros campos */
			$_SESSION['field_info'] = $_SESSION['arrayResultado'];
		}
        else { //cpf não encontrado
            $_SESSION['morador_status'] = 3;
        }
    }
	else if (isset($_POST['btn_edita_morador'])) { 

		if ($nome !== " " && $cpf !== " " && $senha !== " ") {
            
            $dados = array($nome, $cpf, $telefone, $endereco, $recebe_encomenda, 0, $senha); //0 é o campo excluido
            $fields = array ('nome', 'cpf', 'telefone', 'endereco', 'recebe', 'excluido', 'senha');
			$where = "id = {$_SESSION['arrayResultado'][0]}";
			$morador->alterarRegistro('morador', $fields, $dados, $where);
			$_SESSION['morador_status'] = 1;
		}
    }
	else if (isset($_POST['btn_exclui_morador'])) { //btn_exclui_morador foi pressionado
		
		$where = "id = {$_SESSION['arrayResultado'][0]}";
		$morador->deletarRegistro('morador', $where);
        $_SESSION['morador_status'] = 2;
	}
    else if (isset($_POST['btn_recebedor_id'])) {
        
        $_SESSION['recebedor_id'] = $recebedor_id;
    }

    /* redireciona para a mesma pagina */
    header("Location: " . $editar_morador_path);
    exit();
}
?>
