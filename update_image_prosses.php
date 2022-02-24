<?php  

	require_once "connexion.php";

	if(!empty($_GET["idImg"]) AND !empty($_GET["id"])){
		$id = $_GET["id"];
		$image_name = $_FILES["image"]["name"];
		$file_tmp_name = $_FILES["image"]["tmp_name"];
		move_uploaded_file($file_tmp_name, "./images/$image_name");

		try {
			$query = $connect->prepare("UPDATE list_mangas SET image_name= ? WHERE id =?");
			$query->execute(array($image_name,$id));
			$message = "image modifier";
			header("location: show.php?id=$id&message=$message&error=false");
		} 
		catch (PDOException $e) {
			echo  "erreur : ".$e->getMessage();
		}
	}


?>