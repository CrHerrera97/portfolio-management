<?php 
// Database connection info 
$dbDetails = array( 
'host' => 'localhost', 
'user' => 'root', 
'pass' => '', 
'db'   => 'sistema_pagos'
); 
// mysql db table to use 
$table = <<<EOT
 (
    SELECT
    c.id, 
    c.fecha, 
    concat(p.nombre,' ',p.apellido) as nombre,
    l.nombre as nom_local, c.valor, c.servicio, c.pendiente
  FROM cartera c
  INNER JOIN locales l on c.local_fk = l.id
  INNER JOIN personas p on c.persona_fk = p.id
 ) temp
EOT;
// Table's primary key 
$primaryKey = 'id'; 
// Array of database columns which should be read and sent back to DataTables. 
// The `db` parameter represents the column name in the database.  
// The `dt` parameter represents the DataTables column identifier. 


   $columns = array( 
    array( 'db' => 'fecha', 'dt' => 0 ), 
    array( 'db' => 'nombre',  'dt' => 1 ), 
    array( 'db' => 'nom_local',  'dt' => 2 ), 
    array( 'db' => 'valor',  'dt' => 3 ), 
    array( 'db' => 'servicio',  'dt' => 4 ), 
    array( 'db' => 'pendiente',  'dt' => 5 ),
    array( 
    'db'        => 'id',
    'dt'        => 6, 
    'formatter' => function( $d, $row ) { 
        return '<a href="javascript:void(0)" class="btn btn-primary btn-edit" data-id="'.$row['id'].'"> Editar </a> <a href="javascript:void(0)" class="btn btn-danger btn-delete ml-2" data-id="'.$row['id'].'"> Eliminar </a>'; 
    } 
    ) 
    ); 
// Include SQL query processing class 
require 'ssp.class.php'; 
// Output data as json format 
echo json_encode( 
SSP::simple( $_GET, $dbDetails, $table, $primaryKey, $columns ));