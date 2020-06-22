<?php

$server = 'localhost';
$user = 'root';
$password = 'root';
$dbname = "monbook_paloma";

// include_once 'admin/config_db.php';

$link = new PDO("mysql:host=$server;dbname=$dbname",
$user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

?>
