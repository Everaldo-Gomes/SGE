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

<div class="container">
    <div class="mt-5 row">
        <div class="mt-5 col-sm-12">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">CPF</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Endereco</th>
                    <th>Recebedor</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($moradores as $moradorRegistrado){ ?>
                    <tr>
                        <td><?= $moradorRegistrado['2']; ?></td>
                        <td><?= $moradorRegistrado['1']; ?></td>
                        <td><?= $moradorRegistrado['3']; ?></td>
                        <td><?= $moradorRegistrado['4']; ?></td>
                        <td><?php echo($moradorRegistrado['5'] == 0 ? "Não" : "Sim");?></td>
                        <td>
                            <a href="/SGE/src/pages/moradores/editar/formEditar.php?id=<?=$moradorRegistrado['0']?>" class="btn btn-warning" role="button">Editar</span></a>
                            <a href="/SGE/src/pages/moradores/editar/removerMorador.php?id=<?=$moradorRegistrado['0']?>" class="btn btn-danger" role="button">Remover</span></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
            </table>
        </div>
    </div>
</div>


<?php include_once("../../../template/bottom.php"); ?>