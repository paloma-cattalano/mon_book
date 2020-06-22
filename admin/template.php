<!DOCTYPE html>
<html>
	<head>
		<title>Paloma Cattalano</title>
		<link rel="stylesheet" type="text/css" href="../css/template.css" media="screen" />
	</head>
	<body>
		<div id="header">
			<div class="content">

				<div class="menu_admin">
					<h1>Administration</h1>
					
				<?php
				if(array_key_exists('login',$_SESSION) && $_SESSION['login'])
				{echo '<li><a href="../login.php?login=true">Déconnexion</a></li>';}
					else{echo '<li><a href="../login.php">Login</a></li>';}
				?>
			</div>

				<ul class="menu">
					<li><a <?php if(basename($_SERVER['PHP_SELF']) == 'admin_index.php') { echo 'class="active"';}?> href="admin_index.php">Modifier l'accueil</a></li>
					<li><a <?php if(basename($_SERVER['PHP_SELF']) == 'admin_projects.php') { echo 'class="active"';}?> href="admin_projects.php">Gestion des projets</a></li>
					<li><a <?php if(basename($_SERVER['PHP_SELF']) == 'admin_users.php') { echo 'class="active"';}?> href="admin_users.php">Gestion des utilisateurs</a></li>
					<li><a <?php if(basename($_SERVER['PHP_SELF']) == 'index.php') { echo 'class="active"';}?> href="../index.php">Accueil</a></li>
					<li><a <?php if(basename($_SERVER['PHP_SELF']) == 'projects.php') { echo 'class="active"';}?> href="../projects.php">Projets</a></li>
					<li><a <?php if(basename($_SERVER['PHP_SELF']) == 'user.php') { echo 'class="active"';}?> href="../user.php">Mon compte</a></li>
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
			</div>
		</div>
	</body>
</html>
