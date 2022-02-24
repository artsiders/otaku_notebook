<?php
session_start();
require_once "connexion.php";

if (isset($_SESSION['user_notebook']) and !empty($_SESSION['user_notebook'])) {

	$sql = "SELECT * FROM users WHERE login = ?";
	$query = $connect->prepare($sql);
	$query->execute(array($_SESSION['user_notebook']));
	$result = $query->fetch(PDO::FETCH_ASSOC);
?>
	<?php include "load.php"; ?>
	<!DOCTYPE html>
	<html lang="fr">

	<head>
		<title>profil utilisateur</title>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<style type="text/css">
			body {
				display: flex;
				justify-content: center;
				height: 100vh;
				align-items: center;
				font-family: sans-serif;
				font-size: 18px;
				color: white;
				background: linear-gradient(to left bottom, #9f3737, #4b4bb7);
				overflow: hidden;
			}

			.header form {
				background: transparent;
			}

			.commande form {
				display: none;
			}

			.content_profil {
				display: flex;
				flex-direction: column;
				justify-content: center;
				width: 60vw;
			}

			.content_profil img {
				border-radius: 50%;
				width: 200px;
				height: 200px;
				animation: load .3s ease-in-out;

			}

			.content_profil h2 {
				color: white;
			}

			.content_profil button {
				color: white;
				height: 40px;
				border-radius: 4px;
				border: none;
				background: #313131;
				padding: 0 10px;
			}

			.btn_update_profil {
				background-color: #9d00ff !important;

			}

			.info {
				background: linear-gradient(to top left, #9f3737a1, #1b1b6836);
				line-height: 40px;
				padding: 20px;
				margin-top: 20px;
				animation: loadX .3s ease-in-out;
			}

			.header {
				position: fixed;
				top: 0;
				left: 0;
				width: 100%;
			}

			.header button {
				border: none;
				width: 120px;
				font-size: 18px;
			}

			.header input {
				display: none;
			}

			.header .profil {
				background-color: #ae1d54;
			}

			.footer {
				position: fixed;
				bottom: 0;
				width: 100%;
			}

			@media screen and (max-width: 700px) {
				body {
					overflow-y: scroll;
					background: #4b4bb7;
				}

				.content_profil {
					display: flex;
					flex-direction: column;
					margin-top: 300px;
					/*margin-botton: 200px;*/
				}

				.footer footer {
					display: none;
				}

				.header .profil {
					background-color: transparent;
				}

				.header {
					background-color: transparent;
					position: absolute;
				}

				.min_search {
					margin: 0;
				}

				.container_form .presentation {
					background-size: cover;
				}

				.back_login,
				.submit {
					z-index: 99999;
					display: block !important;
				}
			}
		</style>
	</head>

	<body>
		<div class="header">
			<?php include "header.php" ?>
		</div>

		<?php if (isset($_GET['update']) and !empty($_GET['update'])) { ?>
			<style type="text/css">
				body {
					display: flex;
					justify-content: center;
					height: 97vh;
					align-items: center;
					font-family: sans-serif;
					font-size: 18px;
					background: linear-gradient(to left bottom, #9f3737, #4b4bb7);
					overflow: hidden;
				}

				.container_form {
					display: grid;
					grid-template: 400px / 24vw 2fr;
					z-index: 9999999;
					animation: load .3s ease-in-out;
				}

				form {
					display: grid;
					background: linear-gradient(to top right, #2d1c53, #c11f1f);
					grid-template: auto / 1fr 3fr;
					padding: 30px;
					grid-gap: 20px;
					color: white;
					margin: 0;
				}

				.box_pass {
					display: grid;
					grid-template: auto / 8fr 1fr;
					grid-gap: 5px
				}

				.box_pass img {
					filter: invert(100%);
					width: 20px;
					height: 20px;
					padding: 5px;
				}

				.container_form .form_cover {
					width: 100%;
				}

				.presentation {
					background-image: url(profils/<?= $result['name_profil'] ?>);
					background-size: contain;
					background-repeat: no-repeat;
					position: relative;
				}

				#name,
				#login,
				#email,
				#pass {
					height: 30px;
					outline: none;
					border: none;
					padding: 0 10px;
					box-shadow: 0 0 4px #000000ad inset;
				}

				#profil {
					background: linear-gradient(to right, #492b8a, #c11f1f);
					padding: 3px 0 2px 5px;
					border-radius: 5px;
				}

				.back {
					background: #c5044a;
					border-radius: 5px;
					color: white;
					border: none;
					cursor: pointer;
					width: 130px;
					font-size: 20px;
					height: 40px;
					display: flex;
					justify-content: center;
					align-items: center;
				}

				.submit {
					background: #620ec8;
					border-radius: 5px;
					color: white;
					cursor: pointer;
				}

				.back_login {
					position: relative;
					float: right;
					background: #ac0d0d;
					border-radius: 5px;
					color: white;
					cursor: pointer;
				}

				.back_login,
				.submit {
					height: 40px;
					border: none;
					font-size: 20px;
					padding: 0 20px;
				}

				.success_message {
					grid-column: span 2;
					background: linear-gradient(to left, #2dd698, #107d73);
					color: #ffdfdf;
					padding: 10px;
					border-radius: 4px;
					animation: successMessage 1.8s .4s ease-in-out;
				}

				.error_message {
					grid-column: span 2;
					background: linear-gradient(to left, #ff5650, #bf1e1e);
					color: #ffdfdf;
					padding: 10px;
					border-radius: 4px;
					animation: errorMessage 1.8s .4s ease-in-out;
				}

				.icon_update_image {
					filter: invert(100%);
					position: absolute;
					right: 0;
					background: #d6cdcdc2;
					margin: 5px;
					padding: 5px;
					animation: errorMessage 1.8s .4s ease-in-out;
				}

				@media screen and (max-width: 700px) {
					body {
						overflow-y: scroll;
					}

					.back_login {
						font-size: 17px;
					}

					.container_form {
						display: flex;
						flex-direction: column;
						margin-top: 350px;
					}

					.presentation {
						height: 300px;
						background-image: url(profils/<?= $result['name_profil'] ?>);
						background-size: contain;
						transform: translateY(0px);
					}
				}

				input {
					color: #054eab;
				}
			</style>

			<div class="container_form">
				<div class="presentation">
					<a class="icon_update_image" href="profil.php?update_image=true"><img src="flaticon/icons8-Edit-32.png"></a>
				</div>
				<form action="update_profil_process.php?id=<?= $result['id']; ?>" method="POST">
					<label for="name">name</label>
					<input id="name" type="text" name="name" placeholder="entrer votre nom" value="<?= $result['name'] ?>">

					<label for="login">login</label>
					<input id="login" type="text" name="login" placeholder="entrer votre login" value="<?= $result['login'] ?>">

					<label for="email">email</label>
					<input id="email" type="email" name="email" placeholder="exemple@gmail.com" value="<?= $result['email'] ?>">

					<label for="password">mot de passe</label>
					<div class="box_pass">
						<input id="pass" type="password" name="pass" placeholder="entrer un mot de passe" value="<?= $result['pass'] ?>">
						<img class="img_toggel_pass" src="flaticon/red-eye.png">
					</div>
					<input class="submit" type="submit" value="modifier">
					<div onclick="location.assign('profil.php')" class="back">back</div>
					<?php if (isset($_GET['message']) and !empty($_GET['message']) and $_GET["error"] == "false") : ?>
						<div class="success_message"><?= $_GET['message']; ?></div>
					<?php endif; ?>

					<?php if (isset($_GET['message']) and !empty($_GET['message']) and $_GET["error"] == "true") : ?>
						<div class="error_message"><?= $_GET['message']; ?></div>
					<?php endif; ?>
				</form>
			</div>
			<script type="text/javascript">
				const showPass = document.querySelector('.img_toggel_pass');
				showPass.addEventListener("click", showPassFun);

				function showPassFun() {
					// alert("cool");
					let pass = document.querySelector("#pass");
					let showPass = document.querySelector('.img_toggel_pass');
					attribut = pass.getAttribute("type");

					if (attribut == "password") {
						pass.setAttribute("type", "text");
						showPass.style.filter = `invert(0%)`;

					}
					if (attribut == "text") {
						pass.setAttribute("type", "password");
						showPass.style.filter = `invert(100%)`;
					}

				}
			</script>

		<?php } else if (isset($_GET['update_image']) and !empty($_GET['update_image'])) { ?>
			<style type="text/css">
				.update_image form {
					display: flex;
					margin-top: 20px;
				}

				.btn_update_image {
					padding: 8px 30px;
					background: linear-gradient(to right, #6680e6, #211a94);
					border: none;
					border-radius: 8px;
					margin: 10px 0;
				}

				.label_choise_image {
					background: linear-gradient(to right, #496bf08c, #ae1d547d);
					display: flex;
					align-items: center;
					padding: 0 20px;
					border-radius: 8px;
					justify-content: space-around;
					cursor: pointer;
					width: 200px;
					border: 3px solid white;
					height: 40px;
					margin-right: 20px;
					animation: errorMessage 1.8s .4s ease-in-out;
				}

				.label_choise_image:active {
					transform: scale(.7);
				}

				.update_image input[type='file'] {
					display: none;
				}

				.update_image .choise_image {
					padding: 5px 22px;
					background: #535353;
					border-radius: 8px;
					margin-bottom: 5px;
				}

				.update_image .annule {
					background: #bd475d;
					border: none;
					border-radius: 8px;
					display: flex;
					align-items: center;
					width: 100px;
					justify-content: center;
					color: white;
					height: 45px;
				}

				.update_image a {
					text-decoration: none;
				}

				.update_image .btn_validate_image {
					background: #4765bd;
					border: none;
					border-radius: 8px;
					display: flex;
					color: white;
					align-items: center;
					font-size: 18px;
					width: 100px;
					justify-content: center;
					height: 45px;
					margin-right: 20px;
				}

				.form_update_show {
					display: grid;
					grid-template: repeat(5, 40px)/auto 60%;
					grid-gap: 10px;
					padding: 20px 80px 20px 20px;
				}

				.form_update_show input[type='submit'] {
					background-color: #9200d5;
					width: 50%;
					border: none;
					border-radius: 5px;
					color: white;
				}

				.form_update_show input {
					outline: none;
					border: none;
					border-radius: 5px;
					text-align: center;
					color: black;
				}
			</style>
			<div class='update_image'>
				<div class="content_profil">
					<center><img src="profils/<?= $result['name_profil'] ?>" width='20%'></img></center>
				</div>
				<script type="text/javascript">
					let btn = document.querySelector("#hide");
					btn.style.display = "none";
				</script>
				<form action="update_image_profil_process.php?id=<?= $result['id'] ?>" enctype="multipart/form-data" method='POST'>
					<label class="label_choise_image" for="cI">
						choisir une image
						<img src="flaticon/PhotosAppList.contrast-black_targetsize-24.png">
					</label>
					<input id="cI" class="choise_image" type='file' name='profil' accept="image/*">
					<input class="btn_validate_image" type="submit" value="enregister">
					<a class="annule" href="profil.php?update=true">annulé</a>
				</form>
			</div>
		<?php } else { ?>
			<div class="content_profil">
				<center><img src="profils/<?= $result['name_profil'] ?>" width='20%'></img></center>
				<div class="info">
					<h2><span id="salutation"></span><?= $_SESSION['user_notebook'] ?><br>la date : <time> </time></h2>
					<a href='deconnexion.php'><button class="btn_deconnexion">se deconnecter</button></a>
					<a href="profil.php?update=true"><button class="btn_update_profil">modifier le profil</button></a>
				</div>
			</div>
		<?php } ?>


		<div class="footer">
			<?php include "footer.php" ?>
		</div>
	</body>

	</html>

<?php } else { ?>
	<style type="text/css">
		body {
			background: linear-gradient(to left, #8c2873, #333362);
			height: 100vh;
			/**/
			display: flex;
			justify-content: center;
			/**/
			align-items: center;

		}

		#connecter_box {
			width: 200px;
			/**/
			height: 200px;
			border-radius: 50%;
			/**/
			background: linear-gradient(to right, #8c2873, #333362);
			display: flex;
			/**/
			justify-content: center;
			align-items: center;
			/**/
			box-shadow: 0 0 10px;
			cursor: pointer;
		}

		#connecter_box a {
			text-decoration: none;
			/**/
			font-size: 22px;
			text-transform: uppercase;
			/**/
			color: white;
		}
	</style>
	<div id="connecter_box">
		<a href='login_form.php'>se connecter</a>
	</div>
<?php } ?>

<script type="text/javascript">
	dateTimes();

	// date _____________________________________________________//
	function dateTimes() {
		var salutation = document.querySelector("#salutation");
		var time = document.querySelector("time");
		date = new Date();
		[day, numDay, month, year] = [date.getDay(), date.getUTCDate(), date.getMonth(), date.getFullYear()];
		[hours, minutes, seconds] = [date.getHours(), date.getMinutes(), date.getSeconds()];

		switch (day) {
			case 1:
				libDay = "lundi";
				break;
			case 2:
				libDay = "mardi";
				break;
			case 3:
				libDay = "mercredi";
				break;
			case 4:
				libDay = "jeudi";
				break;
			case 5:
				libDay = "vendredi";
				break;
			case 6:
				libDay = "samedi";
				break;
			case 0:
				libDay = "dimenche";
				break;
		}

		switch (month) {
			case 1:
				libMonth = "janvier";
				break;
			case 2:
				libMonth = "février";
				break;
			case 3:
				libMonth = "mars";
				break;
			case 4:
				libMonth = "avril";
				break;
			case 5:
				libMonth = "mai";
				break;
			case 6:
				libMonth = "juin";
				break;
			case 7:
				libMonth = "juillet";
				break;
			case 8:
				libMonth = "Aout";
				break;
			case 9:
				libMonth = "septembre";
				break;
			case 10:
				libMonth = "octobre";
				break;
			case 11:
				libMonth = "novembre";
				break;
			case 12:
				libMonth = "décembre";
				break;
		}
		if (hours <= 11) {
			salutation.innerHTML = "bonjour ";
		} else if (hours <= 15) {
			salutation.innerHTML = "bonne après midi ";
		} else if (hours > 15) {
			salutation.innerHTML = "bonsoir ";
		}

		time.innerHTML = `${libDay} le ${numDay} ${libMonth} ${year} ${hours}:${minutes}:${seconds}`;


	}
	setInterval(dateTimes, 1000);

	// end date ________________________________________________//

	// document.querySelector(".deconnect").style.display = "none";

	// div connect _____________________________________________________//
	const divConnecter = document.getElementById("connecter_box");
	divConnecter.addEventListener('click', function() {
		location.assign("login_form.php");
	});
	// end div connect _____________________________________________________//
</script>