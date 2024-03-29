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
$table = 'users'; 
// Table's primary key 
$primaryKey = 'id'; 
// Array of database columns which should be read and sent back to DataTables. 
// The `db` parameter represents the column name in the database.  
// The `dt` parameter represents the DataTables column identifier. 
$columns = array( 
array( 'db' => 'nombre', 'dt' => 0 ), 
array( 'db' => 'password',  'dt' => 1 ), 
array( 
'db'        => 'created_at', 
'dt'        => 2, 
'formatter' => function( $d, $row ) { 
return date( 'jS M Y', strtotime($row['created_at'])); 
} 
), 
array( 
'db'        => 'id',
'dt'        => 3, 
'formatter' => function( $d, $row ) { 
return '<a href="javascript:void(0)" class="btn btn-primary btn-edit" data-id="'.$row['id'].'"> Edit </a> <a href="javascript:void(0)" class="btn btn-danger btn-delete ml-2" data-id="'.$row['id'].'"> Delete </a>'; 
} 
) 
); 
// Include SQL query processing class 
require 'ssp.class.php'; 
// Output data as json format 
echo json_encode( 
SSP::simple( $_GET, $dbDetails, $table, $primaryKey, $columns ));