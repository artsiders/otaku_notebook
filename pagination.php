<?php  
	include "connexion.php";
	$teste = "14.5";
	//convertire une variable en php
	var_dump((int)$teste);
	//declaration d'une constante en php
	define("MYCONST", "<br>hello world<br>");
	echo MYCONST;
	function myFuction(){
		//accedera une variable gliobal en local
		global $teste;
		echo $GLOBALS['teste']." super global";
		//en utilisant la super global "$_GLOBALS"
		echo "<br> retour a la ligne <br>";
		echo($teste);
	}
	myFuction();

	$count = $connect->query("SELECT COUNT(id) FROM list_mangas")->fetchAll(PDO::FETCH_NUM)[0];
	echo "<br>";
	var_dump((int)$count[0]);
	echo "<br>".(int)$count[0];

?>