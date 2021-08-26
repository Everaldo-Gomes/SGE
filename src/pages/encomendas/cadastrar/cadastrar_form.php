<?php
$title = 'SGC - Encomendas';
include("../../../routers.php");
include("../../../template/top.php");
?>
<head><link rel="stylesheet" href="./cadastrar.css"></head>
<div id="encomenda_cadastrada"></div>
<div class="forms">
	<form action="cadastrar_servico.php" method="POST" name="Form">
		<div class="encomenda_nome">
			<input type="text" name="encomenda_nome_field" size="55" maxlength="30" placeholder="Nome da sua encomenda" required
				   onkeypress="return /[a-z' ']/i.test(event.key)">
		</div>
		<div class="previsao_entrega">
			<label>Previsão para entrega</label>
			<input name="previsao_entrega_field" id="previsao_entrega_id" type="date" data-date-format="YYYY MMMM DD"
				   min="<?php echo date("Y-m-d");?>" required>
		</div>	
		<div class="links_btn">
			<input class="btn btn-primary" type="submit" value="Adicionar morador" onclick="confirm_submit()">
		</div>
	</form>
</button>
</div>
<input id="encomenda_id" type='text' name='aux_field' readonly value="<?php session_start(); echo $_SESSION['encomenda_status'];?>">
<script src="./cadastrar.js"></script>
<?php include("../../../template/bottom.php"); unset($_SESSION['encomenda_status']);?>
