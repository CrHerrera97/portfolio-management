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
    a.id,
    i.fecha_pago,
    a.fecha,
    i.categoria,
    i.sub_categoria,
    concat(p.nombre,' ',p.apellido) as nombre,
    l.numero as nom_local,
    i.recibo as recibo,
    i.valor,
    a.valor as abono
    FROM abonos a
    INNER JOIN locales l on a.local_fk = l.id
    INNER JOIN personas p on a.persona_fk = p.id
    INNER JOIN ingresos i on a.ingresos_fk = i.id
 ) temp
EOT;

$primaryKey = 'id'; 

    $columns = array( 
        array( 'db' => 'id', 'dt' => "" ),
        array( 'db' => 'fecha_pago', 'dt' => 0 ),
        array( 'db' => 'fecha', 'dt' => 1 ),
        array( 'db' => 'categoria', 'dt' => 2 ),
        array( 'db' => 'sub_categoria', 'dt' => 3 ),
        array( 'db' => 'nombre', 'dt' => 4 ),
        array( 'db' => 'nom_local', 'dt' => 5 ),
        array( 'db' => 'recibo',  'dt' => 6 ), 
        array( 'db' => 'valor',  'dt' => 7 ), 
        array( 'db' => 'abono',  'dt' => 8 ), 
        array( 
        'db'        => 'id',
        'dt'        => 9, 
        'formatter' => function( $d, $row ) { 
          //return '<a href="javascript:void(0)" class="btn btn-primary btn-edit" data-id="'.$row['id'].'"> Editar </a> <a href="javascript:void(0)" class="btn btn-danger btn-delete ml-2" data-id="'.$row['id'].'"> Eliminar </a>'; 
          return '<a href="javascript:void(0)" class="btn btn-primary btn-edit ml-2" data-id="'.$row['id'].'"> Editar </a> <a href="javascript:void(0)" class="btn btn-danger btn-delete ml-2" data-id="'.$row['id'].'"> Eliminar </a>'; 
        } 
      ) 
      ); 
// Include SQL query processing class 
require 'ssp.class.php'; 
// Output data as json format 
echo json_encode( 
SSP::simple( $_GET, $dbDetails, $table, $primaryKey, $columns ));