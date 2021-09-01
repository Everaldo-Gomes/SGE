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
$recebedor_id = $_POST['btn_get_id'];

$recebe_encomenda = 0;

/* verifica se o checkbox está marcado */
if(isset($_POST['recebe_encomenda_nome'])) {
	$recebe_encomenda = 1;
}

$arrayDados = array($nome, $cpf, $telefone, $endereco);

/* verifica qual foi botão foi pressionado  */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	/* arrayResultado tem todas as info o usuario */
	$parametros = "WHERE cpf = '{$cpf}'";
	$arrayResultado = $morador->lerRegistros('morador', $parametros, '*');

    if (isset($_POST['btn_pesquisa_cpf'])) {

		/* se cpf não tiver cadastrado, cadastra o novo morador */
		if ($arrayResultado[2] == $cpf) {

			/* salva info para poder liberar e preencher os outros campos */
			session_start();
			$_SESSION['field_info'] = $arrayResultado;
			
			/* redireciona para  a mesma pagina */
			header("Location: " . $editar_morador_path);
			exit();
		}
		else {
			/* Falta colocar aviso de erro no front */
			header("Location: " . $editar_morador_path);
			exit();
		}
    }
	else if (isset($_POST['btn_edita_morador'])) { 

		if ($nome !== " " || $cpf !== " ") {
			
			/* se cpf não tiver cadastrado, cadastra o novo morador */
			//if ($arrayResultado[2] != $cpf) {

			$dados = array($nome, $cpf, $telefone, $endereco);
			$fields = array ('nome', 'cpf', 'telefone', 'endereco');
			$where = "id = {$arrayResultado[0]}";
			$morador->alterarRegistro('morador', $fields, $dados, $where);
			
			sleep(1);
			
			/* redireciona para  a mesma pagina */
			//header("Location: " . $editar_morador_path);
			//exit();
			//}
			//else {
			/* Falta colocar esse aviso no front */
			//	echo 'já cadastrado';
			//}
		}
		
		/* redireciona para  a mesma pagina */
		header("Location: " . $editar_morador_path);
		exit();	
    }

	/* consulta o cpf vindo da página dos recebedores */
	else if (isset($_POST['btn_get_id'])) {

		/* salva info para poder liberar e preencher os outros campos */
		session_start();
		$_SESSION['recebedor_id'] = $recebedor_id;
		
		/* redireciona para  a mesma pagina */
		header("Location: " . $editar_morador_path);
		exit();
	}
	else { //btn_exclui_morador foi pressionado
		
		$where = "id = {$arrayResultado[0]}";
		$morador->deletarRegistro('morador', $where);

		sleep(1);
		
		/* redireciona para  a mesma pagina */
		header("Location: " . $editar_morador_path);
		exit();
	}
}
?>
