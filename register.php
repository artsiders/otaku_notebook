<?php  
session_start();
	require_once "connexion.php";
	include "load.php";
?>
<?php include "load.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>register</title>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style type="text/css">
		body{
			display: flex;
			justify-content: center;
			height: 97vh;
			align-items: center;
			font-family: sans-serif;
			font-size: 18px;
			background: linear-gradient(to left bottom, #9f3737, #4b4bb7);
			overflow: hidden;
		}
		.container_form{
			display: grid;
			grid-template: 400px / 24vw 2fr;
			z-index: 9999999;
			animation: load .3s ease-in-out;
		}
		form{
			display: grid;
			background: linear-gradient(to top right,#2d1c53,#c11f1f);
			grid-template: auto / 1fr 3fr;
			padding: 30px;
			grid-gap: 20px;
			color: white;
			box-shadow: 0 0 40px #66b0ff;
		}
		.box_pass{
			display: grid;
			grid-template: auto / 8fr 1fr;
			grid-gap: 5px
		}
		.box_pass img{
			filter: invert(100%);
		}
		.container_form .form_cover{
			width: 100%;
		}
		.presentation{
			background-image: url(media/cover-form.png);
			background-size: cover;
			height: 113%;
			transform: translateY(-69px);
		}
		#name, #login, #email, #pass{
			height: 30px;
			outline: none;
			border: none;
			padding: 0 10px;
		}
		.error_mode{
			animation: errorChamp .6s .4s ease-in-out;
		}
		#profil{
		   	background: linear-gradient(to right,#492b8a,#c11f1f);
			padding: 3px 0 2px 5px;
			border-radius: 5px;
		}
		.submit{
			background: #620ec8;
			border-radius: 5px;
			color: white;
			cursor: pointer;
		}
		.back_login{
			position: relative;
		    float: right;
		    background: #ac0d0d;
		    border-radius: 5px;
		    color: white;
		    cursor: pointer;
		    display: flex;
		    align-items: center;
		}
		.back_login, .submit{
			height: 40px;
			border: none;
			font-size: 20px;
			padding: 0 20px;
		}
		.success_message{
		    grid-column: span 2;
		    background: linear-gradient(to left, #2dd698, #107d73);
		    color: #ffdfdf;
		    padding: 10px;
		    border-radius: 4px;
		    animation: successMessage 1.8s 1s ease-in-out;
		}
		.error_message{
		    grid-column: span 2;
		    background: linear-gradient(to left, #ff5650, #bf1e1e);
		    color: #ffdfdf;
		    padding: 10px;
		    border-radius: 4px;
		    animation: errorMessage 1.8s 1s ease-in-out;
		}

		@media screen and (max-width: 700px){
			body{overflow-y: scroll;}
			.back_login{font-size: 17px;}
			.container_form{
				display: flex;
				flex-direction: column;
				margin-top: 350px;
			}
			.presentation{
				height: 600px;
				background-image: url(media/cover-form-responsive.png);
				background-size: cover;
				transform: translateY(0px);
			}
		}
	</style>
</head>
<body>
<?php 
	if(isset($_GET) AND !empty($_GET)){
		$name = $_GET['name'];
		$login = $_GET['login'];
		$email = $_GET['email'];
		$pass = $_GET['pass'];
	}
	else{
		$name = $login = $email = $pass = "";
	}
?>
	<div class="container_form">
		<div class="presentation">
			<!-- <img class="form_cover" src="media/cover-form.png" > -->
		</div>
		<form action="register_process.php" method="POST" enctype="multipart/form-data">
			<label for="name">name</label>
			<input id="name" type="text" name="name" value="<?= $name?>" placeholder="entrer votre nom">

			<label for="login">login</label>
			<input id="login" type="text" name="login" value="<?= $login?>" placeholder="entrer votre login">

			<label for="email">email</label>
			<input id="email" type="email" name="email" value="<?= $email?>" placeholder="exemple@gmail.com">

			<label for="password">mot de passe</label>
			<div class="box_pass">
				<input id="pass"type="password" name="pass" value="<?= $pass?>" placeholder="entrer un mot de passe">
				<img class="img_toggel_pass" src="flaticon/red-eye.png">
			</div>

			<label for="sexe">sexe</label>
			<div class="box_radio_sexe">
				<span>Homme</span>
				<input type="radio" name="sexe" value="homme" checked>
				<span>Femme</span>
				<input type="radio" name="sexe" value="femme">
			</div>

			<label for="profil">profil</label>
			<input id="profil" type="file" name="profil" accept="image/*">

			<input class="submit" type="submit" value="s'enregistrer">
			<a href="login_form.php"><div class="back_login">j'ai déjâ un compte</div></a>

			<?php if(isset($_GET['message']) AND !empty($_GET['message'])): ?>
				<div class="error_message"><?= $_GET['message']; ?></div>
			<?php endif; ?>
			
		</form>
	</div>
<script type="text/javascript">

<?php  
	if(isset($_GET['champ']) AND !empty($_GET['champ'])):
		$champ = $_GET['champ'];
		if($champ == "error_pass"){
			?>document.getElementById("pass").classList.add("error_mode");<?php
		}
		if($champ == "error_email"){
			?>document.getElementById("email").classList.add("error_mode");<?php
		}
		if($champ == "error_login"){
			?>document.getElementById("login").classList.add("error_mode");<?php
		}
		if($champ == "error_name"){
			?>document.getElementById("name").classList.add("error_mode");<?php
		}
	endif; 
?>



	const showPass  = document.querySelector('.img_toggel_pass');
	showPass.addEventListener("click", showPassFun);

	function showPassFun(){
		// alert("cool");
		let pass = document.querySelector("#pass");
		let showPass = document.querySelector('.img_toggel_pass');
		attribut = pass.getAttribute("type");

		if(attribut == "password"){
			pass.setAttribute("type", "text");
			showPass.style.filter = `invert(0%)`;

		}
		if(attribut == "text"){
			pass.setAttribute("type", "password");
			showPass.style.filter = `invert(100%)`;
		}
		
	}
</script>
</body>
</html>