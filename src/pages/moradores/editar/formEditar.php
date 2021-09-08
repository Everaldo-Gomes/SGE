<?php
$title = 'SGC - Lista';

include_once("../../../routers.php");
include_once("../../../template/top.php");
include_once("../../../database/funcoes_gerais.php");
include_once("../../../database/conexao.php");

//buscar morador pelo id $GET 
// ou pelo CPF $POST que o everaldo fez
if(isset($_GET['id'])){

	$database = new Database();
	$db = $database->getConnection();

	$funcoesBanco = new Funcoes_gerais($db);

	$parametros = "WHERE id = {$_GET['id']}";

	$morador = $funcoesBanco-> lerRegistros('morador', $parametros, "*");

	$recebedor = $morador['recebe'] == 1 ? "checked" : "";
}elseif (isset($_POST['cpf'])) {

	//conferir e redirecionar pra ca o form do everaldo com o cpf
	//talvez o nosso banco tenha um problema pois eu n lembro deter colocado cpf pra ser unico
}

?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>SGC - Editar Morador</title>
	</head>
	<body>
	<link rel="stylesheet" href="<?php echo $bootstrap_css_path ?>">
	<link rel="stylesheet" href="./formEditar.css">
		<form class="formEditar" action="backEditarMorador.php" method="POST">
			<input type="hidden" name="idMoradorEdicao" value="<?php echo($morador['id']);?>">
			<div class="form-group">
				<label for="input_nome">Nome:</label>
				<input id="input_nome" class="form-control" type="text" name="nomeMoradorEdicao" value="<?php echo($morador['nome']);?>">
			</div>

			<div class="form-group">
				<label for="input_cpf">CPF:</label>
				<input id="input_cpf" class="form-control" type="text" name="cpfMoradorEdicao" value="<?php echo($morador['cpf']);?>" placeholder="CPF">
			</div>

			<div class="form-group">
				<label for="input_telefone">Telefone:</label>
				<input id="input_telefone" class="form-control" type="text" name="telefoneMoradorEdicao" value="<?php echo($morador['telefone']);?>" placeholder="Telefone">
			</div>

			<div class="form-group">
				<label for="input_endereco">Endereco:</label>
				<input id="input_endereco" class="form-control"type="text" name="enderecoMoradorEdicao" value="<?php echo($morador['endereco']);?>" placeholder="Endereço">
			</div>
			<div>
				<input id="checkbox_recebedor" type="checkbox" <?php echo($recebedor);?> name="recebedorMoradorEdicao">
				<label for="checkbox_recebedor">Recebedor</label>
			</div>
			<div class="links_btn">
				<button id="botaoSalvar" type="submit" class="btn btn-primary">Salvar</button>
			</div>
		</form>
	</body>
</html>