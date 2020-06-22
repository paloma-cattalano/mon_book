<?php

session_start();

if(array_key_exists('user',$_SESSION) && $_SESSION['user']){

$md5_pseudo = $_GET['id'];

include_once 'db.php';

$query = $link -> query("SELECT page FROM users WHERE MD5(pseudo) = '$md5_pseudo' "); 
$results = $query -> fetch();
$query -> closeCursor();

$bodyContent = $results['page']; 

include 'template.php';
}

else{
	header('location:index.php');
}
?>