<?php

include_once 'db.php';

$query = $link -> query("SELECT index_picture_url, index_title, index_description FROM content");
$results = $query -> fetch();
$query -> closeCursor();

$picture_url = trim($results['index_picture_url']);
$title = trim($results['index_title']);
$description = trim($results['index_description']);

session_start();

$bodyContent = '<!>
<div class="card_accueil">

<img src="./img/'.$picture_url.'" alt="image_accueil" width="500vw" height="300vh" >

<div class="texte_accueil">
<h2>'.$title.'</h2>
<p>'.$description.'</p>
</div>

</div>
';


if(isset($_SESSION['user'])){
$bodyContent .= '
<a href="user.php?id='.$_SESSION['user'].'">Mon compte</a>
';

}

$bodyContent .= '<!>
';

include_once "template.php";

?>
