<DOCTYPE html>

<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
	<link rel="stylesheet" href="bootstrap.css">
	<link rel="stylesheet" href="style.css">


</head>
<body>

	<?php
		$var = 'futuregames';
		include ('menu.php');
		$database = [
	'host' => 'localhost',
	'base' => 'siteweb1',
	'user' => 'root',
	'password' => '',
	];

	try {
	  $instance = new PDO("mysql:host=".$database['host'].";dbname=".$database['base'],$database['user'],$database['password']);
	    $instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
	    echo 'Échec lors de la connexion : ' . $e->getMessage();
	}




$reponse = $instance->query('SELECT * FROM jeux');

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{?>
			<!-- LA CARTE -->
	<div class="card" style="width: 18rem;">
		<img class="card-img-top" src="data/ala.jpg" alt="Card image cap">
		<div class="card-body">
			<h5 class="card-title"> <?php $donnees['title'] ?> </h5>
			<p class="card-text"> <?php $donnees['content'] ?> </p>
		</div>
		<div class="card-body">
			<a href=index.php?id<?php $donnees['id'] ?> class="Card link">Voici le premier</a>
		</div>
	</div>
 <?php
}
?>



</body>
</html>
