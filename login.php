<?php

session_start();

if(isset($_GET['login']) && $_GET['login']){
		$_SESSION['login'] = false;
		unset ($_SESSION['admin']);
		unset ($_SESSION['user']);
		header('location:index.php');
		exit;
	}

$bodyContent='<!>';
	if(isset($_GET['fail'])){
		$fail = $_GET['fail'];
		if($fail == 'pwd'){
	$bodyContent .= '
<p>Mot de passe incorrect&nbsp;!</p>';
		}
		else if($fail == 'pseudo'){
		$bodyContent .= '
<p>Pseudo inconnu&nbsp;!</p>';
		}
		else if($fail == 'empty'){
			$bodyContent .= '
<p>Champ(s) vide(s)&nbsp;!</p>';
		}

	}

	$bodyContent.='
<form method="post" action="admin/verif_auth.php" class="form_accueil">
	<label>Pseudo</label><input type="text" name="pseudo" class="input_accueil">
	<label>Mot de passe</label><input type="password" name="password" class="input_accueil">
	<button type="submit" class="input_accueil">Envoyer</button>
</form>
<!>
';

include 'template.php';

?>
