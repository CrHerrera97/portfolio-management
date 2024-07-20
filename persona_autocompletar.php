<?php
// conectar a la base de datos
$mysqli = new mysqli("localhost","root","","sistema_pagos");

// obtener el valor del parámetro puesto
$puesto = $_POST['puesto'];

// realizar la consulta a la base de datos
//$query = "SELECT personas.id, personas.nombre, personas.apellido FROM locales INNER JOIN personas ON locales.personas_fk = personas.id WHERE locales.numero = $puesto";
$query = "SELECT locales.id as id_local, personas.id as id_persona, personas.nombre, personas.apellido FROM locales INNER JOIN personas ON locales.personas_fk = personas.id WHERE locales.numero = $puesto";
$result = mysqli_query($mysqli, $query); // utilizar la variable $mysqli en lugar de $conn

// validar que se haya obtenido un resultado
if(mysqli_num_rows($result) > 0){
  // obtener los datos de la persona
  $persona = mysqli_fetch_assoc($result);

  // devolver los datos en formato JSON
  header('Content-Type: application/json');
  echo json_encode($persona);
} else {
  // devolver una respuesta vacía en caso de no obtener resultados
  header('Content-Type: application/json');
  echo json_encode([]);
}

// cerrar la conexión a la base de datos
mysqli_close($mysqli); // utilizar la variable $mysqli en lugar de $conn

?>
