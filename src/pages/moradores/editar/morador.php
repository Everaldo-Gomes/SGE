<?php
$title = 'SGC - Morador';
include("../../../routers.php");
include("../../../template/top.php");
session_start(); 
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="<?php echo $bootstrap_css_path ?>">
<link rel="stylesheet" href="./morador.css">

<div id="morador_edita_exclui"></div>
<div class="forms">
	<form action="editar.php" method="POST" name="Form">	
		<div class="morador_nome">
			<input id="nome_id" type="text" name="nome_field" size="55" maxlength="30" placeholder="Nome" value=" " required
				   onkeypress="return /[a-z' ']/i.test(event.key)">
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
				   onkeypress="return /[a-z' ']/i.test(event.key)">
		</div>
		<div class="morador_password">
			<input id="password_id" type="password" name="password_field" size="55" maxlength="8" placeholder="Senha" value=" " required
				   onkeypress="return /[a-z0-9]/i.test(event.key)">
		</div>
		<div class="morador_recebe_encomenda">
			<input type="checkbox" id="recebe_encomenda_id" name="recebe_encomenda_nome">
			<label for="recebe_encomenda">Recebe Encomenda ?</label>
		</div>
		<div class="links_btn">
			<input class="pesquisa_morador btn btn-primary" type="submit" value="Pesquisar Morador" name="btn_pesquisa_cpf" id="pesquisa_btn_id">
			<input class="edita_morador btn btn-warning" type="submit" value="Editar morador" name="btn_edita_morador">
			<input class="exclui_morador btn btn-danger" type="submit" value="Excluir morador" name="btn_exclui_morador">
		</div>
	</form>
</div>

<input id="aux_nome"     type='text' name='aux_field' readonly value="<?php echo $_SESSION['field_info'][1];?>">
<input id="aux_cpf"      type='text' name='aux_field' readonly value="<?php echo $_SESSION['field_info'][2];?>">
<input id="aux_phone"    type='text' name='aux_field' readonly value="<?php echo $_SESSION['field_info'][3];?>">
<input id="aux_endereco" type='text' name='aux_field' readonly value="<?php echo $_SESSION['field_info'][4];?>">
<input id="aux_recebe"   type='text' name='aux_field' readonly value="<?php echo $_SESSION['field_info'][5];?>">
<input id="aux_password" type='text' name='aux_field' readonly value="<?php echo $_SESSION['field_info'][7];?>">
<input id="recebedor_id" type='text' name='recebedor_id_field' readonly value="<?php echo $_SESSION['recebedor_id'];?>">
<input id="morador_status_id" type='text' readonly value="<?php echo $_SESSION['morador_status'];?>">

<script>
 var hidden_recebedor_id = document.getElementById('recebedor_id').value;
 if (hidden_recebedor_id > 0) {
	 document.getElementById("cpf_id").value = hidden_recebedor_id;
	 document.getElementById("pesquisa_btn_id").click();
 }
</script>

<?php include("../../../template/bottom.php"); unset($_SESSION['field_info']); unset($_SESSION['recebedor_id']); unset($_SESSION['morador_status']);?>
<script src="./morador.js"></script>

