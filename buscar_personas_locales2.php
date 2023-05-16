<?php

$mysqli = new mysqli("localhost","root","","sistema_pagos");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

//tomamos los valores 
$html = '';
$personas = $_POST["perteneces"];

//consulta sql



$result = $mysqli->query(
    'select id, Concat(nombre," ", apellido) as nombreComp 
    FROM personas where nombre LIKE "%'.strip_tags($personas).'%"
    or apellido LIKE "%'.strip_tags($personas).'%" limit 5'
);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {                
        //$html .= '<div><a class="suggest-element2" data="'.utf8_encode($row['id']).'" id="'.$row['id'].'">'.utf8_encode($row['nombreComp']).'</a></div>';
        $html .= '<div><a class="suggest-element2" data="'.utf8_encode($row['id']).'" id="'.$row['id'].''.'" nombreComp="'.$row['nombreComp'].'">'.utf8_encode($row['nombreComp']).'</a></div>';
    }
}
echo $html;

?>