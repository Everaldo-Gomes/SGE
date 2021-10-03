<?php
$title = 'SGC - Recebedores';
include("../../routers.php");
include("../../template/top.php");
include_once "../../database/conexao.php";
include_once "../../database/funcoes_gerais.php";
?>
<head>
	<link rel="stylesheet" href="./recebedor.css">
</head>

<?php 

$database = new Database();
$db = $database->getConnection();

$recebedor = new Funcoes_gerais($db);

$query = "SELECT 
              morador.nome, morador.cpf, morador.telefone, morador.endereco, entregas.qnt_entregas 
          FROM 
              morador morador 
          LEFT OUTER JOIN 
              entrega_realizada entregas ON morador.id = entregas.morador_entrega_id
          WHERE 
              morador.recebe = 1 AND morador.excluido = 0";

$lista_recebedores = $recebedor->selectRegistroGeral($query);
$valor_base = $recebedor->selectRegistroGeral("SELECT valor_base_por_entrega FROM valor_entrega");
?>

<table class="table">
	<thead>
		<tr>
			<th scope="col">#</th>
			<th scope="col">Nome</th>
			<th scope="col">CPF</th>
			<th scope="col">Telefone</th>
			<th scope="col">Endereço</th>
			<th scope="col">Valor Por entrega</th>
		</tr>
	</thead>
	<tbody>
		<?php
		session_start();
		unset($_SESSION['recebedor_id']);
		
		$qnt_recebedor = 1;
		foreach ($lista_recebedores as $recebedor) {	
			echo "
			<tr>
			<td>{$qnt_recebedor}</td>
			<td>{$lista_recebedores[$qnt_recebedor-1][0]}</td>
			<td>{$lista_recebedores[$qnt_recebedor-1][1]}</td>
			<td>{$lista_recebedores[$qnt_recebedor-1][2]}</td>
			<td>{$lista_recebedores[$qnt_recebedor-1][3]}</td>
			<td> R$ " . ($valor_base[0][0] + ($lista_recebedores[$qnt_recebedor-1][4] * 0.03)) . "</td>
            <td>
                <form action='/SGE/src/pages/moradores/editar/editar.php' method='POST' name='Form'>	
                    <button type='submit' class='btn btn-info' name='btn_recebedor_id' value='{$lista_recebedores[$qnt_recebedor-1][1]}'>Editar
                    </button>
                </form>
            </td>
			</tr>
			";
			$qnt_recebedor++;
		}
		?>
	</tbody>
</table>

<script src="./recebedor.js"></script>
<?php include("../../template/bottom.php"); ?>
