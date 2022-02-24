<?php  
	session_start();
	require_once "connexion.php";

	if(!empty($_POST AND !empty($_GET))){
		$id = $_GET['id'];
		$name = htmlspecialchars($_POST['name']);
		$login = htmlspecialchars($_POST['login']);
		$email = htmlspecialchars($_POST['email']);
		$pass = htmlspecialchars($_POST['pass']);		

		try {
			$query = $connect->prepare("UPDATE users SET name=?,login=?,email=?,pass=? WHERE id=?");
			$query->execute(array($name,$login,$email,$pass,$id));
			$_SESSION["user_notebook"] = $login;
			$message ="profil mis à jour :)";
			header("location: profil.php?update=true&message=$message&error=false");

			// if(isset($_GET['inc_form']) AND !empty($_GET['inc_form'])){
			// 	$message ="donnée mis à jour :)";
			// 	header("location: show.php?id=$id&message=$message&error=false");
			// }
			// else{
			// 	$message = "donnée invalide"; //y'a un problème avec la base de donnée :(
			// 	header("location: show.php?id=$id&message=$message&error=true");
			// }
		} 
		catch (PDOException $e) {
			$message =   "erreur : ".$e->getMessage();
			header("location: profil.php?update=true&message=$message&error=true");

		}
	}
