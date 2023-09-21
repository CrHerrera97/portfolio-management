<?php 

include 'database.php';

$mysqli = $conn;

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
    $sql_admon = mysqli_query($mysqli,"SELECT SUM(valor) AS total FROM ingresos WHERE categoria = 'ingreso' AND sub_categoria = 'administracion' AND fecha_pago >= '$fecha_ini' AND fecha_pago <= '$fecha_fin'");
    $administracion = mysqli_fetch_row($sql_admon);
    //echo json_encode($row);

    //parqueadero
    $sql_parque = mysqli_query($mysqli,"SELECT sum(valor) FROM ingresos WHERE categoria = 'ingreso' AND sub_categoria = 'parqueadero' AND fecha_pago >= '$fecha_ini' AND fecha_pago <= '$fecha_fin'");
    $parqueadero = mysqli_fetch_row($sql_parque);

    $sql_agua = mysqli_query($mysqli,"SELECT sum(valor) FROM ingresos WHERE categoria = 'ingreso' AND sub_categoria = 'agua' AND fecha_pago >= '$fecha_ini' AND fecha_pago <= '$fecha_fin'");
    $agua = mysqli_fetch_row($sql_agua);

    $sql_luz = mysqli_query($mysqli,"SELECT sum(valor) FROM ingresos WHERE categoria = 'ingreso' AND sub_categoria = 'luz' AND fecha_pago >= '$fecha_ini' AND fecha_pago <= '$fecha_fin'");
    $luz = mysqli_fetch_row($sql_luz);

    $sql_ahorro = mysqli_query($mysqli,"SELECT sum(valor) FROM ingresos WHERE sub_categoria = 'ahorro' and fecha_pago >= '$fecha_ini' AND fecha_pago <= '$fecha_fin'");
    $ahorro = mysqli_fetch_row($sql_ahorro);

    $sql_multas = mysqli_query($mysqli,"SELECT sum(valor) FROM ingresos WHERE sub_categoria = 'multas' AND fecha_pago >= '$fecha_ini' AND fecha_pago <= '$fecha_fin'");
    $multas = mysqli_fetch_row($sql_multas);


    //vamos a crear las variables para los totales de los ingresos, cartera actual, cartera vencida, ahorros y multas
    

    //total ingresos
    $sql_total_ingresos = mysqli_query($mysqli,"SELECT sum(abono) FROM ingresos WHERE fecha_pago BETWEEN '$fecha_ini' AND '$fecha_fin' AND sub_categoria <> 'ahorro'");
    $total_ingresos = mysqli_fetch_row($sql_total_ingresos);


    //total cartera actual

    $sql_total_cartera_actual = mysqli_query($mysqli,"SELECT sum(saldo) FROM ingresos WHERE categoria = 'cartera' AND pendiente = 'si' AND sub_categoria <> 'vencida' AND sub_categoria <> 'multas' AND fecha_pago BETWEEN '$fecha_ini' AND '$fecha_fin'");
    $total_cartera_actual = mysqli_fetch_row($sql_total_cartera_actual);

    //total cartera vencida
    $sql_total_cartera_vencida = mysqli_query($mysqli,"SELECT sum(saldo) FROM ingresos WHERE categoria = 'cartera' AND sub_categoria = 'vencida' AND pendiente = 'si' AND fecha_pago BETWEEN '$fecha_ini' AND '$fecha_fin'");
    $total_cartera_vencida = mysqli_fetch_row($sql_total_cartera_vencida);

    //total multas
    $sql_total_multas = mysqli_query($mysqli,"SELECT sum(saldo) FROM ingresos WHERE categoria = 'cartera' AND sub_categoria = 'multas' AND pendiente = 'si' AND fecha_pago BETWEEN '$fecha_ini' AND '$fecha_fin'");
    $total_multas = mysqli_fetch_row($sql_total_multas);    

    //total ahorros
    $sql_total_ahorros = mysqli_query($mysqli,"SELECT sum(saldo) FROM ingresos WHERE categoria = 'ingreso' AND sub_categoria = 'ahorro' AND pendiente = 'si' AND fecha_pago BETWEEN '$fecha_ini' AND '$fecha_fin'");
    $total_ahorros = mysqli_fetch_row($sql_total_ahorros);    

$response = array('administracion' => $administracion,
    'parqueadero' => $parqueadero,
    'agua' => $agua,
    'luz' => $luz,
    'ahorro' => $ahorro,
    'multas' => $multas,

    'total_ingresos' => $total_ingresos,
    'total_cartera_actual' => $total_cartera_actual,
    'total_cartera_vencida' => $total_cartera_vencida,
    'total_multas' => $total_multas,
    'total_ahorros' => $total_ahorros
    );
    
    header('Content-Type: application/json');
    echo json_encode($response);



/*
$hola = "hola";

header('Content-Type: application/json');
echo json_encode($hola);

*/

    

