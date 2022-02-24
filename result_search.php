<?php include "load.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>liste des mangas</title>
	<style type="text/css">
	*{
		margin: 0;
		padding: 0;
		font-family: verdana ,sans-serif;
		font-size: 17px;
		color: white;
	}
	body{
		background: linear-gradient(to bottom,#496bf0,#3a298a);
		background-size: 100vw;
	}
	.content_cover{
		background-image: url(images/thumb-1920-704338.jpg);
		background-size: cover;
		height: 500px;
		box-shadow: 0 0 20px white;
		filter: brightness(90%);
		z-index: -1;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.content_cover h2{
		font-size: 50px;
		color: white;
	}
	.items_content{
		display: flex;
		flex-wrap: wrap;
		width: 98%;
		margin: 20px;
	}
	.items_content .item{
		display: grid;
		grid-template: auto 40px 40px / 2fr repeat(3, 1fr);
		width: 23%;
		height: auto;
		border: 2px solid white;
		margin: 10px;
		box-shadow: 0 0 10px #2affd7;

	}
	.items_content .item .link{
		grid-column: span 4;
	}
	.items_content .item .link .cover{
		width: 100%;
		height: 150px;
		background-size: cover;
	}
	.items_content .item span{
		width: 100%;
		grid-column: span 4;
		padding: 8px;
	}
	.controls_item{
		display: grid;
		grid-template-columns: 2fr 1fr 1fr 1fr; 
		grid-column: span 4;
	}
	.controls_item .id{
		background-color: #353535;
		display: flex;
		justify-content: center;
		height: 100%;
		align-items: center;
		color: white;
		font-size: 20px;
		border-right: 1px solid gray;
	}
	.controls_item img{
		filter: invert(100%);
	}
	.controls_item .show_item{
		background-color: #353535;
		display: flex;
		justify-content: center;
		height: 100%;
		align-items: center;
	}
	.controls_item .update_item{
		background-color: #353535;
		display: flex;
		justify-content: center;
		height: 100%;
		align-items: center;
	}
	.controls_item .delete_item{
		background-color: #353535;
		display: flex;
		justify-content: center;
		height: 100%;
		align-items: center;
	}
	.commande button{
		height: 40px;
		border: none;
		color: black;
		padding: 0 15px;
	}
	@media screen and (max-width: 1000px){
		.items_content .item{
			width: 45%;
		}
	}
	@media screen and (max-width: 700px){
		.items_content{
			display: flex;
			flex-direction: column;
		}
		.items_content .item{
			width: 90%;
		}
	}
</style>
</head>
<body>
	<!-- traitement ------------------------------------------------------------ -->
	<?php 
		include "connexion.php";
		if(!empty($_POST['search'])):
			$search = $_POST['search'];
			$sql = "SELECT * FROM list_mangas WHERE name LIKE '%$search%'";

			$query = $connect->prepare($sql);
			$query->execute();
			$result = $query->fetchAll(PDO::FETCH_ASSOC);
			// je revient
		endif;

	?>
	<!-- fin traitement -------------------------------------------------------- -->


	<?php 	include "header.php"; ?>

	<div class="content_cover">
		<h2>Otaku notebook</h2>
	</div>

	<div class="container">
		<div class="items_content">
			<?php foreach ($result as $key => $result): ?>
								
					<div class="item">
						<a class="link" href="show.php?id=<?= $result['id']?>">
							<div class="cover" style="background-image: url(images/<?=$result["image_name"]?>);"></div>
						</a>
						<span><?= $result["name"]; ?></span>

						<div class="controls_item">
							<div class="id">
								<?= $key; ?>
							</div>
							<div class="show_item">
								<a href="show.php?id=<?= $result['id']?>"><img src="flaticon/red-eye.png"></a>
							</div>
							<div class="update_item">
								<a href="show.php?id=<?= $result['id']?>&inc_form=1"><img src="flaticon/icons8-Edit-32.png"></a>
							</div>
							<div class="delete_item">
								<a href="delete.php?id=<?= $result['id']?>"><img src="flaticon/icons8-Trash-32.png"></a>
							</div>
						</div>
					</div>
			<?php endforeach; ?>
		</div>
	</div>
</body>
</html>