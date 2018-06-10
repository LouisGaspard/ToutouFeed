<?php @session_start(); ?>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Toutoufeed</title>
	</head>

	<body style="background: url('images/fondsite.jpg') no-repeat;">
		<header>
			<nav>
				<table>
					<tr>
						<th class="img">
						<link rel="stylesheet" href="design.css">
						<a href="index.php"><img style="width: 128px; height: 127px;"
						src="images/toutoufeedlogo.jpeg"></a></th>
		</header>
		<th><a href="index.php">ACCUEIL</a></th>
		<?php
		if(!$_SESSION['connected'])
		{
		?>
		<th><a href="Connexion.php">CONNEXION</a></th>
		<?php }
		else
		{
		?>
		<th><a href="Géolocalisation.php">GEOLOCALISATION</a></th>
		<th><a href="Alimentation.php">ALIMENTATION</a></th>
		<th><a href="Surveillance.php">SURVEILLANCE</a></th>
		<?php
		}
		?>
		</tr>
		</table>
		</nav>
		
		<?php
		if($_SESSION['connected'])
		{
			echo "Connecté sous le nom de : " . $_SESSION['info']->nom;
			echo '<a id="logout" href="logout.php">deconnexion</a>';
		}
		?>