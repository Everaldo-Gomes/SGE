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

/* connecting */
$database = new Database();
$db = $database->getConnection();

/* criando objs */
$recebedor = new Funcoes_gerais($db);
$lista_recebedores = $recebedor->lista_recebedores();
?>

<!-- Inicio tabela -->
<table class="table">
	<thead>
		<tr>
			<th scope="col">#</th>
			<th scope="col">Nome</th>
			<th scope="col">CPF</th>
			<th scope="col">Telefone</th>
			<th scope="col">Endereço</th>
		</tr>
	</thead>
	<tbody>
		
		<!-- Corpo tabela -->
		<?php  
		$qnt_recebedor = 1;
		foreach ($lista_recebedores as $recebedor) {
			
			echo "
			<tr>
			<td>{$qnt_recebedor}</td>
			<td>{$lista_recebedores[$qnt_recebedor-1][1]}</td>
			<td>{$lista_recebedores[$qnt_recebedor-1][2]}</td>
			<td>{$lista_recebedores[$qnt_recebedor-1][3]}</td>
			<td>{$lista_recebedores[$qnt_recebedor-1][4]}</td>
			</tr>
			";
			$qnt_recebedor++;
		}
		?>
	</tbody>
</table>

<script src="./recebedor.js"></script>
<?php include("../../template/bottom.php"); ?>
