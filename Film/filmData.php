<?php

$film = $conn->real_escape_string(htmlspecialchars($_GET['film']));


$query = "SELECT * FROM film WHERE Titolo = '$film'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$titolo = $row["Titolo"];
$_SESSION['titolo'] = $titolo;

$query_select = "SELECT voto FROM voti WHERE email=? AND film=?";
$stmt = $conn->prepare($query_select);
$stmt->bind_param("ss", $_SESSION["email"], $_SESSION["titolo"]);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows > 0) $_SESSION["voto"] = $result->fetch_assoc();
else $_SESSION["voto"] = null;

$preferiti = false;
$da_guardare = false;
$visti = false;

$query_select = "SELECT * FROM film_preferiti WHERE email=? AND film=?";
$stmt = $conn->prepare($query_select);
$stmt->bind_param("ss", $_SESSION["email"], $_SESSION["titolo"]);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $preferiti = true;
}

$query_select = "SELECT * FROM film_da_guardare WHERE email=? AND film=?";
$stmt = $conn->prepare($query_select);
$stmt->bind_param("ss", $_SESSION["email"], $_SESSION["titolo"]);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $da_guardare = true;
}

$query_select = "SELECT * FROM film_visti WHERE email=? AND film=?";
$stmt = $conn->prepare($query_select);
$stmt->bind_param("ss", $_SESSION["email"], $_SESSION["titolo"]);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $visti = true;
}

$query = "SELECT AVG(voto) AS media FROM voti WHERE film = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s",$_SESSION["titolo"]);
$stmt->execute();
$result = $stmt->get_result();
$media_voti = $result->fetch_assoc();
?>