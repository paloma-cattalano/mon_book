<?php

session_start();

if(isset($_POST['pseudo']) && isset($_POST['password']) && !empty($_POST['pseudo']) && !empty($_POST['password'])){
	include_once '../db.php';
	$pseudo = $_POST['pseudo'];
	$password = $_POST['password'];
	$query = $link -> query ("SELECT * FROM users WHERE pseudo = '$pseudo'");
	$results = $query -> fetch();
	if(count($results) <= 1){
		header('location:../login.php?fail=pseudo');
		exit;
	}
	if(password_verify($password,$results['password'])){
		$_SESSION['login']= TRUE;
		if(trim($results['rank'] == 'admin')){
			$_SESSION['admin']= TRUE;
			header('location:admin_index.php');
		}
		else{
			$_SESSION['user']= md5($pseudo);
			header('location:../user.php?id='.md5($pseudo));
		}
	}
	else{
		header('location:../login.php?fail=pwd');
	}
}
else{
	header('location:../login.php?fail=empty');
}

?>
