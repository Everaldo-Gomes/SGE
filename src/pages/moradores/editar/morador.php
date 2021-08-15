<?php
$title = 'SGC - Morador';
include("../../../routers.php");
include("../../../template/top.php");
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="<?php echo $bootstrap_css_path ?>">
<link rel="stylesheet" href="./morador.css">

<div class="editar_morador edited">
	<p>Morador Editado!</p>
</div>

<div class="forms">
	<form action="editar.php" method="POST" name="Form">	
		<div class="morador_nome">
			<input id="nome_id" type="text" name="nome_field" size="55" maxlength="30" placeholder="Nome" value=" " required
				   onkeypress="return /[a-z]/i.test(event.key)">
		</div>
		<div class="morador_cpf">
			<input id="cpf_id" type="text" name="cpf_field" size="55" maxlength="11" placeholder="CPF" required
				   onkeypress="return /[0-9]/i.test(event.key)">
		</div>
		<div class="morador_telefone">
			<input id="phone_id" type="text" name="telefone_field" size="55" maxlength="13" placeholder="Telefone"
					   onkeypress="return /[0-9]/i.test(event.key)">
		</div>
		<div class="morador_endereco">
			<input id="endereco_id" type="text" name="endereco_field" size="55" maxlength="30" placeholder="Endereço"
				   onkeypress="return /[a-z]/i.test(event.key)">
		</div>
		<div class="links_btn">
			<input class="pesquisa_morador btn btn-primary" type="submit" value="Pesquisar Morador">
			<input class="edita_morador btn btn-warning" type="submit" value="Editar morador" onclick="">
			<input class="exclui_morador btn btn-danger" type="submit" value="Excluir morador" onclick="">
		</div>
	</form>
</div>

<!-- aux -->
<input id="aux_nome"     type='text' name='aux_field' readonly value="<?php session_start(); echo $_SESSION['field_info'][1];?>">
<input id="aux_cpf"      type='text' name='aux_field' readonly value="<?php echo $_SESSION['field_info'][2];?>">
<input id="aux_phone"    type='text' name='aux_field' readonly value="<?php echo $_SESSION['field_info'][3];?>">
<input id="aux_endereco" type='text' name='aux_field' readonly value="<?php echo $_SESSION['field_info'][4];?>">
<?php include("../../../template/bottom.php"); unset($_SESSION['field_info']); ?>
<script src="./morador.js"></script>
