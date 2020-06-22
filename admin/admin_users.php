<?php

session_start();

if(array_key_exists('admin',$_SESSION) && $_SESSION['admin']){

	include_once '../db.php';

if(array_key_exists('id',$_POST)){
		$id = $_POST['id'];
		$page = $_POST['page'];
		$rank = $_POST['rank'];

		$query = $link -> query ("UPDATE users SET rank = '$rank', page = '$page' WHERE id  = '$id' ");
	}

	$query = $link -> query ("SELECT id, pseudo, rank, page FROM users");
	$results = $query -> fetchAll();
	$query -> closeCursor();


$bodyContent='<!>';
	foreach($results as $result){
		$id= trim($result['id']);
		$page = trim($result['page']);
		$rank = trim($result['rank']);
		$pseudo = trim($result['pseudo']);
		$bodyContent.='
		<form method="post" action="admin_users.php" class="form_accueil">

			<input type="hidden" value="'.$id.'" name="id">

			<label>Pseudo</label>
			<input disabled="disabled" value="'.$pseudo.'" name="pseudo" class="input_accueil">
			<label>Statut</label>
			<select name="rank" class="input_accueil">
			   <option value="admin">admin</option>
				 <option ';if($rank != 'admin'){$bodyContent .= ' selected';} $bodyContent.= '>visiteur</option>
			</select>
			<label>Message</label>
			<textarea name="page" rows="5" cols="20">'.$page.'</textarea>

			<button type="submit" class="input_accueil">Modifier</button>
	</form>';
	}

$bodyContent.='
<!>';


	include_once "template.php";

}

else{
	header('location:../index.php');
}

?>
