<?php 
	include 'connexion.php';

	$query = $connect->prepare("SELECT name FROM users");
	$query->execute();
	$result = $query->fetch(PDO::FETCH_ASSOC);
	var_dump($result);

	if(count($result) == 1){
		$message = "le login est deja utiliser";
		$valider = false;
		echo "<br><br> coolllllllll";
	}

?>