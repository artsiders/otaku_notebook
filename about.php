<?php include "load.php"; ?>
<style type="text/css">
	.header button{
		border: none;
		width: 110px;
	}
	h2{
		margin-top: 200px;
		animation: load .5s ease-in-out;
	}
	.header{
		position: absolute;
		width: 100%;
		animation: loadX .5s ease-in-out;
	}
	.footer {
		color: white;
		position: absolute;
		bottom: -300px;
		width: 100%;
		animation: load .5s ease-in-out;
	}
	.content{
		position: absolute;
		top: -50px;
		font-size: 17px;
		font-family: sans-serif;
		line-height: 40px;
		animation: load .5s ease-in-out;
	}
	.header form{
		display: none;
	}
</style>


<div class="header">
	<?php include "header.php" ?>
</div>

<div class="content">
	<h2><center>ART SIDER coder</center></h2>
	<ul>
		<li>application développer par: SALIM</li>
		<li>etudiant de niveau 1 en Génie Logiciel</li>
		<li>technologie utiliser: HTML CSS JavaScript PHP (aucun FrameWork utiliser)</li>
		<li>application : fonctionnalités</li>
		<ul>
			<li>stocke une liste de d'item dans une dataBase [manga]</li>
			<li>interface d'administration de la dataBase (CRUD)</li>
			<li>système d'authentificaton</li>
			<li>système d'inscription et gestion des session</li>
		</ul>
	</ul>
</div>


<div class="footer">
	<?php include "footer.php" ?>
</div>