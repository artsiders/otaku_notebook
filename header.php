<style type="text/css">
	::selection{
			background: #5c2dbd82;
		}
	.commande{
		background: linear-gradient(to right,#496bf0,#ae1d54);
		box-shadow: 0 0 10px gray;
		display: flex;
		box-shadow: 0 0 20px white;
		display: flex;
		position: fixed;
		width: 100%;
		z-index: 999999;
	}
	.commande button{
		height: 60px;
		background: #ae1d5400;
		color: white;
		width: 120px;
	}
	.commande button:hover{
		background: #ae1d54;
		transition-duration: .2s;
		cursor: pointer;
	}
	.commande form{
		right: 20px;
	    position: absolute;
	}
	.commande form input[type="search"]{
		height: 34px;
		border: none;
		outline: none;
		background: #f4f4f4;
		border-radius: 4px;
		width: 300px;
		margin: 13px 0;
		padding-left: 20px;
		color: black;
		box-shadow: inset -2px -2px 10px #00000045;
	}
	.commande form input[type="submit"]{
		height: 34px;
		border: none;
		outline: none;
		background: #3c3c3c;
		border-radius: 4px;
		margin: 13px 0;
		color: white;
		padding: 0 20px;
	}
	.min_search{
		display: none!important;
		transform: translateY(2px);
		animation: searchShow .5s ease-in-out;
	}
	.commande form .min_search img{
		width: 20px;
		height: 20px;
		filter: invert(100%);
	}
	.commande form .min_search{
		width: 40px;
		height: 40px;
		background: #3c3c3c;
		display: inline-flex;
		justify-content: center;
		align-items: center;
		border-radius: 50%;
	}
	.search_submit, .search_bar{
		display: inline-block!important;
		animation: searchShow .5s ease-in-out;
	}
	@keyframes searchShow{
		0%{transform: translateX(300px); opacity: .0;}
		100%{transform: translateX(0px); opacity: 1;}
	}
	@media screen and (max-width: 700px){
		.commande form input[type="search"], input[type="submit"]{
			display: none;
		} 
		.min_search{
			display: inline-flex!important;
			margin: 10px;
		}
		.commande form input[type="submit"]{
			width: 100px;
		}
		.commande form input[type="search"]{
			width: 200px;
		}
		.commande{
			flex-direction: column;
			position: relative;
		}
		.commande button{
			width: 100%;
		}
	}
</style>
<div class="commande">
	<a class="home" href="index.php"><button>home</button></a>
	<a class="ajouter" href="add.php"><button>ajouter</button></a>
	<a class="profil" href="profil.php"><button>profil</button></a>
	<form method="POST" action="result_search.php">
		<input type="search" name="search" placeholder="rechecher">
		<input type="submit" value="search">
		<div class="min_search" onclick="showSearch();">
			<img src="flaticon/logo.contrast-white_scale-180.png">
		</div>
	</form>
</div>

<script>
	let minSearch = document.getElementsByClassName("min_search");
	let searchContent = [...document.getElementsByTagName("input")];
	console.log(searchContent);

	function showSearch(){
		searchContent['0'].classList.toggle("search_submit");
		searchContent['1'].classList.toggle("search_bar");
	}
	// function hideSearch(){
	// 	searchContent['0'].classList.remove("search_submit");
	// 	searchContent['1'].classList.remove("search_bar");
	// }
</script>