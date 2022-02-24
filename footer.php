<style>
	body{
		margin: 0;
		padding: 0;
		box-sizing: border-box;
	}
	footer{
		display: flex;
	    height: 70px;
	    background-color: #444444;
	    align-items: center;
	    justify-content: center;
	}
	footer div{
		padding: 0 20px;
		color: white
	}
	footer .titre{
		position: absolute;
    	left: 20px;
	}
	footer .contact{

	}
	footer .about{
		position: absolute;
    	right: 20px;
	}
	footer .about a{
		color: white;
	}
	footer span{
		font-size: 14px;
		opacity: .8;
	}
	@media screen and (max-width: 700px){
		footer{
			height: 300px;
			display: grid;
			grid-template: repeat(3, 100px) / 1fr;
		}
		.about{
			grid-row-start: 3;
			
		}
		.about, .titre, .contact{
			text-align: center;
			position: relative!important;
			right: 0!important;
		}
	}
</style>

<footer>
	<div class="titre">
		ART SIDER <br>
		<span>jimsky699@gmail.com</span>
	</div>
	<div class="contact">
		CONTACT <br>
		<span>+237 682696734</span>
	</div>
	<div class="about">
		ABOUT <br>
		<span><a href="about.php">a propo de l'application</a></span>
	</div>
</footer>