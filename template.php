<!DOCTYPE html>
<html>
	<head>
		<title>Paloma Cattalano</title>
		<link rel="stylesheet" type="text/css" href="css/template.css" media="screen" />
	</head>
	<body>

		<div id="header">
			<div class="content">

			<h1>Paloma Cattalano</h1>

				<ul class="menu">
					<?php if(array_key_exists('admin',$_SESSION) && $_SESSION['admin']){echo'
					<li><a '; if(basename($_SERVER['PHP_SELF']) == 'admin/admin_index.php') { echo 'class="active"';}
					echo 'href="admin/admin_index.php">Modifier l\'accueil</a></li>
					<li><a '; if(basename($_SERVER['PHP_SELF']) == 'admin_projects.php') { echo 'class="active"';}echo' href="admin/admin_projects.php">Gestion des projets</a></li>
					<li><a ';if(basename($_SERVER['PHP_SELF']) == 'admin_users.php') { echo 'class="active"';} echo' href="admin/admin_users.php">Gestion des utilisateurs</a></li>';
					}
					?>
					<li><a <?php if(basename($_SERVER['PHP_SELF']) == 'index.php') { echo 'class="active"';}?> href="index.php">Accueil</a></li>
					<li><a <?php if(basename($_SERVER['PHP_SELF']) == 'projects.php') { echo 'class="active"';}?> href="projects.php">Les projets</a></li>
					<li><a <?php if(basename($_SERVER['PHP_SELF']) == 'contact.php') { echo 'class="active"';}?> href="contact.php">Me contacter</a></li>
					<?php
					if(array_key_exists('login',$_SESSION) && $_SESSION['login'])
					{echo '<li><a href="login.php?login=true">Déconnexion</a></li>';}
						else{echo '<li><a href="login.php">Login</a></li>';}
					?>
				</ul>
				
			</div>
		</div>

		<div id="body">
			<div class=content>
<?php echo $bodyContent;?>
			</div>
		</div>
		<div id="footer">
			<div class="content">
				<span>© Paloma Cattalano 2020</span>
				<ul class="menu">
					<li><a href="https://fr.linkedin.com/">Linkedin</a></li>
					<li><a href="https://www.instagram.com/?hl=fr">Instagram</a></li>
					<li><a href="https://fr-fr.facebook.com/">Facebook</a></li>
					<li><a href="https://twitter.com/explore">Twitter</a></li>
				</ul>
			</div>
		</div>
	</body>
</html>
