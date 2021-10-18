<?php
	
	session_start();

	$title = 'SGC - Histórico';
	include("../../routers.php");
	include("../../template/top.php");
	include_once "../../classes/HistoricoEntregaDAO.php";
	include_once "../../database/conexao.php";

	$database = new Database();
	$historicoEntregaDAO = new HistoricoEntregaDAO($database->getConnection());

	$morador_logado_id = $_SESSION['morador_logado'][0];




	$lista_entregas = $historicoEntregaDAO -> listaHistoricoEntregas("recebedor.id = $morador_logado_id OR entregador.id = $morador_logado_id");
?>
<head><link rel="stylesheet" href="./historico.css"></head>


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
		foreach ($lista_entregas as $key => $value) {
			echo "<tr>";
			foreach($value as $key => $teste){
				echo "<td>{$teste}</td>";
			}
			echo "</tr>";
		}
		?>
	</tbody>
</table>


<script src="./historico.js"></script>
<?php include("../../template/bottom.php"); ?>
