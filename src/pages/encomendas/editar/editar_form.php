<?php
$title = 'SGC - Encomendas';
include("../../../routers.php");
include("../../../template/top.php");
include_once "../../../database/conexao.php";
include_once "../../../database/funcoes_gerais.php";
?>

<input id="encomenda_editada" type='text' readonly value="<?php session_start(); echo $_SESSION['encomenda_editada'];?>">
<head><link rel="stylesheet" href="./editar.css"></head>
<div id="encomenda_aviso"></div>

<?php
session_start();

$database = new Database();
$db = $database->getConnection();

$gerencia_obj = new Funcoes_gerais($db);

/* opção entregas pendentes */
$params = "WHERE foi_entregue = 0 AND excluido = 0 AND cadastrada_morador_id = {$_SESSION['morador_logado'][0]}";
$lista_encomendas = $gerencia_obj->lista_obj('encomenda', $params, '*');


/* opção entregas a fazer  */
$query = "SELECT e.id, e.nome, e.previsao_data_entrega, m.nome, m.endereco 
          FROM encomenda e JOIN morador m ON  e.cadastrada_morador_id = m.id 
          WHERE e.cadastrada_morador_id != {$_SESSION['morador_logado'][0]} AND e.entregador_id = {$_SESSION['morador_logado'][0]}
          AND e.entregador_pegou = 1";

$lista_entregas = $gerencia_obj->lista_itens($query);


/* opção Entregas */
$query = "SELECT * FROM encomenda WHERE cadastrada_morador_id = {$_SESSION['morador_logado'][0]} AND entregador_pegou = 1";
$lista_entregas_recebidas = $gerencia_obj->lista_itens($query);
?>

<div class="btn_acao">
	<table>
		<tr>
			<th><button type='submit' class='btn btn-info' id="btn_encomenda_pendente" name='btn_cancelar_encomenda' value='0' onclick="mostra_esconde_telas(this)">Encomendas pendentes</button></th>
			<th><button type='submit' class='btn btn-info' id="btn_encomenda_entregar" name='btn_cancelar_encomenda' value='1' onclick="mostra_esconde_telas(this)">Entregas à fazer</button></th>
			<th><button type='submit' class='btn btn-info' id="btn_encomenda_recebida" name='btn_cancelar_encomenda' value='2' onclick="mostra_esconde_telas(this)">Entregas</button></th>
		</tr>
	</table>
</div> 
<div class="encomenda_pendente">
	<table class="table">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Códgio</th>
				<th scope="col">Nome</th>
				<th scope="col">Data de cadastro</th>
				<th scope="col">Previsão Entrega</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
			$qnt_encomenda = 1;
			foreach ($lista_encomendas as $encomenda) {	
				echo "
			<tr>
			<td>{$qnt_encomenda}</td>
			<td>{$lista_encomendas[$qnt_encomenda-1][0]}</td>
			<td>{$lista_encomendas[$qnt_encomenda-1][1]}</td>
			<td>{$lista_encomendas[$qnt_encomenda-1][4]}</td>
			<td>{$lista_encomendas[$qnt_encomenda-1][5]}</td>
            <td>
                <form action='{$editar_encomenda_servico_path}' method='POST' name='Form'>	
                    <button type='submit' class='btn btn-info' name='btn_editar' value='{$lista_encomendas[$qnt_encomenda-1][0]}'>Editar</button>
                    <button type='submit' onclick='confirm_submit()' class='btn btn-danger' name='btn_cancelar' value='{$lista_encomendas[$qnt_encomenda-1][0]}'>Cancelar</button>
                </form>
            </td> 
			<td><a href='/SGE/src/pages/encomendas/acao/entregar/entregar_form.php?id={$lista_encomendas[$qnt_encomenda-1][0]}' class='btn btn-primary' role='button'>Entregar</span></a></td>
			</tr>
				";
				$qnt_encomenda++;
			}
			?>
		</tbody>
	</table>
</div>
<div class="encomenda_entregar">
	<table class="table">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Encomenda</th>
				<th scope="col">Destinatário</th>
				<th scope="col">Endereço</th>
				<th scope="col">Previsão Entrega</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
			$qnt_encomenda = 1;
			foreach ($lista_entregas as $encomenda) {	
				echo "
				<tr>
				<td>{$qnt_encomenda}</td>
				<td>{$lista_entregas[$qnt_encomenda-1][1]}</td>
				<td>{$lista_entregas[$qnt_encomenda-1][3]}</td>
				<td>{$lista_entregas[$qnt_encomenda-1][4]}</td>
				<td>{$lista_entregas[$qnt_encomenda-1][2]}</td>
				<td>
                    <form action='{$editar_encomenda_entregar_servico_path}' method='POST' name='Form'>	
                        <button type='submit' class='btn btn-warning' name='btn_cancelar_entrega' value='{$lista_entregas[$qnt_encomenda-1][0]}'>
                            Cancelar entrega
                        </button>
                    </form>
                </td>
			    </tr>	
				";
				$qnt_encomenda++;
			}
			?>
		</tbody>
	</table>
</div>
<div class="encomenda_recebida">
	<table class="table">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Encomenda</th>
				<th scope="col">Data Cadastro</th>
				<th scope="col">Previsão Entrega</th>
				<th scope="col">Açeõs</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$qnt_encomenda = 1;
			foreach ($lista_entregas_recebidas as $encomenda) {	
				echo "
				<tr>
				<td>{$qnt_encomenda}</td>
				<td>{$lista_entregas_recebidas[$qnt_encomenda-1][1]}</td>
				<td>{$lista_entregas_recebidas[$qnt_encomenda-1][4]}</td>
				<td>{$lista_entregas_recebidas[$qnt_encomenda-1][5]}</td>
				<td> " .
					 
					 // usando operador ternário
					 
					 ($lista_entregas_recebidas[$qnt_encomenda-1][6] == 1 ?
					  
					  ' <form action=\'' . $gera_comprovante_entrega_path . '\' method=\'POST\' name=\'Form\' target=\'_blank\'>
                            <button type=\'submit\' class=\'btn btn-warning\' name=\'btn_gera_comprovante_entrega\' value=\'' . $lista_entregas_recebidas[$qnt_encomenda-1][0] . '\'>
                               Comprovante de entrega
                            </button>
                        </form>'
						 
					: //else
					  
					  ' <form action=\'' . $confirma_entrega_servico_path . '\' method=\'POST\' name=\'Form\'>
					        <button type=\'submit\' class=\'btn btn-success\' name=\'btn_confirma_entrega\' value=\'' . $lista_entregas_recebidas[$qnt_encomenda-1][0] . '\'>
                               Marcar como entregue
                           </button>
					    </form>') . "
                </td>
			    </tr>
					  ";
				$qnt_encomenda++;
			}
			?>
		</tbody>
	</table>
</div>
<input id="encomenda_status" type='text' readonly value="<?php session_start(); echo $_SESSION['encomenda_cancelada'];?>">
<script src="./editar.js"></script>
<?php include("../../../template/bottom.php"); unset($_SESSION['encomenda_cancelada']); unset($_SESSION['encomenda_editada']);?>
