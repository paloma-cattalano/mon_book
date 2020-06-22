<?php

session_start();

if(array_key_exists('admin',$_SESSION) && $_SESSION['admin']){

include_once '../db.php';

if(array_key_exists('id',$_POST)){
	$id=$_POST['id'];
	$query = $link -> query ("DELETE FROM projects WHERE id = '$id'");

}



$query = $link -> query ("SELECT * FROM projects ORDER BY priority DESC, date DESC, title ASC");
$results = $query -> fetchAll();
$query -> closeCursor();

if(count($results) == 0){
	$bodyContent.='<p>Aucun résultat</p>';
}
else{
	$bodyContent = '
	<a href="admin_project.php?id=0" class="add_project">Créer un nouveau projet</a>

	<div class="menu_projet"><ul>';

	foreach($results as $result){
		$images = explode('|',$result['img']);
		$image = $images[0];
	$bodyContent.='
	<li>
		<div class="space">
			<a href="admin_project.php?id='.$result['id'].'">
			<br><img src="../img/'.$image.'" width=140vh height=120vh></a>
			<br>'.trim($result['title']).'
		</div>
	</li>';
	}

	$bodyContent.='
</ul>
</div>
<!>
';
}

include_once "template.php";

}

else{
	header('location:../index.php');
}

?>
