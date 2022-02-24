<?php include "load.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>connect</title>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style type="text/css">
		*{
			box-sizing: border-box;
			margin: 0;
			padding: 0;
		}
		body{
			background: linear-gradient(to top right,#2d1c53,#c11f1f);
			display: flex;		 /**/flex-direction: column;
			height: 100vh;       /**/justify-content: center;
			align-items: center; /**/font-size: 18px;
			font-family: sans-serif;
			overflow: hidden;
		}
		.content{
			display: grid; /**/grid-template: 200px auto/ 400px; 
		}
		.form_cover{
			background-image: url(media/bg_login.png); /**/background-size: cover;
			animation: loadX .3s ease-in-out;
		}
		.login_box{
			width: 100%;
			background: #424242;
			padding: 20px;
			color: white;
			animation: load .3s ease-in-out;
		}
		.login_box h2{
			text-align: center;
			margin-bottom: 22px;
		}
		.login_box form{
			display: grid;
			grid-template: repeat(3,50px)/ 100px auto;
			grid-gap: 15px;
		}
		.box_btn{
			grid-column: span 2;
		}
		.box_pass{
			display: grid;
			grid-template-columns: 6fr 1fr; 
		}
		.login, .pass{
			width: 100%;
			height: 35px;
			border: none;
			outline: none;
			border-radius: 2px;
			padding-left: 15px;
		}
		.box_btn{
			display: grid;
			grid-template-columns: 1fr 1fr;
		}
		.box_btn .submit{
			width: 100px;
			height: 40px;
			border: none;
			border-radius: 4px;
			color: white;
			font-size: 18px;
			background: linear-gradient(to bottom left,#e60909,#9c1d88,#232aae);
			/*background: linear-gradient(45deg,#fb0094,#0000ff,#00ff00,#ffff00,#ff0000,#fb0094,#0000ff,#00ff00,#ffff00,#ff0000);
			background-size: 400%;
			animation: animate 5s linear infinite;*/
		}
		.box_btn .submit:hover{
			background: linear-gradient(to bottom left,#232aae,#9c1d88,#e60909);
		}
		.box_btn .inscrire{
		    width: 100%;
		    height: 40px;
		    border: none;
		    border-radius: 4px;
		    background-color: #716666;
		    display: flex;
		    justify-content: center;
		    align-items: center;
		    cursor: pointer;
		}
		.icon{
			width: 24px;
			filter: invert(100%);
			margin: 5px 0 5px 15px;
			background-image: url(flaticon/red-eye-off.png);
			background-size: contain;
			background-repeat: no-repeat;
		}


		.move_label{
			color: wheat;
			transition-duration: .2s;
		}
		.success_message{
		    grid-column: span 2;
		    background: linear-gradient(to left, #2dd698, #107d73);
		    color: #ffdfdf;
		    padding: 10px;
		    border-radius: 4px;
		    animation: successMessage 1.8s .4s ease-in-out;
		}
		.error_message{
		    grid-column: span 2;
		    background: linear-gradient(to left, #ff5650, #bf1e1e);
		    color: #ffdfdf;
		    padding: 10px;
		    border-radius: 4px;
		    animation: errorMessage .9s .4s ease-in-out;
		}
		/*animation___________________________________________________________________________________*/
		.shadow_color:before{
			content: '';
			position: absolute;
			top: -2px;
			left: -2px;
			background: linear-gradient(45deg,#fb0094,#0000ff,#00ff00,#ffff00,#ff0000,#fb0094,#0000ff,#00ff00,#ffff00,#ff0000);
			background-size: 400%;
			width: calc(100% + 10px);
			height: calc(100% + 10px);
			z-index: -1;
			animation: animate 20s linear infinite;
		}
		@keyframes animate{
			0%{background-position: 0 0;}
			50%{background-position: 100% 0;}
			100%{background-position: 0 0;}
		}
		/*end animation___________________________________________________________________________________*/

		@media screen and (max-width: 800px){
			.login_box form{
				display: flex;flex-direction: column;
			}
			.login, .pass{
				margin: 20px 0;
			}
			.icon{
				margin-top: 20px;
			}
			.submit, .inscrire{
				margin-top: 20px;
			}
		}
	</style>
</head>
<body>
	<div class="content">
		<div class="form_cover">

		</div>
		<div class="login_box">
			<h2>Login</h2>
			<form method="POST" action="login.php">
				
			    <label class="label">Username</label>
			    <input 
			    	class="login" type="text" 
			    	value="<?php if(isset($_GET['login']) AND !empty($_GET['login'])){ echo $_GET['login'];} ?>"
			    	name="login" placeholder="entrer le login" required autocomplete="off"
			    />

		      	<label class="label">Password</label>
		      	<div class="box_pass">
			      	<input class="pass" type="password" name="pass" placeholder="entrer le mot de pass" required>
			      	<div class="icon"></div>
		      	</div>

		      	<div class="box_btn">
		      		<input class="submit" type="submit" value="connexion">
		      		<div class="inscrire">s'inscrire</div>
		      	</div>

		      	<?php if(isset($_GET['message']) AND !empty($_GET['message']) AND isset($_GET['regis'])): ?>
					<div class="success_message"><?= $_GET['message']; ?></div>
				<?php endif; ?>

		      	<?php if(!empty($_GET["message"]) AND $_GET["message"] == "erreur"): ?>
		      			<div class="error_message">information invalide</div>
		      	<?php endif; ?>
			</form>
		</div>
	</div>

<script type="text/javascript">
	const inscrire = document.querySelector('.inscrire');
	inscrire.addEventListener('click', pageInscription);

	function pageInscription(){
		location.assign("register.php");
	}

	let label = document.querySelectorAll('.label');
	let login = document.querySelector('.login');
	let pass  = document.querySelector('.pass');
	document.querySelector(".icon").addEventListener("click", showPass);

	function showPass(){
		let pass = document.querySelector(".pass");
		let icon = document.querySelector(".icon");
		proElement = pass.getAttribute("type");

		if(proElement == "password"){
			pass.setAttribute("type", "text");
			icon.style.backgroundImage = `url(flaticon/red-eye.png)`;

		}
		if(proElement == "text"){
			pass.setAttribute("type", "password");
			icon.style.backgroundImage = `url(flaticon/red-eye-off.png)`;
		}
		
	}
	login.addEventListener('input',moveLabelLogin);
	pass.addEventListener('input',moveLabelPass);

	function moveLabelLogin(){
		label["0"].classList.toggle("move_label");
	}
	function moveLabelPass(){
		label["1"].classList.toggle("move_label");
	}

</script>
</body>
</html>