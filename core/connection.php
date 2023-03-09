<?php

$user = "root";
$password ="";
$db_name="tek_study";

$conn = new PDO("mysql:host=127.0.0.1; dbname=".$db_name."; charset=utf8", $user,$password);

$conn->setAttribute(PDO::ATTR_ERRMODE,pdo::ERRMODE_EXCEPTION);
$conn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);

?>