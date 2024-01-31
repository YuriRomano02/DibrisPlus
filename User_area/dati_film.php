<?php
$query = "SELECT * FROM utenti WHERE Email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $_SESSION["email"]);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Errore";
}

$_SESSION["firstname"] = $row["nome"];
$_SESSION["lastname"] = $row["cognome"];
$_SESSION["cell"] = $row["numero_telefono"];
$_SESSION["photo"] = $row["photo"];

$query_select = "SELECT * FROM film_preferiti, film WHERE email=? AND film_preferiti.film = film.Titolo";

$stmt = $conn->prepare($query_select);
$stmt->bind_param("s", $_SESSION["email"]);
$stmt->execute();
$preferiti = $stmt->get_result();

$query_select = "SELECT * FROM film_da_guardare, film WHERE email=? AND film_da_guardare.film = film.Titolo";

$stmt = $conn->prepare($query_select);
$stmt->bind_param("s", $_SESSION["email"]);
$stmt->execute();
$da_guardare = $stmt->get_result();

$query_select = "SELECT * FROM film_visti, film WHERE email=? AND film_visti.film = film.Titolo";

$stmt = $conn->prepare($query_select);
$stmt->bind_param("s", $_SESSION["email"]);
$stmt->execute();
$visti = $stmt->get_result();
?>