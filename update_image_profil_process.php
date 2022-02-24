<?php  

	require_once "connexion.php";
	echo "yes";
	if(isset($_GET['id']) AND !empty($_GET['id'])){
		$id = $_GET["id"];
		$name_profil = $_FILES["profil"]["name"];
		$file_tmp_name = $_FILES["profil"]["tmp_name"];
		move_uploaded_file($file_tmp_name, "./profils/$name_profil");

		try {
			$query = $connect->prepare("UPDATE users SET name_profil=? WHERE id=?");
			$query->execute(array($name_profil,$id));
			$message = "image de profil modifier :)";
			header("location: profil.php?update=true&message=$message&error=false");
		} 
		catch (PDOException $e) {
			echo  "erreur : ".$e->getMessage();
		}
	}


?>