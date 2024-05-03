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
    concat(p.nombre,' ',p.apellido) as nombre,
    i.persona_fk as persona, 
    l.numero as nom_local,
    SUM(abono) as total
    FROM ingresos i
    INNER JOIN locales l on i.local_fk = l.id
    INNER JOIN personas p on i.persona_fk = p.id
    WHERE i.sub_categoria = 'ahorro'
    and i.pendiente <> 'ahorro cancelado' 
    and i.pendiente <> 'si'
    GROUP BY 
    p.id,
    p.nombre,
    l.numero
 ) temp
EOT;

$primaryKey = 'id'; 

    $columns = array(       
        array( 'db' => 'id', 'dt' => "" ),
        array( 'db' => 'nom_local', 'dt' => 0 ),
        array( 'db' => 'persona', 'dt' =>  ""),
        array( 'db' => 'nombre', 'dt' => 1 ),
        array( 'db' => 'total',  'dt' => 2 ), 
      array( 
      'db'        => 'id',
      'dt'        => 3, 
      'formatter' => function( $d, $row ) { 
          //return '<a href="javascript:void(0)" class="btn btn-primary btn-edit" data-id="'.$row['id'].'"> Pagar </a> <a href="javascript:void(0)" class="btn btn-danger btn-delete ml-2" data-id="'.$row['id'].'"> Eliminar </a>'; 
          //return '<a href="javascript:void(0)" class="btn btn-primary btn-edit ml-2" data-id="'.$row['id'].'"> Editar </a> <a href="javascript:void(0)" class="btn btn-danger btn-delete ml-2" data-id="'.$row['id'].'"> Eliminar </a> <a href="javascript:void(0)" class="btn btn-success btn-pagar ml-2" data-persona="'.$row['persona'].'"> Pagar </a>'; 

          //se va a quitar el editar y el eliminar pues se trata de una consulta que toma una suma es decir es una agrupación
          //return '<a href="javascript:void(0)" class="btn btn-success btn-pagar ml-2" data-persona="'.$row['persona'].'"> Pagar </a>'; 

          //se va a quitar el boton de pagar
          return '<a href="javascript:void(0)" class="btn btn-success btn-pagar ml-2" data-persona="'.$row['nom_local'].'"> Devolver Dinero </a>'; 

      } 
      ) 
      ); 
// Include SQL query processing class 
require 'ssp.class.php'; 
// Output data as json format 
echo json_encode( 
SSP::simple( $_GET, $dbDetails, $table, $primaryKey, $columns ));