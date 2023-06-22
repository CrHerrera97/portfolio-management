<?php

//declaramos los requerimientos para exportar a pdf

require('pdf/fpdf.php');

$admon = $_POST["admon"];
$parque = $_POST["parque"];
$agua = $_POST["agua"];
$luz = $_POST["luz"];
//$ahorro = $_POST["ahorro"];
//$multas = $_POST["multas"];


$total_ingresos =$_POST["total_ingresos"];
$total_cartera_actual =$_POST["total_cartera_actual"];
$total_cartera_vencida =$_POST["total_cartera_vencida"];
$total_multas =$_POST["total_multas"];
$total_ahorros =$_POST["total_ahorros"];

/*
$parametro1 = $_POST['parametro1'];
$parametro2 = $_POST['parametro2'];
*/

// generar el PDF con FPDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

$pdf->SetY(5);
$pdf->Cell(160, 20, utf8_decode ('Total Por Días:'), 1, 0, 'C');
$pdf->Ln();

$pdf->Cell(80, 20, utf8_decode ('Administración:'), 1, 0, 'L');
$pdf->Cell(80, 20, $admon, 1, 0, 'R');
$pdf->Ln();

$pdf->Cell(80, 20, 'Parqueadero:', 1, 0, 'L');
$pdf->Cell(80, 20, $parque, 1, 0, 'R');
$pdf->Ln();

$pdf->Cell(80, 20, 'Agua:', 1, 0, 'L');
$pdf->Cell(80, 20, $agua, 1, 0, 'R');
$pdf->Ln();

$pdf->Cell(80, 20, 'Luz:', 1, 0, 'L');
$pdf->Cell(80, 20, $luz, 1, 0, 'R');
$pdf->Ln();

$pdf->Cell(80, 20, 'Total Ingresos:', 1, 0, 'L');
$pdf->Cell(80, 20, $total_ingresos, 1, 0, 'R');
$pdf->Ln();

$pdf->Cell(80, 20, 'Total Cartera Actual:', 1, 0, 'L');
$pdf->Cell(80, 20, $total_cartera_actual, 1, 0, 'R');
$pdf->Ln();

$pdf->Cell(80, 20, 'Total Cartera Vencida:', 1, 0, 'L');
$pdf->Cell(80, 20, $total_cartera_vencida, 1, 0, 'R');
$pdf->Ln();

$pdf->Cell(80, 20, 'Total Multas:', 1, 0, 'L');
$pdf->Cell(80, 20, $total_multas, 1, 0, 'R');
$pdf->Ln();

$pdf->Cell(80, 20, 'Total Ahorros:', 1, 0, 'L');
$pdf->Cell(80, 20, $total_ahorros, 1, 0, 'R');
$pdf->Ln();

$pdf->Output();


/*

header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="archivo.pdf"');
header('Pragma: no-cache');
readfile('archivo.pdf');
*/
/*
$response = array('administracion' => $admon,
    'parqueadero' => $parque);
    
    header('Content-Type: application/json');
    echo json_encode($response);
*/

/*
$parque = $_POST['parque'];
$agua = $_POST['agua']; 
$luz = $_POST['luz'];
$ahorro = $_POST['ahorro'];
$multas = $_POST['multas'];


function export_pdf(){
  $pdf = new FPDF();
  $pdf->AddPage();
  $pdf->SetFont('Arial','B',16);
  $pdf->Cell(40,10,utf8_decode('¡Hola, Mundo!'));
  $pdf->Output();
}

  export_pdf(); 
*/

?>