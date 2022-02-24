<?php 
	$server = "localhost";
	$db     = "note_book";
	$login  = "root";
	$pass   = "";
	
	try {
		$connect = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $login, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	} catch (PDOException $e) {
		die( "ERREUR : ". $e->getMessage());
	}

?>

<?php /* 
	class connexion{
		$server = "localhost";
		$db     = "note_book";
		$login  = "root";
		$pass   = "";

		public function __construct($server="localhost", $db="note_book", $login="root"$pass=""){
			$this->server = $server;
			$this->db = $db;
			$this->login = $login;
			$this->pass = $pass;
		}
	}
*/

?>
