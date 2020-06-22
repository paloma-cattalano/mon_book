<?php

session_start();

if(array_key_exists('admin',$_SESSION) && $_SESSION['admin']){


	include_once '../db.php';

	if(isset($_POST['description']) || isset($_POST['title']) || isset($_POST['picture'])){
		$description = $_POST['description'];
		$title = $_POST['title'];
		$picture_url = $_POST['picture_url'];
		$query = $link -> query ("UPDATE content SET index_description = '$description', index_title = '$title', index_picture_url = '$picture_url' ");
		}

	$query = $link -> query ("SELECT index_picture_url, index_title, index_description FROM content");
	$results = $query -> fetch();
	$picture_url = trim($results['index_picture_url']);
	$title = trim($results['index_title']);
	$description = trim($results['index_description']);
	$query -> closeCursor();

	$bodyContent='<!>
<form method="post" action="admin_index.php" class="form_accueil">
	<label>Titre :</label><input value="'.$title.'" name="title" class="input_accueil">
	<label>Description :</label><br>
	<textarea name="description" class="form_accueil" rows="5" cols="33">
	'.$description.'</textarea>
	<br>
	<label>Url photo :</label><input value="'.$picture_url.'" name="picture_url" class="input_accueil">
	<button type="submit" class="input_accueil">Modifier</button>
</form>
<!>';

	include 'template.php';

}

else{
	header('location:../index.php');
}

?>
