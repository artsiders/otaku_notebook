<?php  
	require_once "connexion.php";
	if(isset($_POST) AND !empty($_POST)):
		$name = $_POST['name'];
		$state = $_POST['state'];
		$note = $_POST['note']."%";
		$valuation = $_POST['valuation'];
		$valider = true;

		// ------validation----------------------------------------
		if(empty($valuation)){
			$valider = false;
			$champ = "error_valuation";
			$message = "t'en pense quoi ?";
		}
		if(empty($note)){
			$valider = false;
			$champ = "error_note";
			$message = "donne une note";
		}
		if(empty($state)){
			$valider = false;
			$champ = "error_state";
			$message = "t'es a quel niveau avec le manga ?";
		}
		if(empty($name)){
			$valider = false;
			$champ = "error_name";
			$message = "il faut un nom !";
		}
	// -------------------------------------------------------------


		if(isset($_FILES['image']['name']) AND !empty($_FILES['image']['name'])){
				$image_name = $_FILES['image']['name'];
				$file_tmp_name = $_FILES['image']['tmp_name'];
				move_uploaded_file($file_tmp_name, "./images/$image_name");
		}
		else{
			$image_name = "Default.png";
		}

		if($valider){
			try {
				$query = $connect->prepare("INSERT INTO list_mangas(name,state,note,valuation,image_name) VALUES(?,?,?,?,?)");
				$query->execute(array($name,$state,$note,$valuation,$image_name));
				$message = true;
				header("location: add.php?message=$message");
			} catch (PDOException $e) {
				$message = false;
				header("location: add.php?message=$message");
			}
		}
		else{
			header("location: add.php?name=$name&state=$state&note=$note&valuation=$valuation&champ=$champ&message=$message");
		}

	endif;
?>