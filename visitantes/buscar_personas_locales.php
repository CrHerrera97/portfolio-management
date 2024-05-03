<?php

include 'database.php';

$mysqli = $conn;



// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

//tomamos los valores 
$html = '';
$personas = $_POST["pertenece"];

//consulta sql



$result = $mysqli->query(
    'select id, Concat(nombre," ", apellido) as nombreComp 
    FROM personas where nombre LIKE "%'.strip_tags($personas).'%"
    or apellido LIKE "%'.strip_tags($personas).'%" limit 5'
);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {                
        //$html .= '<div><a class="suggest-element" data="'.utf8_encode($row['id']).'" id="'.$row['id'].'">'.utf8_encode($row['nombreComp']).'</a></div>';
        //$html .= '<div><a class="suggest-element" data="'.utf8_encode($row['nombreComp']).'" nombreComp="'.$row['nombreComp'].'">'.utf8_encode($row['nombreComp']).'</a></div>';
        $html .= '<div><a class="suggest-element" data="'.utf8_encode($row['id']).'" id="'.$row['id'].''.'" nombreComp="'.$row['nombreComp'].'">'.utf8_encode($row['nombreComp']).'</a></div>';
    }
}
echo $html;

?>