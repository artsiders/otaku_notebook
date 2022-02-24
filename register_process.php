<?php include "load.php"; ?>
<?php  
	require_once "connexion.php";
	if(isset($_POST) AND !empty($_POST)){
		$name = htmlspecialchars($_POST["name"]);
		$login = htmlspecialchars($_POST["login"]);
		$email = htmlspecialchars($_POST["email"]);
		$pass = htmlspecialchars($_POST["pass"]);
		$sexe = $_POST["sexe"];
		$valider = true;

		// verification et validation du formulaire
		if(strlen($pass) < 6){
			$message = "le mot de passe doit contenir 6 caractère minimum";
			$valider = false;
			$champ = "error_pass";
		}
		if(empty($pass)){
			$message = "le mot de passe est obligatoire !";
			$valider = false;
			$champ = "error_pass";
		}
		if(empty($email)){
			$message = "le champ email est obligatoire !";
			$valider = false;
			$champ = "error_email";
		}
		if(empty($login)){
			$message = "le champ login est obligatoire !";
			$valider = false;
			$champ = "error_login";
		}
		//_________________important____________________________________
		if(!empty($login)){
			$query = $connect->prepare("SELECT * FROM users WHERE login = ?");
			$query->execute(array($login));
			$result = $query->fetchAll(PDO::FETCH_ASSOC);

			if(count($result) != 0){
				$message = "le login est deja utiliser";
				$valider = false;
				$champ = "error_login";
			}
		}
		//_______________________________________________________________
		if(empty($name)){
			$message = "le champ nom est obligatoire !";
			$valider = false;
			$champ = "error_name";
		}
		
		// l'image n'est pas obligatoire, je verifie donc si elle exite avant de la deplacer
		if(isset($_FILES['profil']['name']) AND !empty($_FILES['profil']['name'])){
			$name_profil = $_FILES["profil"]["name"];
			$file_tmp_name = $_FILES["profil"]["tmp_name"];
			move_uploaded_file($file_tmp_name, "./profils/$name_profil");
		}
		else{
			$name_profil = "default_profil.png";
		}
	}
	// si le formulair est bien rempli, j'envoie les information dans la base de donnée 
	if($valider){
		try {
			$sql = "INSERT INTO users(name, login, email, pass, sexe, name_profil)
					VALUES(?,?,?,?,?,?)";
			$query = $connect->prepare($sql);
			$result = $query->execute(array($name, $login, $email, $pass, $sexe, $name_profil));
			$message = "connecter vous en tant que $login :)";
			header("location: login_form.php?message=$message&regis=true&login=$login");
		} catch (PDOException $e) {
			$message = "une erreur est survenue :( essayer plus tard";
			header("location: register.php?message=$message");
			echo "erreur". $e->getMessage();
		}
	}
	else{
		header("location: register.php?message=$message&name=$name&login=$login&email=$email&pass=$pass&champ=$champ");
	}


?>