<?php

session_start();

if(isset($_GET['id'])){

	include_once 'db.php';

	$id = $_GET['id'];
	$query = $link -> query ("SELECT * FROM projects WHERE id = '$id'");
	$results = $query -> fetch();
	$query -> closeCursor();

	if(count($results) <= 1){
		header('location:projects.php');
		exit;
	}

  $title = trim($results['title']);
	$description = trim($results['description']);
	$date = trim($results['date']);
	$images = explode("|",$results['img']);
	$url = trim($results['url']);
	$tag = trim($results['tag']);

	$list = $_GET['list'];
	$array = explode(',',$_GET['list']);

	$left = true;
	$right = true;
	$index = array_search($id,$array);
	if($index-1 < 0){
		$left=false;
	}
	else{
		$previous = $index-1;
		$previous_id = $array[$previous];
	}
	if($index + 1 >= count($array)){
		$right = false;
	}
	else{
		$next = $index+1;
		$next_id = $array[$next];
	}

	if($left && $right){
		$bodyContent='<!>

<div class="card_accueil">
<div class="texte_accueil">
<h1>'.$title.'</h1>
<p>'.$description.'</p>
<p>'.$tag.'</p>
<p>'.$date.'</p>
<p>'.$url.'</p>
</div>
';

		foreach($images as $image){
			$bodyContent.='
<img src="img/'.$image.'" width=500vw height=450vh></div>
';
		}


		$bodyContent.='
    <div class="pagination">
<a href="project.php?id='.$previous_id.'&list='.$list.'"> <- Previous</a>
<a href="project.php?id='.$next_id.'&list='.$list.'">Next -> </a>
   </div>
<!>
';
	}
	else if($left){
		$bodyContent='<!>

    <div class="card_accueil">
    <div class="texte_accueil">
    <h1>'.$title.'</h1>
    <p>'.$description.'</p>
    <p>'.$tag.'</p>
    <p>'.$date.'</p>
    <p>'.$url.'</p>
    </div>
    ';

		foreach($images as $image){
			$bodyContent.='
<img src="img/'.$image.'" width=500vw height=450vh></div>';
		}
		$bodyContent.='
		<div class="pagination">
     <a href="project.php?id='.$previous_id.'&list='.$list.'"> <-Previous</a>
    </div>
<!>
';
	}
	else if($right){
		$bodyContent='<!>

    <div class="card_accueil">
    <div class="texte_accueil">
    <h1>'.$title.'</h1>
    <p>'.$description.'</p>
    <p>'.$tag.'</p>
    <p>'.$date.'</p>
    <p>'.$url.'</p>
    </div>
    ';

		foreach($images as $image){
			$bodyContent.='
<img src="img/'.$image.'" width=500vw height=450vh></div>';
		}

		$bodyContent.='
		<div class="pagination">
     <a href="project.php?id='.$next_id.'&list='.$list.'">Next -> </a>
		</div> 
<!>
';
	}
	else{
		$bodyContent='<!>

    <div class="card_accueil">
    <div class="texte_accueil">
    <h1>'.$title.'</h1>
    <p>'.$description.'</p>
    <p>'.$tag.'</p>
    <p>'.$date.'</p>
    <p>'.$url.'</p>
    </div>
    ';

		foreach($images as $image){
			$bodyContent.='
<img src="img/'.$image.'" width=500vw height=450vh></div>';
		}
		$bodyContent.='
<!>
';
	}

include_once "template.php";

}

else{
	header('location:projects.php');
}

?>
