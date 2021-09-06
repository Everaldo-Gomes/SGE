<?php
$title = 'SGC - Home';
include("./template/top.php");
include("../../routers.php");
include('./index_servico.php');
?>

<link rel="stylesheet" href="/SGE/src/public/css/index.css">

<div class="container_info">
	<aside class="encomenda_entregar">	
		<p id="titulo_entregar">Disponíveis para a entrega</p>
		<?php echo carrega_entregar();?>
	</aside>
	<aside class="encomenda_receber">
		<p id="titulo_receber">Encomendas a receber</p>
		<?php echo carrega_receber();?>
	</aside>
</div>

<?php include("./template/bottom.php"); ?>
