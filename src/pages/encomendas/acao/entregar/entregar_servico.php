<?php 

include_once "../../../../database/conexao.php";
include_once "../../../../database/funcoes_gerais.php";
include_once "../../../../routers.php";

session_start();

$database = new Database();
$db = $database->getConnection();

$entregar_obj = new funcoes_gerais($db);

/* verifica se clicou no botão entregar ou cancelar */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	
    if (isset($_POST['btn_acao_entregar'])) {

		$id_logado = $_SESSION['morador_logado'][0];;
		
		/* atualiza a encomenda, dizendo que alguém está responsável por entrega-la */
		$entregar_obj->alteraRegistroGeral("UPDATE encomenda set entregador_id = {$id_logado} WHERE id = {$_SESSION['encomenda_id']}");

		/* retira a encomenda da lista de encomendas que podem ser pegas para a entrega */
		$entregar_obj->alteraRegistroGeral("UPDATE encomenda set entregador_pegou = 1 WHERE id = {$_SESSION['encomenda_id']}");

		// confirmação front e back FALTA FAZER 
		$_SESSION['op_status'] = 1;

        // gerando a confirmação de entrega (simulando que o morado que espera a enconmenda marcou que a entrega foi entregue)

        // marca a entrega como entregue   DESCOMENTAR QUANDO O PDF ESTIVER OK
        //$entregar_obj->alteraRegistroGeral("UPDATE encomenda set foi_entregue = 1 WHERE id = {$_SESSION['encomenda_id']}");


        // obtendo algumas info
        //morador, entrega, recebedor (igual aa tela de ação entregar e receber juntas)
        
        
        // gerando o comprovante (PDF)
         require('../../../../fpdf/fpdf.php');
         $pdf = new FPDF('P','mm','B3');
         
         $pdf->AddPage();

         $pdf->SetFont('Arial','B',30);
         $pdf->Cell(100,1,'');
         $pdf->Cell(10,1,'SGE');
         
         $pdf->SetFont('Arial','B',15);
         $pdf->Cell(1,20,'Sistema de Gerenciamento de Encomendas');
         
         // $pdf->Cell(1,30,'Compravante de Entrega');
         
         // $pdf->SetFont('Arial','B',10);
         // $pdf->Cell(1,40,'Gerando em ');

         // $pdf->SetFont('Arial','B',8);
         // $pdf->Cell(10,20,'Entregador: ');
         // $pdf->Cell(10,20,'Recebedor: ');
         // $pdf->Cell(10,20,'Entrega: ');
         
         // $pdf->Cell(10,30,'Código da entrega');
         // $pdf->Cell(10,30,'gerar o código aqui');
         $pdf->Output();
	}

    /* volta para o inicio */
    //header("Location: " . $index_path);
    //exit();
}

/* se não, carrega as informações normalmente */
else {

	/* busca info sobre a encomenda clicada */
	
	$encomenda_info = array();

	$_SESSION['encomenda_info'] = $entregar_obj->lerRegistros("encomenda", "WHERE id = {$_SESSION['encomenda_id']}");
	$_SESSION['destinatario_info'] = $entregar_obj->lerRegistros("morador", "WHERE id = {$_SESSION['encomenda_info'][2]}");

	//unset($_SESSION['encomenda_id']);

	/* redireciona para a página de visualização */
	header("Location: " . $entregar_encomenda_path);
	exit();	
}
?>
