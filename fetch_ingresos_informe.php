<?php 
// Database connection info 
$dbDetails = array( 
'host' => 'localhost', 
'user' => 'root', 
'pass' => '', 
'db'   => 'sistema_pagos'
); 
//en el where del i.abono <> '0' se quitó para que se puedan ver los ingresos que se hacen cuando es un ahorro
$table = <<<EOT
 (
    SELECT
    i.id, 
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
  #WHERE i.abono <> '0'
  ORDER BY i.id DESC
 ) temp
EOT;

$primaryKey = 'id'; 

$userData = array();
$con = new mysqli("localhost","root","","sistema_pagos");

   $columns = array( 
    //si pongo en en el id = 0 puedo tener el registro en orden descendente
    array( 'db' => 'id', 'dt' => 0 ), 
    array( 'db' => 'fecha_ingreso',  'dt' => 0 ),
    array( 'db' => 'fecha_pago',  'dt' => 1 ), 
    array( 'db' => 'persona',  'dt' => 2 ), 
    array( 'db' => 'local',  'dt' => 3 ),
    array( 'db' => 'recibo',  'dt' => 4 ),
    array( 'db' => 'categoria',  'dt' => 5),
    array( 'db' => 'sub_categoria',  'dt' => 6),
    array( 'db' => 'valor',  'dt' => 7 ),
    array( 'db' => 'abono',  'dt' => 8 ), 
    array( 'db' => 'saldo',  'dt' => 9 ), 
    array( 'db' => 'pendiente',  'dt' => 10 ),
    array( 'db' => 'observaciones',  'dt' => 11 ), 
    array( 
    'db'        => 'id',
    'dt'        => 12, 
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