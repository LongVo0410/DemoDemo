<?php
// Database connection details
$db_user = "root";
$db_pass = "";
$db_name = "dulieu";
$host = "localhost";
// Connect to the database
// $db = new PDO("mysql:host=$host;dbname=$db_name", $db_user, $db_pass);
// $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$connect=mysqli_connect($host,$db_user,$db_pass,$db_name);
?>
