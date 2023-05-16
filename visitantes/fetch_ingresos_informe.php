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
  i.fecha, 
  concat(p.nombre,' ',p.apellido) as persona,
  l.numero as local,
  i.valor,
  i.servicio,
  i.pendiente
FROM ingresos i
INNER JOIN locales l on i.local_fk = l.id
INNER JOIN personas p on i.persona_fk = p.id
 ) temp
EOT;

$primaryKey = 'id'; 

$userData = array();
$con = new mysqli("localhost","root","","sistema_pagos");

   $columns = array( 
    array( 'db' => 'fecha', 'dt' => 0 ), 
    array( 'db' => 'persona',  'dt' => 1 ), 
    array( 'db' => 'local',  'dt' => 2 ),
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