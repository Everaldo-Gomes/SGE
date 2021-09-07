<?php

$title = 'SGC - Receber';
include("../../../../routers.php");
include("../../../../template/top.php");
?>

<head><link rel="stylesheet" href="./receber.css"></head>


<div class="encomenda_info">
	<div class="encomenda_box">
		<h3>Sobre a encomenda</h3>
		<hr>
		<label>
			Nome: </br>
			<div class="e_info">slkdjf</div></br>
			Data Entrega: </br>
			<div class="e_info">slkdjf</div></br>
			Status: </br>
			<div class="e_info">slkdjf</div></br>
		</label>
	</div>
	<div class="entregador_info">
		<h3>Sobre o entregador</h3>
		<hr>
		Entregador </br>
		<div class="e_info">slkdjf</div></br>
		Endereço </br>
		<div class="e_info">slkdjf</div></br>
		Entregas Realizadas </br>
		<div class="e_info">slkdjf</div></br>
	</div>
</div>


<script src="./receber.js"></script>
<?php include("../../../../template/bottom.php"); unset($_SESSION['encomenda_id']);?>


<?php


session_start();	
echo $_SESSION['encomenda_id'];



?>
