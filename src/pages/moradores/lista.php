<?php
$title = 'SGC - Lista de moradores';
include_once("../../template/top.php");
include_once("../../routers.php");
include_once("../moradores/buscaMoradores");
?>

<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"> -->

<div class="container">
    <div class="row">
        <div class="col-sm-12">
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
                        <td><?= $moradorRegistrado['id']; ?></td>
                        <td><?= $moradorRegistrado['nome']; ?></td>
                        <td><?= $moradorRegistrado['telefone']; ?></td>
                        <td><?= $moradorRegistrado['endereco']; ?></td>
                        <td><a href="#" class="btn btn-warning" role="button">Editar</span></a></td>
                        <td><a href="deletaMorador.php?id=<?=$moradorRegistrado['id']?>" class="btn btn-danger" role="button">Remover</span></a></a></td>
                    </tr>
                <?php } ?>
            </tbody>
            </table>
        </div>
    </div>
</div>


<?php include("../../template/bottom.php"); ?>