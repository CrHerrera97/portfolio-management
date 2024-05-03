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
$local = $_POST["key"];

//consulta sql



$result = $mysqli->query(
    'select id, numero, nombre as locales 
    FROM locales where numero LIKE "%'.strip_tags($local).'%"
    or nombre LIKE "%'.strip_tags($local).'%" limit 5'
);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {                
        $html .= '<div><a class="suggest-element" data="'.utf8_encode($row['id']).'" id="'.$row['id'].''.utf8_encode($row['numero']).'" numero="'.$row['numero'].'">'.utf8_encode($row['locales']).'</a></div>';
    }
}
echo $html;

?>