<?php 

include_once "../../../../database/conexao.php";
include_once "../../../../database/funcoes_gerais.php";
include_once "../../../../routers.php";
require('../../../../fpdf/fpdf.php'); // biblioteca para gerar o comprovante (PDF)

$database = new Database();
$db = $database->getConnection();

$entregar_obj = new funcoes_gerais($db);

// obtém o id da encomenda que está no valor do botão "comprovante de entrega"
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	
    if (isset($_POST['btn_gera_comprovante_entrega'])) {
        $encomenda_id = $_POST['btn_gera_comprovante_entrega'];
    }
}

// FAZER !!!
// ================================================================================
// MUDAR A CONSULTA PARA UM JOIN E EXIBIR AS INFO APARTIR DA TABELA historico_entrega
// 


// obtendo algumas info do morador, entrega, recebedor para colocar no comprovante

$encomenda_info = array();
$destinatario_info = array();
$entregador_info = array();

$encomenda_info = $entregar_obj->lerRegistros("encomenda", "WHERE id = {$encomenda_id }");
$destinatario_info = $entregar_obj->lerRegistros("morador", "WHERE id = {$encomenda_info[2]}");
$entregador_info = $entregar_obj->lerRegistros("morador", "WHERE id = {$encomenda_info[3]}");


// Gerando o PDF
// config a página  array(largura x altura) em milímetro (mm)
$pdf = new FPDF('P','mm', array(80,200));
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
$pdf->Cell(-10,50, $entregador_info[1]);

$pdf->Cell(15,60,'Telefone:');
$pdf->Cell(-15,60, $entregador_info[3]);

$pdf->Cell(15,69,'Endereco:');
$pdf->Cell(-20,70, $entregador_info[4]);
         
// recebedor
$pdf->SetFont('Arial','B',9);
$pdf->Cell(5,90,'Sobre o recebedor');

$pdf->SetFont('Arial','',8);

$pdf->Cell(10,100,'Nome: ');
$pdf->Cell(-10,100, $destinatario_info[1]);

$pdf->Cell(15,110,'Telefone: ');
$pdf->Cell(-15,110, $destinatario_info[3]);

$pdf->Cell(15,120,'Endereco: ');
$pdf->Cell(1,120, $destinatario_info[4]);
         
//encomenda
$pdf->SetFont('Arial','B',9);
$pdf->Cell(7,150,'Codigo da entrega');

$pdf->SetFont('Arial','',8);
         
// Gerando o  código da entrega
// formato: //ET = entrega + códgio gerado + RBR = realizada brasil
$cod = "ET";
$aux = $entregar_obj->selectRegistroGeral("SELECT MAX(id) FROM encomenda");
$cod .= $aux[0][0];
$cod .= "RBR";
         
$pdf->Cell(-7,160, $cod);
$pdf->Cell(10,167, date('Y-m-d H:i:s'));

// mostra pdf
$pdf->Output();

?>
