<?php 

include_once "../../../../database/conexao.php";
include_once "../../../../database/funcoes_gerais.php";
include_once "../../../../routers.php";
require('../../../../fpdf/fpdf.php'); // biblioteca para gerar o PDF

$database = new Database();
$db = $database->getConnection();

$entregar_obj = new funcoes_gerais($db);

// obtém o id da encomenda que está no valor do botão "comprovante de entrega"
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	
    if (isset($_POST['btn_gera_comprovante_entrega'])) {
        $encomenda_id = $_POST['btn_gera_comprovante_entrega'];
    }
}

// obtém info do recebedor, entregador, encomenda a partir do histórico de entrega
$comprovante_info = array();

$query = "SELECT 
              encomenda.nome AS encomenda_nome, historico.data_entrega AS encomenda_data_entrega, 
              recebedor.nome AS recebedor_nome, recebedor.telefone AS recebedor_telefone, recebedor.endereco AS recebedor_endereco, 
              entregador.nome AS entregador_nome, entregador.telefone AS entregador_telefone, entregador.endereco AS entregador_endereco,
              historico.cod_entrega
          FROM encomenda encomenda 
          JOIN historico_entrega historico ON encomenda.id = historico.encomenda_id 
          JOIN morador recebedor ON historico.morador_recebe_id = recebedor.id 
          JOIN morador entregador ON historico.morador_entrega_id = entregador.id";

$comprovante_info = $entregar_obj->selectRegistroGeral($query);

// Gerando o PDF
// config a página  array(largura x altura) em milímetro (mm)
$pdf = new FPDF('P','mm', array(80,205));
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
$pdf->Cell(5,40,'Entregador');
         
$pdf->SetFont('Arial','',8);

$pdf->Cell(10,50,'Nome:');
$pdf->Cell(-10,50, $comprovante_info[0][5]);

$pdf->Cell(15,60,'Telefone:');
$pdf->Cell(-15,60, $comprovante_info[0][6]);

$pdf->Cell(15,69,'Endereco:');
$pdf->Cell(-20,70, $comprovante_info[0][7]);
         
// recebedor
$pdf->SetFont('Arial','B',9);
$pdf->Cell(5,90,'Recebedor');

$pdf->SetFont('Arial','',8);

$pdf->Cell(10,100,'Nome: ');
$pdf->Cell(-10,100, $comprovante_info[0][2]);

$pdf->Cell(15,110,'Telefone: ');
$pdf->Cell(-15,110, $comprovante_info[0][3]);

$pdf->Cell(15,120,'Endereco: ');
$pdf->Cell(-20,120, $comprovante_info[0][4]);
         
//encomenda
$pdf->SetFont('Arial','B',9);
$pdf->Cell(5,140,'Encomenda');

$pdf->SetFont('Arial','',8);

$pdf->Cell(10,150,'Nome: ');
$pdf->Cell(-10,150, $comprovante_info[0][0]);
$pdf->Cell(25,160,'Data de Entrega: ');
$pdf->Cell(-25,160, $comprovante_info[0][1]);
$pdf->Cell(25,170,'Codigo da entrega: ');
$pdf->Cell(1,170, $comprovante_info[0][8]);

// mostra pdf
$pdf->Output();

?>
