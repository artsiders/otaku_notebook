<?php session_start(); ?>
<?php include "load.php"; ?>
<?php include "database.php"; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<title>liste des mangas</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/home.css">
</head>

<body>

	<?php
	if (isset($_SESSION["user_notebook"]) and !empty($_SESSION["user_notebook"])) { //if user is connect

		// echo "bienvenue ". $_SESSION['user'];
		// echo "<br><a href='deconnexion.php'>se deconnecter</a>";
		require_once "connexion.php";

		$sql = "SELECT * FROM list_mangas ORDER BY name";
		$query = $connect->prepare($sql);
		$query->execute();
		$result = $query->fetchAll(PDO::FETCH_ASSOC);
		// echo "<pre>";
		// var_dump($result);
		// echo "</pre>";
	?>

		<div id="top" class="header">
			<?php include "header.php"; ?>
		</div>


		<div class="content_cover">
			<h2>Otaku notebook</h2>
		</div>

		<a href="#top">
			<div class="move_top">
				<img src="flaticon/back-icon.png">
			</div>
		</a>

		<div class="container">
			<div class="items_content">
				<?php foreach ($result as $key => $result) : ?>

					<div class="item">
						<div class="header_item">
							<?php
							if (isset($_SESSION['user_notebook']) and !empty($_SESSION['user_notebook'])) :
								$sql = "SELECT * FROM users WHERE login = ?";
								$query = $connect->prepare($sql);
								$query->execute(array($_SESSION['user_notebook']));
								$resultHeader = $query->fetch(PDO::FETCH_ASSOC);
							endif;
							?>
							<a href="profil.php">
								<img src="profils/<?= $resultHeader['name_profil'] ?>" width='20%'></img>
							</a>
							<span><?= $_SESSION['user_notebook'] . ' ' . $resultHeader['name'] ?></span>
						</div>
						<a class="link" href="show.php?id=<?= $result['id'] ?>">
							<div class="cover" style="background-image: url(images/<?= $result["image_name"] ?>);"></div>
						</a>
						<span><?= $result["name"]; ?></span>

						<div class="controls_item">
							<div class="id">
								<?= $key; ?>
							</div>
							<div class="show_item">
								<a href="show.php?id=<?= $result['id'] ?>"><img src="flaticon/red-eye.png" alt="afficher"></a>
							</div>
							<div class="update_item">
								<a href="show.php?id=<?= $result['id'] ?>&inc_form=1"><img src="flaticon/icons8-Edit-32.png" alt="modifier"></a>
							</div>
							<div class="delete_item">
								<a href="delete.php?id=<?= $result['id'] ?>"><img src="flaticon/icons8-Trash-32.png" alt="supprimer"></a>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

		<div class="footer">
			<?php include "footer.php"; ?>
		</div>

	<?php } //end if user is connect ;)
	else { //if user is disconnect
	?>
		<style type="text/css">
			body {
				background: linear-gradient(to left, #8c2873, #333362);
				height: 100vh;
				/**/
				display: flex;
				/**/
				align-items: center;
				flex-direction: column;
				/**/
				justify-content: space-around;

			}

			.connecter {
				width: 200px;
				/**/
				height: 200px;
				border-radius: 50%;
				/**/
				cursor: pointer;
				background: linear-gradient(to right, #8c2873, #333362);
				display: flex;
				/**/
				justify-content: center;
				align-items: center;
				/**/
				box-shadow: 0 0 10px;


			}

			.connecter a {
				text-decoration: none;
				/**/
				font-size: 22px;
				text-transform: uppercase;
			}
		</style>
		<h2>Otaku NoteBook</h2>
		<div class="connecter">
			<a href='login_form.php'>se connecter</a>
		</div>
		<br>
		<center>ART SIDER</center>

	<?php } ?>


	<script type="text/javascript">
		let divConnecter = document.querySelector(".connecter");
		divConnecter.addEventListener('click', backToConnect);

		function backToConnect() {
			location.assign("login_form.php");
		}
	</script>

</body>

</html>