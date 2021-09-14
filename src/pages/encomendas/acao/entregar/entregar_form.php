<?php

$title = 'SGC - Entrengar';
include("../../../../routers.php");
include("../../../../template/top.php");

session_start();
//o array $_SESSION['encomenda_info'] tem todas as info sobre a encomenda que foram obtidas quando foi clicado na encomenda 
?>

<head><link rel="stylesheet" href="./entregar.css"></head>

<div class="encomenda_info">
	<div class="encomenda_box">
		<h3 class="e_info">Sobre a encomenda </br> e seu destinatário</h3>
		<hr class="hr_top">
		<label>
			<div class="e_info">
				Destinatário </br>
				<?php echo $_SESSION['destinatario_info'][1]; ?>
			</div></br>
			<div class="e_info">
				Telefone </br>
				<?php echo $_SESSION['destinatario_info'][3]; ?>
			</div></br>
			<div class="e_info">
				Endereço </br>
				<?php echo $_SESSION['destinatario_info'][4]; ?>
			</div></br>
			<div class="e_info">
				Encomenda </br>
				<?php echo $_SESSION['encomenda_info'][1]; ?>
			</div></br>
			<div class="e_info">
				Data entrega </br>
				<?php echo $_SESSION['encomenda_info'][5]; ?>
			</div></br>
		</label>
	</div>
	<div class="btns">
		<form action="entregar_servico.php" method="POST">
			<button type='submit' class='encomenda btn btn-success' name='btn_acao_entregar' value='0'>Entregar</button>
			<button type='submit' class='encomenda btn btn-danger' name='btn_acao_cancelar' value='1'>Cancelar</button>
		</form>
	</div>
</div>


<script src="./entregar.js"></script>
<?php include("../../../../template/bottom.php"); unset($_SESSION['encomenda_info']); unset($_SESSION['destinatario_info']);?>





<?php
//------------------------------------- IMPORTANTE ------------------------------------

// código abaixo foi removido, porque o que foi posto aqui não é o propósito da página

//-------------------------------------------------------------------------------------


//pra ca vem o id da encomenda que vai ser entregue por $_GET

/* $funcoesBanco = new Funcoes_gerais($db);
 * 
 * $parametros = " recebe = 1 ";
 * 
 * $moradoresAtivos = $funcoesBanco-> lerRegistrosMoradoresAtivosInativos('morador', false);
 * $entregadores = $funcoesBanco -> lerRegistrosMoradoresAtivosInativos('morador', false, $parametros); */

//echo("<pre>");
//print_r($moradoresAtivos);
//echo("</pre>");
// echo("<pre>");
// print_r($entregadores);
// echo("</pre>");
?>

<!-- <!DOCTYPE html>

	 <html lang="pt-bt">
     <div class="container">
	 <div class="mt-5 row">
	 <div class="mt-5 col-sm-12">
	 <form action="confirmarEntrega.php" method="post">
	 <div class="form-group">
	 <label for="select_entregador">Entregador:</label>
	 <select class="form-control" name="" id="select_entregador" required>
	 <?php
	 for ($i=0; $i < count($entregadores) ; $i++) { 
	 echo("<option value='{$entregadores[$i]['0']}'>{$entregadores[$i]['1']}</option>");
	 }
	 ?>
	 </select>
	 </div>

	 <div class="form-group">
	 <label for="select_recebedor">Recebedor:</label>
	 <select class="form-control" name="" id="select_entregador" required>
	 <?php
	 for ($i=0; $i < count($moradoresAtivos) ; $i++) { 
	 echo("<option value='{$moradoresAtivos[$i]['0']}'>{$moradoresAtivos[$i]['1']}</option>");
	 }
	 ?>
	 </select>
	 </div>
	 
	 <div class="form-group">
	 <label for="input_data_entrega"></label>
	 <input name="" id="input_data_entrega" type="date" required>
	 </div>
	 
	 </form>
	 </div>
	 </div>
     </div>
	 </html>
   ---------------------------------------------------------------------------------->
