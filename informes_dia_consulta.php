<?php 


$mysqli = new mysqli("localhost","root","","sistema_pagos");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

//tomamos los valores 
//local toma el valor de key id que es el que hace referencia al id del local

$fecha_ini = $_POST["fecha_ini"];
$fecha_fin = $_POST["fecha_fin"];


//aqui en estas consultas vamos a extrer las sumas de los diferentes conceptos: "administracion", "parqueadero", etc.

    //administracion
    $sql_admon = mysqli_query($mysqli,"SELECT sum(valor) FROM ingresos WHERE sub_categoria = 'administracion' AND fecha_desde BETWEEN '$fecha_ini' AND '$fecha_fin'");
    $administracion = mysqli_fetch_row($sql_admon);
    //echo json_encode($row);

    //parqueadero
    $sql_parque = mysqli_query($mysqli,"SELECT sum(valor) FROM ingresos WHERE sub_categoria = 'parqueadero' AND fecha_desde BETWEEN '$fecha_ini' AND '$fecha_fin'");
    $parqueadero = mysqli_fetch_row($sql_parque);

    $sql_agua = mysqli_query($mysqli,"SELECT sum(valor) FROM ingresos WHERE sub_categoria = 'agua' AND fecha_desde BETWEEN '$fecha_ini' AND '$fecha_fin'");
    $agua = mysqli_fetch_row($sql_agua);

    $sql_luz = mysqli_query($mysqli,"SELECT sum(valor) FROM ingresos WHERE sub_categoria = 'luz' AND fecha_desde BETWEEN '$fecha_ini' AND '$fecha_fin'");
    $luz = mysqli_fetch_row($sql_luz);

    $sql_ahorro = mysqli_query($mysqli,"SELECT sum(valor) FROM ingresos WHERE sub_categoria = 'ahorro' and fecha_desde BETWEEN '$fecha_ini' AND '$fecha_fin'");
    $ahorro = mysqli_fetch_row($sql_ahorro);

    $sql_multas = mysqli_query($mysqli,"SELECT sum(valor) FROM ingresos WHERE sub_categoria = 'multas' AND fecha_desde BETWEEN '$fecha_ini' AND '$fecha_fin'");
    $multas = mysqli_fetch_row($sql_multas);

$response = array('administracion' => $administracion,
    'parqueadero' => $parqueadero,
    'agua' => $agua,
    'luz' => $luz,
    'ahorro' => $ahorro,
    'multas' => $multas
    );
    
    header('Content-Type: application/json');
    echo json_encode($response);



/*
$hola = "hola";

header('Content-Type: application/json');
echo json_encode($hola);

*/

    

