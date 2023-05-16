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
  a.id,
  a.fecha,
  concat(p.nombre,' ',p.apellido) as nombre, a.valor,
  a.pendiente
  FROM ahorros a
  INNER JOIN personas p on a.persona_fk = p.id
 ) temp
EOT;

$primaryKey = 'id'; 

    $columns = array( 
      array( 'db' => 'fecha',  'dt' => 0 ),
      array( 'db' => 'nombre',  'dt' => 1 ),
      array( 'db' => 'valor',  'dt' => 2 ), 
      array( 'db' => 'pendiente',  'dt' => 3 ),
      array( 
      'db'        => 'id',
      'dt'        => 4, 
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