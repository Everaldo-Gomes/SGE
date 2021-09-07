<?php include_once "./routers.php"; ?>

<!DOCTYPE html>

<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="gerenciador de condomínios">
		<meta name="keywords" content="gerenciador de condomínios">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php echo $title; ?></title>
		<link rel="stylesheet" href="<?php echo $bootstrap_css_path; ?>">
		<!-- <link rel="stylesheet" href="<?php echo $bootstrap_js_path; ?>"> -->
		<link rel="stylesheet" href="<?php echo $template_top_path; ?>">
		<link rel="stylesheet" href="<?php echo $template_bottom_path; ?>">
	</head>
	
	<body>
		<header>
			<nav class="menu">
				<div class="logo_img">
					<img src="<?php echo $logo_img_path; ?>" alt="logo " id="logo_img_container">
				</div>
				<div class="slogan">
					<h3 id="slogan">Sem se preocupar, sua encomenda vai chegar</h3>
				</div>
				<div class="menuItem">
					<div class="dropdown">
						<a href="<?php echo $index_path; ?>">
							<button class="dropbtn">Início</button>
						</a>
					</div>
					<div class="dropdown">
						<button class="dropbtn">Moradores</button>
						<div class="dropdown_content">
							<a href="<?php echo $cadastrar_morador_path; ?>">Cadastrar</a>
							<a href="<?php echo $editar_morador_path; ?>">Editar / Excluir</a>
							<a href="<?php echo $listar_morador_path; ?>">Listar</a>
						</div>
					</div>
					<div class="dropdown">
						<button class="dropbtn">Encomendas</button>
						<div class="dropdown_content">
							<a href="<?php echo $cadastrar_encomenda_path;?>">Cadastrar</a>
							<a href="<?php echo $editar_encomenda_path; ?>">Gerenciar</a>
							<a href="<?php echo $historico_encomenda_path; ?>">Histórico</a>
							<a href="<?php echo $recebedore_path; ?>">Recebedores</a>
						</div>
					</div>
					<div class="dropdown">
						<a href="<?php echo $ajuda_path; ?>">
							<button class="dropbtn">Ajuda</button>
						</a>
					</div>
				</div>
			</nav>
		</header>
		<main class="content">
