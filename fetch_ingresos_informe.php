<?php 
// Database connection info 
$dbDetails = array( 
'host' => 'localhost', 
'user' => 'root', 
'pass' => '', 
'db'   => 'sistema_pagos'
); 

$table = <<<EOT
 (
    SELECT
    i.id, 
    i.fecha_desde,
    i.fecha_hasta,
    i.fecha_ingreso,
    i.fecha_pago,
    concat(p.nombre,' ',p.apellido) as persona,
    l.numero as local,
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
 ) temp
EOT;

$primaryKey = 'id'; 

$userData = array();
$con = new mysqli("localhost","root","","sistema_pagos");

   $columns = array( 
    array( 'db' => 'fecha_desde', 'dt' => 0 ), 
    array( 'db' => 'fecha_hasta',  'dt' => 1 ), 
    array( 'db' => 'fecha_ingreso',  'dt' => 2 ),
    array( 'db' => 'fecha_pago',  'dt' => 3 ), 
    array( 'db' => 'persona',  'dt' => 4 ), 
    array( 'db' => 'local',  'dt' => 5 ),
    array( 'db' => 'recibo',  'dt' => 6 ),
    array( 'db' => 'categoria',  'dt' => 7 ),
    array( 'db' => 'sub_categoria',  'dt' => 8 ),
    array( 'db' => 'valor',  'dt' => 9 ),
    array( 'db' => 'abono',  'dt' => 10 ), 
    array( 'db' => 'saldo',  'dt' => 11 ), 
    array( 'db' => 'pendiente',  'dt' => 12 ),
    array( 'db' => 'observaciones',  'dt' => 13 ), 
    array( 
    'db'        => 'id',
    'dt'        => 14, 
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