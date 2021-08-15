<?php include_once "../routers.php"; ?>

<!DOCTYPE html>

<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="gerenciador de condomínios">
		<meta name="keywords" content="gerenciador de condomínios">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php echo $title; ?></title>
		<link rel="stylesheet" href="/SGE/src/public/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="/SGE/src/public/css/top.css">
		<link rel="stylesheet" href="/SGE/src/public/css/bottom.css">
	</head>
	
	<body>
		<header>
			<nav class="menu">
				<div class="logo_img">
					<img src="/SGE/src/public/img/SGE_logo.svg" alt="logo " id="logo_img_container">
				</div>
				<div class="slogan">
					<h3 id="slogan">Sem se preocupar, sua encomenda vai chegar</h3>
				</div>
				<div class="menuItem">
					<div class="dropdown">
						<a href="/SGE/src/index.php">
							<button class="dropbtn">Início</button>
						</a>
					</div>
					<div class="dropdown">
						<button class="dropbtn">Moradores</button>
						<div class="dropdown_content">
							<a href="#">Cadastrar</a>
							<a href="#">Editar</a>
						</div>
					</div>
					<div class="dropdown">
						<button class="dropbtn">Encomendas</button>
						<div class="dropdown_content">
							<a href="#">Cadastrar</a>
							<a href="#">Editar</a>
						</div>
					</div>
					<div class="dropdown">
						<a href="/SGE/src/index.php">
							<button class="dropbtn">Ajuda</button>
						</a>
					</div>
				</div>
				<!-- <li><a href="/SGE/src/index.php">Home</a></li>					
					 <li class="gerenciar_moradores"> <a href="/SGE/src/pages/gerenciar_moradores.php">Gerenciar Moradores</a></li>
					 <li class="gerenciar_encomendas"><a href="/SGE/src/pages/gerenciar_encomendas.php">Gerenciar Encomendas</a></li> -->
				<!-- <li><a href="/src/pages/cadastrar_encomendas.php">Cadastrar Encomendas</a></li>
					 <li><a href="/src/pages/minhas_encomendas.php">Minha Encomendas</a></li> -->
				<!-- <li><a href="/SGE/src/pages/Ajuda.php">Ajuda</a></li> -->
			</nav>
			
		</header>
		<main class="content">
