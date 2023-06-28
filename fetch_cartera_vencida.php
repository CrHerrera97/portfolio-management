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
    i.id, 
    i.fecha_desde, 
    i.fecha_hasta, 
    i.fecha_ingreso,
    concat(p.nombre,' ',p.apellido) as nombre,
    l.numero as nom_local,
    i.recibo,
    i.categoria,
    i.sub_categoria,
    i.otros,
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
  AND i.sub_categoria = 'vencida'
 ) temp
EOT;
// Table's primary key 
$primaryKey = 'id'; 
// Array of database columns which should be read and sent back to DataTables. 
// The `db` parameter represents the column name in the database.  
// The `dt` parameter represents the DataTables column identifier. 


   $columns = array( 
    array( 'db' => 'id', 'dt' => 0 ),
    array( 'db' => 'fecha_desde', 'dt' => 1 ),
    array( 'db' => 'fecha_hasta', 'dt' => 2 ),
    array( 'db' => 'fecha_ingreso', 'dt' => 3 ),
    array( 'db' => 'nombre', 'dt' => 4 ),
    array( 'db' => 'nom_local', 'dt' => 5 ),
    array( 'db' => 'recibo', 'dt' => 6 ), 
    array( 'db' => 'categoria',  'dt' => 7 ), 
    array( 'db' => 'sub_categoria',  'dt' => 8 ), 
    array( 'db' => 'otros',  'dt' => 9 ), 
    array( 'db' => 'valor',  'dt' => 10 ), 
    array( 'db' => 'abono',  'dt' => 11 ), 
    array( 'db' => 'saldo',  'dt' => 12 ), 
    array( 'db' => 'pendiente',  'dt' => 13 ), 
    array( 'db' => 'observaciones',  'dt' => 14 ),
    array( 
    'db'        => 'id',
    'dt'        => 15, 
    'formatter' => function( $d, $row ) { 
        return '<a href="javascript:void(0)" class="btn btn-primary btn-edit ml-2" data-id="'.$row['id'].'"> Editar </a> <a href="javascript:void(0)" class="btn btn-danger btn-delete ml-2" data-id="'.$row['id'].'"> Eliminar </a> <a href="javascript:void(0)" class="btn btn-warning btn-abonar-vencida ml-2" data-id="'.$row['id'].'"> Abonar </a> <a href="javascript:void(0)" class="btn btn-success btn-pagar ml-2" data-id="'.$row['id'].'"> Pagar </a>'; 
    } 
    ) 
    ); 
// Include SQL query processing class 
require 'ssp.class.php'; 
// Output data as json format 
echo json_encode( 
SSP::simple( $_GET, $dbDetails, $table, $primaryKey, $columns ));