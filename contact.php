<?php

session_start();

include_once 'db.php';

$query = $link -> query("SELECT email, phone FROM content");
$results = $query -> fetch();
$query -> closeCursor();

$email = trim($results['email']);
$phone = trim($results['phone']);



$bodyContent = '<!>
<div class="contact">
	<p>Email&nbsp;: '.$email.'</p>
	<p>Téléphone&nbsp;: '.$phone.'</p>
</div>


	<form method="post" action="contact.php" class="form_accueil">

	<h3>Créer un compte pour recevoir notre incroyable newsletter :</h3>

		<label>Pseudo : </label><input name="pseudo" type="text" class="input_accueil">
		<label>Mot de passe : </label><input name="password" type="text" class="input_accueil">
		<label>Courriel : </label><input name="email" type="text" class="input_accueil">
		<button type="submit" class="input_accueil">Créer un compte</button>
	</form>



<!>
';

include_once 'template.php';

if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']) &&  isset($_POST['pseudo']) && !empty($_POST['pseudo']) ){
	$pseudo = $_POST['pseudo'];
	$email = $_POST['email'];
	$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
	$query = $link -> query("INSERT INTO users (email, pseudo, password, page) VALUES ( '".$email."', '".$pseudo."', '".$password."', 'Bonjour ".$pseudo."') ");
	}

?>
