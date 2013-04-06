<?php
include 'config.php';
include 'include/header.html';
include 'include/menu.html';
echo '<div id="TRESC">
<a  href="index.php"><img src="http://host1.panoramix.maxnet.org.pl/~wisla/XML/Add-icon.png" alt="Dodaj"  /></a> ' ;
try {
	$pdo = new PDO($dsn, $user, $password, 
		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION));

	$kategorie = $pdo->query('SELECT * FROM aktualnosci');
	if($kategorie) {
		foreach($kategorie as $kategoria) {
			echo '<div class="tytul">';
			echo $kategoria['tytul'] . ' 
			<ul class="prawo">
			<a  href="index.php"><img src="http://host1.panoramix.maxnet.org.pl/~wisla/XML/Pencil3.png" alt="Edytuj"  /></a>
			<a  href="index.php"><img src="http://host1.panoramix.maxnet.org.pl/~wisla/XML/DeleteRed.png" alt="Usuñ"  /></a>
			<br /></ul></div>';
			
			echo '<div class="opis">';
			echo $kategoria['opis'] . '<br />';
			echo '<div class="data"><br />Dodano:';
			echo $kategoria['Data'] . '<br /></div></div>';
		}
	}
	$kategorie->closeCursor();
	
} catch (PDOException $e) {
	echo 'Po³¹czenie nie mog³o zostaæ utworzone: ' . $e->getMessage();
}
echo '</div>';
include 'include/footer.html';

?>