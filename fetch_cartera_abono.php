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
    i.id, 
    i.fecha_ingreso,
    concat(p.nombre,' ',p.apellido) as nombre,
    l.numero as nom_local,
    i.recibo,
    i.categoria,
    i.sub_categoria,
    i.valor,
    i.abono,
    i.saldo,
    i.pendiente,
    i.observaciones
  FROM ingresos i
  INNER JOIN locales l on i.local_fk = l.id
  INNER JOIN personas p on i.persona_fk = p.id
  WHERE i.pendiente = 'si'
  AND i.categoria = 'cartera'
  AND i.sub_categoria NOT LIKE 'vencida'
 ) temp
EOT;
// Table's primary key 
$primaryKey = 'id'; 
// Array of database columns which should be read and sent back to DataTables. 
// The `db` parameter represents the column name in the database.  
// The `dt` parameter represents the DataTables column identifier. 


   $columns = array( 
    array( 'db' => 'id', 'dt' => "" ),
    array( 'db' => 'fecha_ingreso', 'dt' => 0 ),
    array( 'db' => 'nombre', 'dt' => 1 ),
    array( 'db' => 'nom_local', 'dt' => 2 ),
    array( 'db' => 'recibo', 'dt' => 3 ), 
    array( 'db' => 'categoria',  'dt' => 4 ), 
    array( 'db' => 'sub_categoria',  'dt' => 5 ), 
    array( 'db' => 'valor',  'dt' => 6 ), 
    array( 'db' => 'abono',  'dt' => 7), 
    array( 'db' => 'saldo',  'dt' => 8 ), 
    array( 'db' => 'pendiente',  'dt' => 9 ), 
    array( 'db' => 'observaciones',  'dt' => 10 ),
    array( 
    'db'        => 'id',
    'dt'        => 11, 
    'formatter' => function( $d, $row ) { 
        return '<a href="javascript:void(0)" class="btn btn-warning btn-abonar ml-2" data-id="'.$row['id'].'"> Abonar </a>'; 
    } 
    ) 
    ); 
// Include SQL query processing class 
require 'ssp.class.php'; 
// Output data as json format 
echo json_encode( 
SSP::simple( $_GET, $dbDetails, $table, $primaryKey, $columns ));