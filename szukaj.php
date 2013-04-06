<?php
include 'config.php';
include 'include/header.html';
include 'include/menu.html';
echo '<div id="TRESC">' ;

try {
	$pdo = new PDO($dsn, $user, $password, 
		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION));

echo '<h1>Szukanie</h1>' . 
		 '<form action="szukaj.php?page=powiazania" method="post">Rodzaj <select name="id_ogloszenie">';
		 	 
	$studenci = $pdo->query('SELECT * FROM rodzaj');
	foreach($studenci as $student) {
		 echo '<option value="' . $student['id_rodzaj'] . '">' . $student['nazwa'] .  '</option>';
	}
	
	echo '</select> Kategoria: <select name="id_kategorie">';
	$projekty = $pdo->query('SELECT nazwa, id_kategorie FROM kategorie'); 
	foreach($projekty as $projekt) {
		 echo '<option value="' . $projekt['id_kategorie'] . '">' . $projekt['nazwa'] . '</option>';
	}
	
	echo '</select><input type="submit" value="Szukaj" /></form>';
	
	
	
} catch (PDOException $e) {
	echo 'Po³¹czenie nie mog³o zostaæ utworzone: ' . $e->getMessage();
}
echo '</div>';
include 'include/footer.html';

?>