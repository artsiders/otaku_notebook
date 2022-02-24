<?php  
	require_once "connexion.php";
	
	if(isset($_GET) AND !empty($_GET)):
		$id = $_GET['id'];
		$query = $connect->prepare("DELETE FROM list_mangas WHERE id = ?");
		$query->execute(array($id));
		header("location: index.php");
	endif;

?>