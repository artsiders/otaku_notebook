<?php  
	require_once "connexion.php";

	if(!empty($_POST) AND !empty($_GET)){
		$id = $_GET['id'];
		$name = htmlspecialchars($_POST['name']);
		$state = htmlspecialchars($_POST['state']);
		$note = htmlspecialchars($_POST['note']);
		$valuation = htmlspecialchars($_POST['valuation']);
		

		try {
			$query = $connect->prepare("UPDATE list_mangas SET name=?,state=?,note=?,valuation=? WHERE id =?");
			$query->execute(array($name,$state,$note,$valuation,$id));

			if(isset($_GET['inc_form']) AND !empty($_GET['inc_form'])){
				$message ="donnée mis à jour :)";
				header("location: show.php?id=$id&message=$message&error=false");
			}
			else{
				$message = "donnée invalide"; //y'a un problème avec la base de donnée :(
				header("location: show.php?id=$id&message=$message&error=true");
			}
		} 
		catch (PDOException $e) {
			$message =   "erreur : ".$e->getMessage();
			header("location: show.php?id=$id&message=$message&error=true");

		}
	}
