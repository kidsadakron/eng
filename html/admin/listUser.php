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
          
       
	array( 'db' => '`a`.`pname`',    'dt' => 'pname', 'field' =>'pname' ),
        array( 'db' => '`a`.`fname`',  'dt' => 'fname', 'field' => 'fname' ),
	array( 'db' => '`a`.`lname`',   'dt' => 'lname', 'field' => 'lname' ),
        array( 'db' => '`a`.`id_number`',    'dt' => 'id_number', 'field' => 'id_number' ),
        array( 'db' => '`a`.`email`',   'dt' => 'email', 'field' => 'email' ),
        array( 'db' => '`a`.`password`',   'dt' => 'password', 'field' => 'password' ),
       // array( 'db' => '`a`.`bday`',   'dt' => 'bday', 'field' => 'bday' ),
        array( 'db' => '`a`.`phone`',   'dt' => 'phone', 'field' => 'phone' )
       
	
	
);
//{ "data": "id_number" },
//                        { "data": "pd" },
//                        { "data": "class" },
//                        { "data": "sub_class" }
// SQL server connection information 
        
        
        /*header("Content-Type: text/html;charset=UTF-8");
mysql_connect("$host","$username","$password");*/
$sql_details = array(
	'user' => $username,
	'pass' => $password,
	'db'   => 'eln',
	'host' => $host
);


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 * SELECT * FROM `Work_Student` AS a INNER JOIN `Student` AS b ON a.`student_id` = b.`student_id` INNER JOIN `Lesson` AS c ON a.`lesson_id`= c.`lesson_id`
 */

$Where = "`a`.`role` = '1'" ;
$joinQuery = "FROM `user` AS a ";
require( 'ssp.customized.class.php' );

echo json_encode(
	//SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns ,$joinQuery,$Where)
        SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns, $joinQuery, $Where )
);

