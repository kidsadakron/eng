<?php

/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simply to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
include("../config.php");

// DB table to use
$table = 'user';

// Table's primary key
$primaryKey = 'id_number';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case object
// parameter names
$columns = array(
          
       
	array( 'db' => '`a`.`unit_id`',    'dt' => 'unit_id', 'field' =>'unit_id' ),
        array( 'db' => '`d`.`unit_name`',  'dt' => 'unit_name', 'field' => 'unit_name' ),
	array( 'db' => '`c`.`pname`',   'dt' => 'pname', 'field' => 'pname' ),
        array( 'db' => '`c`.`fname`',    'dt' => 'fname', 'field' => 'fname' ),
        array( 'db' => '`c`.`lname`',   'dt' => 'lname', 'field' => 'lname' ),
        array( 'db' => '`c`.`id_number`',   'dt' => 'id_number', 'field' => 'id_number' )
       
       
	
	
);
// { "data": "work_id" },
//			{ "data": "unit_name" },
//                        { "data": "pname" },
//			{ "data": "fname" },
//			{ "data": "lname" }
        
        
        /*header("Content-Type: text/html;charset=UTF-8");
mysql_connect("$host","$username","$password");*/
$sql_details = array(
	'user' => $username,
	'pass' => $password,
	'db'   => 'phol_eln',
	'host' => $host
);


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 * SELECT * FROM `Work_Student` AS a INNER JOIN `Student` AS b ON a.`student_id` = b.`student_id` INNER JOIN `Lesson` AS c ON a.`lesson_id`= c.`lesson_id`
 */

$Where = " b.status = 0 GROUP BY d.unit_name" ;
$joinQuery = "FROM work AS a INNER JOIN work_answer AS b ON a.work_id = b.work_id AND a.unit_id = b.unit_id INNER JOIN user AS c ON b.id_number = c.id_number INNER JOIN unit as d ON d.unit_id = a.unit_id";
require( 'ssp.customized.class.php' );

echo json_encode(
	//SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns ,$joinQuery,$Where)
        SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns, $joinQuery, $Where )
);

