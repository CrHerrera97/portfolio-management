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
// mysql db table to use
$table = <<<EOT
(
    SELECT
    l.numero AS local_numero,
    concat(p.nombre,' ',p.apellido) as persona_nombre,
    SUM(i.saldo) AS sumatoria_total
FROM
    ingresos i
    INNER JOIN locales l ON i.local_fk = l.id
    INNER JOIN personas p ON i.persona_fk = p.id
WHERE
    i.categoria = 'cartera'
GROUP BY
    p.id,
    p.nombre,
    l.numero
) temp
EOT;

// Table's primary key
$primaryKey = 'local_numero';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database.
// The `dt` parameter represents the DataTables column identifier.
$columns = array(
    array('db' => 'local_numero', 'dt' => 0),
    array('db' => 'persona_nombre', 'dt' => 1),
    array('db' => 'sumatoria_total', 'dt' => 2),
);

// Include SQL query processing class
require 'ssp.class.php';

// Output data as json format
echo json_encode(
    SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns)
);
