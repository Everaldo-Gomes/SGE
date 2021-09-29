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
        $_SESSION['encomenda_info'] = $entregar_obj->lerRegistros("encomenda", "WHERE id = {$_SESSION['encomenda_id']}");
        $_SESSION['destinatario_info'] = $entregar_obj->lerRegistros("morador", "WHERE id = {$_SESSION['encomenda_info'][2]}");
        $_SESSION['entregador_info'] = $entregar_obj->lerRegistros("morador", "WHERE id = {$_SESSION['encomenda_info'][3]}");
        
        // gerando o comprovante (PDF)
         require('../../../../fpdf/fpdf.php');

         // config a página  array(largura x altura) em milímetro (mm)
         $pdf = new FPDF('P','mm', array(80,130));
         $pdf->AddPage();

         // config título
         $pdf->SetFont('Arial','B',17);
         $pdf->Cell(20,0,'');
         $pdf->Cell(-20,1,'SGE');

         $pdf->SetFont('Arial','B',7);
         $pdf->Cell(12,10,'Sistema de Gerenciamento de Encomendas');
         $pdf->Cell(-20,20,'Compravante de Entrega');
         
         // config corpo
         // entregador
         $pdf->SetFont('Arial','B',9);
         $pdf->Cell(5,40,'Sobre o entregador');
         $pdf->SetFont('Arial','',8);
         $pdf->Cell(10,50,'Nome:');
         $pdf->Cell(-10,50, $_SESSION['entregador_info'][1]);
         $pdf->Cell(15,60,'Telefone:');
         $pdf->Cell(-15,60, $_SESSION['entregador_info'][3]);
         $pdf->Cell(15,69,'Endereco:');
         $pdf->Cell(-20,70, $_SESSION['entregador_info'][4]);
         
         // recebedor
         $pdf->SetFont('Arial','B',9);
         $pdf->Cell(1,90,'Sobre o recebedor');
         // $pdf->Cell(10,20,'Recebedor: ');
         // $pdf->Cell(10,20,'Entrega: ');

         //encomenda
         // config código da entrega
         // $pdf->Cell(10,30,'Código da entrega');
         // $pdf->Cell(10,30,'gerar o código aqui');

         // mostra pdf
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
