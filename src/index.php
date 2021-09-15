<?php
$title = 'SGC - Home';
include("./template/top.php");
include("../../routers.php");
include('./index_servico.php');

session_start();
?>

<link rel="stylesheet" href="/SGE/src/public/css/index.css">

<div id="entregar_status"></div>
	
<div class="container_info">
	<aside class="encomenda_entregar">	
		<p id="titulo_entregar">Disponíveis para a entrega</p>
		<?php carrega_itens('!=', 0);?>
	</aside>
	<aside class="encomenda_receber">
		<p id="titulo_receber">Encomendas a receber</p>
		<?php carrega_itens('=', 1);?>
	</aside>
</div>

<input id="encomenda_status_id" type='text' readonly value="<?php echo $_SESSION['op_status'];?>">
<script src="./public/js/index.js"></script>
<?php include("./template/bottom.php"); unset($_SESSION['op_status']);?>
