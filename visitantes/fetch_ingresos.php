<?php 


$mysqli = new mysqli("localhost","root","","sistema_pagos");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

//tomamos los valores 
//local toma el valor de key id que es el que hace referencia al id del local
$local = $_POST["key_id"];

$persona = $_POST["persona_key"];
$fecha = $_POST["fecha"];

//$otros = $_POST["otros"];


$cartera = $_POST["cartera"];

$admon = $_POST["admon"];

$parqueadero = $_POST["parque"];

$agua = $_POST["agua"];

$luz = $_POST["luz"];

$pendiente = $_POST["pendiente"];

$multas = $_POST["multas"];

$ahorro = $_POST["ahorro"];

//el valor de pendiente es para que si el pago está pendiente me haga una inserción en la tabla de cartera

/*
$pendiente = $_POST["pendiente"];

if ($pendiente === "SI"){
    echo "pague papá";
}
*/

if ($pendiente === "si"){
    if ($cartera != 0){
        $sql = "INSERT INTO `cartera` (`fecha`, `persona_fk`, `local_fk`, `valor`, `servicio`, `pendiente`) VALUES ('$fecha', $persona, $local, $cartera, 'cartera', '$pendiente')";
        mysqli_query($mysqli, $sql);
        echo "realizada";
        echo $fecha;
    }
    if ($parqueadero != 0){
        $sql = "INSERT INTO `cartera` (`fecha`, `persona_fk`, `local_fk`, `valor`, `servicio`, `pendiente`) VALUES ('$fecha', $persona, $local, $parqueadero, 'parqueadero', '$pendiente')";
        mysqli_query($mysqli, $sql);
        echo "realizada";
    }
    if ($admon != 0){
        $sql = "INSERT INTO `cartera` (`fecha`, `persona_fk`, `local_fk`, `valor`, `servicio`, `pendiente`) VALUES ('$fecha', $persona, $local, $admon, 'administracion', '$pendiente')";    
        mysqli_query($mysqli, $sql);
        echo "realizada";
    }
    if ($agua != 0){
        $sql = "INSERT INTO `cartera` (`fecha`, `persona_fk`, `local_fk`, `valor`, `servicio`, `pendiente`) VALUES ('$fecha', $persona, $local, $agua, 'agua', '$pendiente')";    
        mysqli_query($mysqli, $sql);
        echo "realizada";
    }if ($luz != 0){
        $sql = "INSERT INTO `cartera` (`fecha`, `persona_fk`, `local_fk`, `valor`, `servicio`, `pendiente`) VALUES ('$fecha', $persona, $local, $luz, 'luz', '$pendiente')";    
        mysqli_query($mysqli, $sql);
        echo "realizada";
    }
    if ($multas != 0){
        $sql = "INSERT INTO `cartera` (`fecha`, `persona_fk`, `local_fk`, `valor`, `servicio`, `pendiente`) VALUES ('$fecha', $persona, $local, $multas, 'multas', '$pendiente')";    
        mysqli_query($mysqli, $sql);
        echo "realizada";
    }
    if ($ahorro != 0){
        $sql = "INSERT INTO `ahorros` (`fecha`, `persona_fk`, `valor`, `pendiente`) VALUES ('$fecha', $persona, $ahorro, '$pendiente')";    
        mysqli_query($mysqli, $sql);
        echo "realizada";
    }
}else{
    if ($cartera != 0){
        $sql = "INSERT INTO `ingresos` (`fecha`, `persona_fk`, `local_fk`, `valor`, `servicio`, `pendiente`) VALUES ('$fecha', $persona, $local, $cartera, 'cartera', '$pendiente')";
        mysqli_query($mysqli, $sql);
        echo "realizada";
        echo $fecha;
    }
    if ($parqueadero != 0){
        $sql = "INSERT INTO `ingresos` (`fecha`, `persona_fk`, `local_fk`, `valor`, `servicio`, `pendiente`) VALUES ('$fecha', $persona, $local, $parqueadero, 'parqueadero', '$pendiente')";
        mysqli_query($mysqli, $sql);
        echo "realizada";
    }
    if ($admon != 0){
        $sql = "INSERT INTO `ingresos` (`fecha`, `persona_fk`, `local_fk`, `valor`, `servicio`, `pendiente`) VALUES ('$fecha', $persona, $local, $admon, 'administracion', '$pendiente')";    
        mysqli_query($mysqli, $sql);
        echo "realizada";
    }
    if ($agua != 0){
        $sql = "INSERT INTO `ingresos` (`fecha`, `persona_fk`, `local_fk`, `valor`, `servicio`, `pendiente`) VALUES ('$fecha', $persona, $local, $agua, 'agua', '$pendiente')";    
        mysqli_query($mysqli, $sql);
        echo "realizada";
    }if ($luz != 0){
        $sql = "INSERT INTO `ingresos` (`fecha`, `persona_fk`, `local_fk`, `valor`, `servicio`, `pendiente`) VALUES ('$fecha', $persona, $local, $luz, 'luz', '$pendiente')";    
        mysqli_query($mysqli, $sql);
        echo "realizada";
    }
}





