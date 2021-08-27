<?php
$title = 'SGC - Encomendas';
include("../../../routers.php");
include("../../../template/top.php");
include_once "../../../database/conexao.php";
include_once "../../../database/funcoes_gerais.php";
?>
<head><link rel="stylesheet" href="./editar.css"></head>
<div id="encomenda_excluida"></div>
<h3 id="titulo">Encomendas pendentes</h3>

<?php

$database = new Database();
$db = $database->getConnection();

$gerencia_obj = new Funcoes_gerais($db);

$params = 'WHERE foi_entregue = 0 AND excluido = 0';
$lista_encomendas = $gerencia_obj->lista_obj('encomenda', $params, '*');
?>

<!-- table -->
<table class="table">
	<thead>
		<tr>
			<th scope="col">#</th>
			<th scope="col">Códgio</th>
			<th scope="col">Nome</th>
			<th scope="col">Data de cadastro</th>
			<th scope="col">Previsão Entrega</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$qnt_encomenda = 1;
		foreach ($lista_encomendas as $encomenda) {	
			echo "
			<tr>
			<td>{$qnt_encomenda}</td>
			<td>{$lista_encomendas[$qnt_encomenda-1][0]}</td>
			<td>{$lista_encomendas[$qnt_encomenda-1][1]}</td>
			<td>{$lista_encomendas[$qnt_encomenda-1][3]}</td>
			<td>{$lista_encomendas[$qnt_encomenda-1][4]}</td>
            <td>
                <form action='{$editar_encomenda_servico_path}' method='POST' name='Form'>	
                    <button type='submit' onclick='confirm_submit()' class='btn btn-info' name='btn_editar' value='{$lista_encomendas[$qnt_encomenda-1][0]}'>Editar</button>
                    <button type='submit' onclick='confirm_submit()' class='btn btn-danger' name='btn_cancelar' value='{$lista_encomendas[$qnt_encomenda-1][0]}'>Cancelar</button>
                </form>
            </td>            
			</tr>
			";
			$qnt_encomenda++;
		}
		?>
	</tbody>
</table>
<input id="encomenda_status" type='text' name='aux_field' readonly value="<?php session_start(); echo $_SESSION['encomenda_cancelada'];?>">
<script src="./editar.js"></script>
<?php include("../../../template/bottom.php"); unset($_SESSION['encomenda_cancelada']);?>
