<?php
header("Content-Type: text/html;charset=UTF-8");
include("config.php");

try {
    $conn = new PDO("mysql:host=$host;dbname=e_eng", $username, $password);

    }
catch(PDOException $e){
        die("error: " . $e->getMessage());
}
                