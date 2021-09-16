<?php
$title = 'SGC - Login';
include("../../routers.php");
include("../../template/top.php");
?>

<head><link rel="stylesheet" href="./login.css"></head>

<div class="forms">
	<form action="login_servico.php" method="POST" name="Form">
		<div class="morador_cpf">
			<input id="cpf_id" type="text" name="cpf_field" size="55" maxlength="11" placeholder="CPF" required
				   onkeypress="return /[0-9]/i.test(event.key)">
		</div>
		<div class="morador_nome">
			<input id="nome_id" type="password" name="password_field" size="55" maxlength="8" placeholder="Senha" required
				   onkeypress="return /[a-z]/i.test(event.key)">
		</div>
		<div class="links_btn">
			<label>
				<p><a href="#">Esqueci minha senha</a></p>
			</label>
			<input class="pesquisa_morador btn btn-primary" type="submit" value="Entrar" name="btn_login_name">
		</div>
	</form>
</div>

<script src="./login.js"></script>
<?php include("../../template/bottom.php"); ?>
