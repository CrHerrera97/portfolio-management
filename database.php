<?php


$servername = "localhost";
$username = "id21108295_root";
$password = "Cristian97#";
$dbname = "id21108295_sistema_pagos";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar la conexión
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


$database = array( 
    'host' => 'localhost', 
    'user' => 'id21108295_root', 
    'pass' => 'Cristian97#', 
    'db'   => 'id21108295_sistema_pagos'
    ); 
?>