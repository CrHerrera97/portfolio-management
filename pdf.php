<?php

//declaramos los requerimientos para exportar a pdf

require('pdf/fpdf.php');

$admon = $_POST["admon"];
$parque = $_POST["parque"];
$agua = $_POST["agua"];
$luz = $_POST["luz"];
$ahorro = $_POST["ahorro"];
$multas = $_POST["multas"];


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
$pdf->Cell(80,120,'Ahorro: '.$ahorro);
$pdf->SetY(5);
$pdf->Cell(80,140,'Multas: '.$multas);
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