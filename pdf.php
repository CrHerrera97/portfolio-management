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
$pdf->SetFont('Arial','B',16);
$pdf->SetY(5);
$pdf->Cell(80,20,'Total Por Dias:');
$pdf->SetY(5);
$pdf->Cell(80,40,'Administracion: '.$admon);
$pdf->SetY(5);
$pdf->Cell(80,60,'Parqueadero: '.$parque);
$pdf->SetY(5);
$pdf->Cell(80,80,'Agua: '.$agua);
$pdf->SetY(5);
$pdf->Cell(80,100,'Luz: '.$luz);
$pdf->SetY(5);
$pdf->Cell(80,120,'Total Ingresos: '.$total_ingresos);
$pdf->SetY(5);
$pdf->Cell(80,140,'Total Cartera Actual: '.$total_cartera_actual);
$pdf->SetY(5);
$pdf->Cell(80,160,'Total Cartera Vencida: '.$total_cartera_vencida);
$pdf->SetY(5);
$pdf->Cell(80,180,'Total Multas: '.$total_multas);
$pdf->SetY(5);
$pdf->Cell(80,200,'Total Ahorros: '.$total_ahorros);
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