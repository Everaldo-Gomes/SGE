<?php
//pra ca vem o id da encomenda que vai ser entregue por $_GET

include_once "../../../../database/conexao.php";
include_once "../../../../database/funcoes_gerais.php";
include_once "../../../../routers.php";

include_once "../../../../template/top.php";

$database = new Database();
$db = $database->getConnection();

$funcoesBanco = new Funcoes_gerais($db);

$parametros = " recebe = 1 ";

$moradoresAtivos = $funcoesBanco-> lerRegistrosMoradoresAtivosInativos('morador', false);
$entregadores = $funcoesBanco -> lerRegistrosMoradoresAtivosInativos('morador', false, $parametros);

//echo("<pre>");
//print_r($moradoresAtivos);
//echo("</pre>");
// echo("<pre>");
// print_r($entregadores);
// echo("</pre>");
?>

<!DOCTYPE html>

<html lang="pt-bt">
    <div class="container">
        <div class="mt-5 row">
            <div class="mt-5 col-sm-12">
                <form action="confirmarEntrega.php" method="post">
                    <div class="form-group">
                        <label for="select_entregador">Entregador:</label>
                        <select class="form-control" name="" id="select_entregador" required>
                            <?php
                                for ($i=0; $i < count($entregadores) ; $i++) { 
                                    echo("<option value='{$entregadores[$i]['0']}'>{$entregadores[$i]['1']}</option>");
                                }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="select_recebedor">Recebedor:</label>
                        <select class="form-control" name="" id="select_entregador" required>
                            <?php
                                for ($i=0; $i < count($moradoresAtivos) ; $i++) { 
                                    echo("<option value='{$moradoresAtivos[$i]['0']}'>{$moradoresAtivos[$i]['1']}</option>");
                                }
                            ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="input_data_entrega"></label>
                        <input name="" id="input_data_entrega" type="date" required>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</html>






<?php include_once "../../../../template/bottom.php";?>