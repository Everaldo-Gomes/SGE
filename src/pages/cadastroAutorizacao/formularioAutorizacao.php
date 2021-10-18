<?php

session_start();

$title = 'SGC - Permição para usuários';
include("../../../routers.php");
include("../../../template/top.php");

include_once "../../classes/AreaDoSiteDAO.php";
include_once "../../database/conexao.php";

$database = new Database();
$areaDoSIteDAO = new AreaDoSiteDAO($database->getConnection());

$listaDeAreas = $areaDoSIteDAO->buscaAreasAtivas();
?>

<head><link rel="stylesheet" href="#"></head>

<div class="forms">
	<form action="./cadastraAutorizacao.php" method="POST">
        <select name="areaConcedidaAcesso" id="areaConcedidaAcesso">
            <?php
                foreach($listaDeAreas as $area){
                    echo "<option value='".$area['id']."'>".$area['nome_pagina']."</option>";
                }
            ?>
            
        </select>

	</form>
</div>