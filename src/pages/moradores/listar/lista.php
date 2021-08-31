<?php
$title = 'SGC - Lista';

include_once("../../../routers.php");
include_once("../../../template/top.php");
include_once("../../../database/funcoes_gerais.php");
include_once("../../../database/conexao.php");

$database = new Database();
$db = $database->getConnection();

$funcoesBanco = new Funcoes_gerais($db);

$moradores = $funcoesBanco-> lerRegistrosMoradoresAtivosInativos('morador', false);

?>



<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

<div class="container">
    <div class="mt-5 row">
        <div class="mt-5 col-sm-12">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Numero</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Endereco</th>
                    <th>Editar</th>
                    <th>Remover</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($moradores as $moradorRegistrado){ ?>
                    <tr>
                        <td><?= $moradorRegistrado['0']; ?></td>
                        <td><?= $moradorRegistrado['1']; ?></td>
                        <td><?= $moradorRegistrado['3']; ?></td>
                        <td><?= $moradorRegistrado['4']; ?></td>
                        <td><a href="#" class="btn btn-warning" role="button">Editar</span></a></td>
                        <td><a href="deletaMorador.php?id=<?=$moradorRegistrado['0']?>" class="btn btn-danger" role="button">Remover</span></a></a></td>
                    </tr>
                <?php } ?>
            </tbody>
            </table>
        </div>
    </div>
</div>


<?php include("../../template/bottom.php"); ?>