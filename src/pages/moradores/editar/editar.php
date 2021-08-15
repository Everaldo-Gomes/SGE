<?php

include_once "../../../database/conexao.php";
include_once "../../../database/funcoes_gerais.php";
include_once "../../../routers.php";

/* connecting */
$database = new Database();
$db = $database->getConnection();

/* morador obj */
$morador = new Funcoes_gerais($db);

/* forms */
$nome     = $_POST['nome_field'];
$cpf      = $_POST['cpf_field'];
$telefone = $_POST['telefone_field'];
$endereco = $_POST['endereco_field'];
$arrayDados = array($nome, $cpf, $telefone, $endereco);

$cpf = 1; /* APAGAR QUANDO O ESTIVER PRONTO */

/* conferiindo se o cpf existe */
$parametros = "WHERE cpf = '{$cpf}'";
$arrayResultado = $morador->lerRegistros('morador', $parametros, '*');

/* 2 é a coluna do cpf
   se achar o cpf, carrega as informações daquele morador nos formulários */

if ($arrayResultado[2] != '') {
	
	
}
else {
	/* mostrar aviso que não achou o morador */
}
?>

<script type="text/javascript">var a = "<?= $arrayResultado ?>";</script>
<script src="./morador.js"></script>

<!-- if ($nome !== " " && $cpf !== " ") {
	 
	 /* verify if the name is already been taken */
	 //$exist = 0 //NEED TO CHANGE

	 //if ($exist) {
	 
	 /* warning morador already exist */
	 //}
	 //else { /* set morador's name */
	 $fields = 'nome, cpf, telefone, endereco';
	 $morador->gravarArrayNoBanco('morador', $fields, $arrayDados);

	 sleep(1.5);
	 
	 /* stay in the same page */
	 header("Location: " . $add_morador);
	 exit();
	 //}
	 }
	 else {
	 /* show   an error */
	 } -->


<!-- <script type="text/javascript">

	 var jArray = <?php echo json_encode($phpArray); ?>;

	 for(var i=0; i<jArray.length; i++){
     alert(jArray[i]);
	 }
	 </script>
	 <script src="./morador.js"></script> -->
