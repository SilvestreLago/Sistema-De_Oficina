<?php
require_once('../TCPDF/tcpdf.php');

// Inicia o buffer de saída
ob_start();
// Inclui ou executa a página PHP que gera o HTML desejado
include('../pag/relatorio.php');
// Captura o HTML gerado
$html = ob_get_clean();

// Cria uma nova instância do TCPDF
$pdf = new TCPDF();

// Configura as informações do documento
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle('Relatório da oficina');

// Define as margens e a quebra automática de página
$pdf->SetMargins(15, 15, 15);
$pdf->SetAutoPageBreak(TRUE, 15);

// Adiciona uma nova página
$pdf->AddPage();

// Renderiza o HTML capturado no PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Saída do PDF no navegador (use 'D' para download)
$pdf->Output('relatorio-mensal.pdf', 'I');
?>
