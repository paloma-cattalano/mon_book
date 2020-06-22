<?php

session_start();

include_once 'db.php';

$query = $link -> query ("SELECT tag FROM projects");
$results = $query -> fetchAll();
$query -> closeCursor();

$tags = array();
foreach($results as $result){
	$row_tags = explode('|',$result['tag']);
	foreach($row_tags as $tag){
		if(!array_key_exists(trim($tag), $tags)) {
			$tags[$tag] = 0;
		}
	}
}

$bodyContent = '<!>
<div class="tag">Filtrer par mot-clé&nbsp;:
	<ul>
		<li><a href="projects.php">Aucun</a></li>';
$keys = array_keys($tags);
foreach ($keys as $key){
	$bodyContent .=		'<li><a href="projects.php?tag='.$key.'">'.$key.'</a></li>';
	}
$bodyContent .=	'
	</ul>
</div>
';

if(isset($_GET['tag'])){
	$tag = $_GET['tag'];
}
else {
	$tag ='';
}

$query = $link -> query ("SELECT * FROM projects WHERE tag LIKE '%$tag%' ORDER BY priority DESC, date DESC, title ASC");
$results = $query -> fetchAll();
$query -> closeCursor();

if(count($results) == 0){
	$bodyContent.='<p>Aucun résultat</p>';
}
else{
	$bodyContent.='<div class="menu_projet">
	<ul>';
	$orderedResults=array();
	foreach($results as $result){array_push($orderedResults,$result['id']);}
	foreach($results as $result){
		$images = explode('|',$result['img']);
		$image = $images[0];
	$bodyContent.='

	<li>
	<div class="space">
	<a href="project.php?id='.$result['id'].'&list='.implode(",",$orderedResults).'">
	<img src="img/'.$image.'" width="150vw" height="130vh">
	<div class="legend">'.trim($result['title']).'</div>
	</a>
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

?>
