<?php include "load.php"; ?>
<link rel="stylesheet" type="text/css" href="css/add.css">
<div class="header">
	<?php include "header.php" ?>
</div>
<?php 
	if(isset($_GET['name']) AND !empty($_GET['name'])){
		$name = $_GET['name'];
		$state = $_GET['state'];
		$note = $_GET['note'];
		$valuation = $_GET['valuation'];
	}
	else{
		$name = $state = $note = $valuation = "";
	}
?>

<div class="container_form">
	<form action="add_process.php" method="POST" enctype="multipart/form-data">
		<label for="name">name</label>
		<input id="name" type="text" name="name" value="<?= $name?>" placeholder="entrer le nom de l'animé">

		<label for="state">state</label>
		<input id="state" type="text" name="state" value="<?= $state?>" placeholder="t'es as quel niveau">

		<label for="note">note</label>
		<input id="note" step="5" type="number" max="100" autocomplete="off" name="note" value="<?= $note?>" placeholder="donne une note en %">

		<label for="valuation">valuation</label>
		<input id="valuation" type="text" name="valuation" value="<?= $valuation?>" placeholder="laisse un mot">

		<label>image</label>
		<label for="image" class="label_choise_photo">
			choisir une image
			<img src="flaticon/PhotosAppList.contrast-black_targetsize-24.png">
		</label>
		<input id="image" type="file" name="image" accept="image/*" >

		<div id="back" onclick="location.assign('index.php');" class="back">retour</div>
		<input class="submit" type="submit" value="ajouter">

		<?php if(isset($_GET['message']) && $_GET['message'] != 1 && $_GET['message'] != 0): ?>
			<div class="error_message"><?= $_GET['message']; ?></div>
		<?php endif; ?>

		<?php if(isset($_GET['message']) && $_GET['message'] == 1): ?>
			<div class="success_message">c'est enregistrer :)</div>
			<script>
				document.getElementById("back").classList.add("error_mode");
			</script>
		<?php endif; ?>

		<?php if(isset($_GET['message']) && $_GET['message'] == 0): ?>
			<div class="error_message">y'a un petit problème avec la base de donnée :(</div>
		<?php endif; ?>

		<script type="text/javascript">
		<?php
		if(isset($_GET['champ']) AND !empty($_GET['champ'])):
			$champ = $_GET['champ'];
			if($champ == "error_name"){
				?>document.getElementById("name").classList.add("error_mode");<?php
			}
			if($champ == "error_state"){
				?>document.getElementById("state").classList.add("error_mode");<?php
			}
			if($champ == "error_note"){
				?>document.getElementById("note").classList.add("error_mode");<?php
			}
			if($champ == "error_valuation"){
				?>document.getElementById("valuation").classList.add("error_mode");<?php
			}
		endif; 
		?>
		 </script>
	
	</form>
</div>

<div class="footer">
	<?php include "footer.php" ?>
</div>
