<?php
include 'config.php';
include 'include/header.html';
include 'include/menu.html';
echo '<div id="TRESC">' ;

try {
	$pdo = new PDO($dsn, $user, $password, 
		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION));

	$kategorie = $pdo->query('SELECT * FROM ogloszenie');
	if($kategorie) {
		foreach($kategorie as $kategoria) {
			echo $kategoria['nazwa'] . '<br />';
		}
	}
	$kategorie->closeCursor();
	
} catch (PDOException $e) {
	echo 'Połączenie nie mogło zostać utworzone: ' . $e->getMessage();
}
echo '</div>';
include 'include/footer.html';

?>