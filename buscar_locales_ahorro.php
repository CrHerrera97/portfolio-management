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
    'select id, numero 
    FROM locales where numero LIKE "%'.strip_tags($personas).'%"
    limit 5'
);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {                
        //$html .= '<div><a class="suggest-element2" data="'.utf8_encode($row['id']).'" id="'.$row['id'].'">'.utf8_encode($row['nombreComp']).'</a></div>';
        $html .= '<div><a class="suggest-element2" data="'.utf8_encode($row['id']).'" id="'.$row['id'].''.'" numero="'.$row['numero'].'">'.utf8_encode($row['numero']).'</a></div>';
    }
}
echo $html;

?>