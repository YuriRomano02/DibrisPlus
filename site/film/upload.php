<?php
$db = new PDO('mysql:host=localhost;dbname=unige', 'yuri', 'romanus99');

$fileHtml = file_get_contents('C:\xampp\htdocs\Bruh\film\Fnaf.html');
$titolo = 'Five Nights at Freddy';

$query = "INSERT INTO tabella_html (titolo, contenuto) VALUES (:titolo, :contenuto)";
$stmt = $db->prepare($query);
$stmt->bindParam(':titolo', $titolo);
$stmt->bindParam(':contenuto', $fileHtml);
$stmt->execute();
?>
