<?php
$title = 'SGC - Recebedores';
include("../../routers.php");
include("../../template/top.php");
include_once "../../database/conexao.php";
include_once "../../database/funcoes_gerais.php";
?>
<head><link rel="stylesheet" href="./historico.css"></head>

<?php

$database = new Database();
$db = $database->getConnection();

$historico = new Funcoes_gerais($db);
?>


<table class="table">
	<thead>
		<tr>
			<th scope="col">#</th>
			<th scope="col">Rebido por</th>
			<th scope="col">Entregador</th>
			<th scope="col">Data</th>
			<th scope="col">encomenda</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$qnt_recebedor = 1;
		foreach ($lista_recebedores as $recebedor) {	
			echo "
			";			
		}
		?>
	</tbody>
</table>


<script src="./historico.js"></script>
<?php include("../../template/bottom.php"); ?>
