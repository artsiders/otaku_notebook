<?php
require_once "connexion.php";
session_start();

if (isset($_GET) and !empty($_GET)) {
	$id = $_GET['id'];
	$query = $connect->prepare("SELECT * FROM list_mangas WHERE id = ?");
	$query->execute(array($id));
	$result = $query->fetch(PDO::FETCH_ASSOC);
	// var_dump($result);
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>show item</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/show.css">
</head>

<body>
	<?php
	if (isset($_SESSION["user_notebook"]) and !empty($_SESSION["user_notebook"])) { //if user is connect
	?>

		<div class="header">
			<?php include "header.php" ?>
		</div>
		<div class="content_item">
			<div class="image_content">
				<div class="box_img_item" style="background-image: url('images/<?= $result["image_name"] ?>');"></div>

				<!-- ------------------------------------------------------------------------------ -->
				<a id="hide" href="show.php?idImg=<?= $result['id'] ?>&id=<?= $result['id'] ?>"><button class="btn_update_image">modifier l'image</button></a>
				<!-- ------------------------------------------------------------------------------ -->

				<?php if (isset($_GET['idImg']) and !empty($_GET['idImg'])) : ?>
					<?php $id = $idImg = $result['id']; ?>

					<div class='update_image'>
						<script type="text/javascript">
							let btn = document.querySelector("#hide");
							btn.style.display = "none";
						</script>
						<form action="update_image_prosses.php?idImg=<?= $idImg ?>&id=<?= $id ?>" enctype="multipart/form-data" method='POST'>
							<label class="label_choise_image" for="cI">
								choisir une image
								<img src="flaticon/PhotosAppList.contrast-black_targetsize-24.png">
							</label>
							<input id="cI" class="choise_image" type='file' name='image' accept="image/*">
							<input class="btn_validate_image" type="submit" value="enregister">
							<a class="annule" href="show.php?id=<?= $result['id'] ?>">annulé</a>
						</form>
					</div>
				<?php endif; ?>
			</div>

			<!-- se change en formulaire ------------------------------------------------------ -->
			<?php
			if (isset($_GET['inc_form']) and !empty($_GET['inc_form'])) {

				if (isset($_GET) and !empty($_GET)) {
					$id = $_GET["id"];
				}
				if (isset($_SESSION["user_notebook"]) and !empty($_SESSION["user_notebook"])) { //if user is connect

					require_once "connexion.php";

					$query = $connect->prepare("SELECT * FROM list_mangas WHERE id = ?");
					$query->execute(array($id));
					$result = $query->fetch(PDO::FETCH_ASSOC);
					// echo "<pre>";
					// var_dump($result);
					// echo "</pre>";
				}
			?>

				<form class="form_update_show" method="POST" action="update_prosses.php?id=<?= $id ?>&inc_form=1">
					<label>nom de l'animé</label>
					<input type="text" name="name" placeholder="nom" value="<?= $result['name'] ?>">
					<label>statut</label>
					<input type="text" name="state" placeholder="statut" value="<?= $result['state'] ?>">
					<label>note en %</label>
					<input type="text" name="note" placeholder="note" value="<?= $result['note'] ?>">
					<label>evaluation</label>
					<input type="text" name="valuation" placeholder="evaluation" value="<?= $result['valuation'] ?>">
					<input type="submit">
				</form>
			<?php
			} else {
			?>
				<div class="item_detail">
					<h2><?= $result['name'] ?></h2>
					<br>
					<p>taux de satisfaction :)</p>
					<br>
					<div class="progress_bar">
						<div class="progress" style="width: <?= $result['note']; ?>"><?= $result['note']; ?></div>
					</div>
					<br>
					<p>evaluation personnel : <?= $result['valuation'] ?></p>
					<br>
					<p>ajouter le <?= $result['insert_date'] ?></p>

					<?php if (isset($_GET['message']) and !empty($_GET['message']) and $_GET["error"] == "false") : ?>
						<div class="success_message"><?= $_GET['message']; ?></div>
					<?php endif; ?>

					<?php if (isset($_GET['message']) and !empty($_GET['message']) and $_GET["error"] == "true") : ?>
						<div class="error_message"><?= $_GET['message']; ?></div>
					<?php endif; ?>


					<div class="controls_item_show">
						<a href="show.php?id=<?= $result['id'] ?>&inc_form=1"><img src="flaticon/icons8-Edit-32.png"></a>
						<a onclick="alert('supprimer');" href="delete.php?id=<?= $result['id'] ?>"><img src="flaticon/icons8-Trash-32.png"></a>
					</div>
				</div>
			<?php } ?>
			<!-- ----------------------------------------------------------------------------- -->

			<div class="box_auther">
				<?php

				if (isset($_SESSION["user_notebook"]) and !empty($_SESSION["user_notebook"])) {

					$query = $connect->prepare("SELECT * FROM list_mangas ORDER BY rand() LIMIT 8");
					$query->execute();
					$result = $query->fetchAll(PDO::FETCH_ASSOC);
				}
				?>

				<div class="items_content">
					<?php foreach ($result as $key => $result) : ?>

						<div class="item">
							<a href="show.php?id=<?= $result['id'] ?>">
								<div class="cover" style="background-image: url(images/<?= $result["image_name"] ?>);"></div>
							</a>
							<span><?= $result["name"]; ?></span>

							<div class="controls_item">
								<div class="id">
									<?= $key; ?>
								</div>
								<div class="show_item">
									<a href="show.php?id=<?= $result['id'] ?>"><img src="flaticon/red-eye.png"></a>
								</div>
								<div class="update_item">
									<a href="show.php?id=<?= $result['id'] ?>&inc_form=1"><img src="flaticon/icons8-Edit-32.png"></a>
								</div>
								<div class="delete_item">
									<a href="delete.php?id=<?= $result['id'] ?>"><img src="flaticon/icons8-Trash-32.png"></a>
								</div>
							</div>
						</div>

					<?php endforeach; ?>
				</div>
			</div>
			<!-- ------------------------------------------------------------------------- -->
		</div>
		<div style="transform: translateY(60px);">
			<?php include "footer.php" ?>
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
				justify-content: center;
				/**/
				align-items: center;

			}

			.connecter {
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

			.connecter a {
				text-decoration: none;
				/**/
				font-size: 22px;
				text-transform: uppercase;
			}
		</style>

		<div class="connecter">
			<a href='login_form.php'>se connecter</a>
		</div>

		<script type="text/javascript">
			let divConnecter = document.querySelector(".connecter");
			divConnecter.addEventListener('click', backToConnect);

			function backToConnect() {
				location.assign("login_form.php");
			}
		</script>
	<?php } ?>

</body>

</html>