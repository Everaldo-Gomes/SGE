<head>
	<link rel="stylesheet" href="./morador.css">
</head>

<?php $title = 'SGC - Morador'; include("../../template/top.php"); ?>

<div class="container">
	<form action="<?php echo "insert.php"?>" method="POST">	
		<div class="morador_nome">
			<input type="text" name="nome_field" size="55" maxlength="30" placeholder="Nome" required>
		</div>
		<div class="morador_telefone">
			<input id="phone_id" type="text" name="telefone_field" size="55" maxlength="13" placeholder="Telefone">
		</div>
		<div class="morador_endereco">
			<input type="text" name="endereco_field" size="55" maxlength="30" placeholder="Endereço">
		</div>
		<div class="links_btn">
			<div class="register_btn"><input type="submit" value="Adicionar morador"></div>	
		</div>
	</form>	
</div>

<script src="./morador.js"></script>
<?php include("../../template/bottom.php"); ?>
