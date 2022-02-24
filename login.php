<?php  
	session_start();
	require_once "connexion.php";
	if(isset($_POST) AND !empty($_POST)){
		$login = $_POST["login"];
		$pass = $_POST["pass"];

		$sql = "SELECT * FROM users WHERE login = ? AND pass = ?";
		$query = $connect->prepare($sql);
		$query->execute(array($login, $pass));
		$result = $query->fetchAll(PDO::FETCH_ASSOC);

		// var_dump($result);

		if(count($result) == 1) {
			$_SESSION['user_notebook'] = $login;
			header("Location: index.php");
			// echo "
			// 	<script type='text/javascript'>
			// 		function location(){
			// 			//setTimeout('alert('cool')',5000);
			// 		}
			// 		location();
			// 		alert('cool');
			// 	</script>
			// 	";
			
		}
		else{
			header("Location: login_form.php?message=erreur");
		}
	}
