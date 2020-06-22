<?php

session_start();

if(array_key_exists('admin',$_SESSION) && $_SESSION['admin']){

	include_once '../db.php';

	if(isset($_GET['id'])){
		$id = $_GET['id'];
		if($id==0){
			$bodyContent='
			<!>
			<form method="post" action="admin_project.php" class="form_accueil">

			<label>Titre :</label>
			<input name="title" class="input_projet">

			<label>Description :</label>
			<textarea name="description" class="" rows="10" cols="33">
			</textarea><br>

			<label>Date :</label>
			<input placeholder="XXXX-XX-XX" name="date" class="input_projet">

			<label>Url :</label>
			<input name="url" class="input_projet">

			<label>Mot-clé :</label>
			<input name="tag" class="input_projet">

			<label>Images :</label>
			<input name="img" class="input_projet">

			<label>Ordre :</label>
			<input name="order" class="input_projet">

			<button type="submit" class="input_accueil">Ajouter</button>

			</form>
			<!>
			';
		}
		else{
			$query = $link -> query ("SELECT * FROM projects WHERE id = '$id'");
			$results = $query -> fetch();
			$query -> closeCursor();
			$order = trim($results['priority']);
			$url = trim($results['url']);
			$tag = trim($results['tag']);
			$date = trim($results['date']);
			$img = trim($results['img']);
			$title = trim($results['title']);
			$description = trim($results['description']);

			$bodyContent='
			<!>
			<form method="post" class="form_accueil">

			<input value="'.$id.'" type="hidden" name="id">

			<label>Titre :</label>
			<input value="'.$title.'" name="title" class="input_projet">

			<label>Description :</label>
			<textarea name="description" class="" rows="10" cols="33">'.$description.'</textarea>

			<label>Date :</label>
			<input value="'.$date.'" placeholder="XXXX-XX-XX" name="date" class="input_projet">

			<label>Mot-clé :</label>
			<input value="'.$tag.'" name="tag" class="input_projet">

			<label>Url :</label>
			<input value="'.$url.'" name="url" class="input_projet">

			<label>Images :</label>
			<input value="'.$img.'" name="img" class="input_projet">

			<label>Ordre :</label>
			<input value="'.$order.'" name="order" class="input_projet">

			<button type="submit" formaction="admin_projects.php" class="input_accueil">Supprimer</button>

			<button type="submit" formaction="admin_project.php" class="input_accueil">Modifier</button>

			</form>
			<!>
			';
		}

		include 'template.php';

	}


	else {
		$description = $_POST['description'];
		$title = $_POST['title'];
		$img = $_POST['img'];
		$date = $_POST['date'];
		$order = $_POST['order'];
		$url = $_POST['url'];
		$tag = $_POST['tag'];
		if(array_key_exists('id', $_POST)){
			$id = $_POST['id'];
			$query = $link -> query ("UPDATE projects SET description = '$description', title = '$title', img = '$img', priority = '$order', date='$date', url = '$url'	, tag = '$tag'	WHERE id = $id ");
		}
		else {

			$query = $link -> query ("INSERT INTO projects (description, title, img, priority, date, url, tag) VALUES ( '".$description."' ,  '".$title."',  '".$img."',  ".$order.", '".$date."',  '".$url."' , '".$tag."') ");


		$bodyContent='zoul'.$tag.$date.$description.$img.$url.$order.$title."INSERT INTO projects (description, title, img, priority, date, url, tag) VALUES ( '".$description."' ,  '".$title."',  '".$img."',  ".$order.", '".$date."',  '".$url."' , '".$tag."') ";
		include 'template.php';
		}

		header('location:admin_projects.php');

	}
}

else{
	header('location:../index.php');
}

?>
