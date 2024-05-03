<?php 
// Database connection info 
include 'database.php';


$dbDetails = array( 
'host' => 'localhost', 
'user' => 'root', 
'pass' => '', 
'db'   => 'sistema_pagos'
); 
// mysql db table to use 


$dbDetails = $database;

$table = <<<EOT
 (
    SELECT 
      l.id, 
      l.numero, 
      l.servicios,
      concat(p.nombre,' ',p.apellido) as pertenece
    FROM locales l
    INNER JOIN personas p ON l.personas_fk = p.id
 ) temp
EOT;

$primaryKey = 'id'; 

$userData = array();
$con = new mysqli("localhost","root","","sistema_pagos");

   $columns = array( 
    array( 'db' => 'numero', 'dt' => 0 ), 
    array( 'db' => 'servicios',  'dt' => 1 ), 
    array( 'db' => 'pertenece',  'dt' => 2 ), 
    array( 
    'db'        => 'id',
    'dt'        => 3, 
    'formatter' => function( $d, $row ) { 
        return '<a href="javascript:void(0)" class="btn btn-primary btn-edit" data-id="'.$row['id'].'"> Editar </a> <a href="javascript:void(0)" class="btn btn-danger btn-delete" data-id="'.$row['id'].'"> Eliminar </a>'; 
    } 
    ) 
    ); 
// Include SQL query processing class 
require 'ssp.class.php'; 
// Output data as json format 
echo json_encode( 
SSP::simple( $_GET, $dbDetails, $table, $primaryKey, $columns ));