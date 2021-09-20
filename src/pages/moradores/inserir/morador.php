<?php
$title = 'SGC - Morador';
include("../../../routers.php");
include("../../../template/top.php");
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="<?php echo $bootstrap_css_path ?>">
<link rel="stylesheet" href="./morador.css">
           
<div id="morador_cadastrado"></div>
<div class="forms">
	<form action="insert.php" method="POST" name="Form">	
		<div class="morador_nome">
			<input type="text" name="nome_field" size="55" maxlength="30" placeholder="Nome" required
				   onkeypress="return /[a-z]/i.test(event.key)">
		</div>
		<div class="morador_cpf">
			<input type="text" name="cpf_field" size="55" maxlength="11" placeholder="CPF" required
				   onkeypress="return /[0-9]/i.test(event.key)">
		</div>
		<div class="morador_telefone">
			<input id="phone_id" type="text" name="telefone_field" size="55" maxlength="13" placeholder="Telefone"
					   onkeypress="return /[0-9]/i.test(event.key)">
		</div>
		<div class="morador_endereco">
			<input type="text" name="endereco_field" size="55" maxlength="30" placeholder="Endereço"
				   onkeypress="return /[a-z' ']/i.test(event.key)">
		</div>
           <div class="morador_password">
			<input id="nome_id" type="password" name="password_field" size="55" maxlength="8" placeholder="Senha" required
				   onkeypress="return /[a-z0-9]/i.test(event.key)">
		</div>
		<div>
			<input type="checkbox" id="recebe_encomenda_id" name="recebe_encomenda_nome">
			<label for="recebe_encomenda">Recebe Encomenda ?</label>
		</div>
		<div class="links_btn">
			<input class="btn btn-primary" type="submit" value="Adicionar morador" onclick="confirm_submit()">
		</div>
	</form>
</button>
</div>

<input id="morador_status_id" type='text' readonly value="<?php session_start(); echo $_SESSION['morador_status'];?>">
<script src="./morador.js"></script>
<?php include("../../../template/bottom.php"); unset($_SESSION['morador_status']);?>
