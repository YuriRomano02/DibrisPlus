<?php
session_start();
include "../Common_elements/databaseConnection.php";
include "../Common_elements/controlla_permessi.php";

function campi_vuoti()
{
    return
        empty($_POST["titolo"]) ||
        empty($_FILES["locandina"]) ||
        empty($_POST["data_di_rilascio"]) ||
        empty($_POST["regista"]) ||
        empty($_POST["genere"]) ||
        empty($_POST["durata"]) ||
        empty($_POST["produzione"]) ||
        empty($_POST["distribuzione"]) ||
        empty($_POST["paese"]) ||
        empty($_POST["incassi"]) ||
        empty($_POST["costi_di_produzione"]) ||
        empty($_POST["descrizione"]) ||
        empty($_POST["trailer"]) ||
        empty($_POST["Attori"]);
}

function inserimentoDati($conn)
{
    $titolo = $conn -> real_escape_string(htmlspecialchars(trim($_POST["titolo"])));
    $locandina = file_get_contents($_FILES['locandina']['tmp_name']);
    $data_di_rilascio = $conn -> real_escape_string(htmlspecialchars(trim($_POST["data_di_rilascio"])));
    $regista = $conn -> real_escape_string(htmlspecialchars(trim($_POST["regista"])));
    $generi = implode(" , ", $_POST["genere"]);
    $durata = $conn -> real_escape_string(htmlspecialchars(trim($_POST["durata"])));
    $produzione = $conn -> real_escape_string(htmlspecialchars(trim($_POST["produzione"])));
    $distribuzione = $conn -> real_escape_string(htmlspecialchars(trim($_POST["distribuzione"])));
    $paese = $conn -> real_escape_string(htmlspecialchars(trim($_POST["paese"])));
    $incassi = $conn -> real_escape_string(htmlspecialchars(trim($_POST["incassi"])));
    $costi_di_produzione = $conn -> real_escape_string(htmlspecialchars(trim($_POST["costi_di_produzione"])));
    $descrizione = $conn -> real_escape_string(htmlspecialchars(trim($_POST["descrizione"])));
    $trailer = $conn -> real_escape_string(htmlspecialchars(trim($_POST["trailer"])));
    $attori = $conn -> real_escape_string(htmlspecialchars(trim($_POST["Attori"])));

    $query = "INSERT INTO film (Titolo, Locandina, AnnoDiRilascio, Regista, Genere, Durata, Produzione, Distribuzione, Paese, Incassi, CostiDiProduzione, Descrizione, Trailer , Attori) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssssssssssssss', $titolo, $locandina, $data_di_rilascio, $regista, $generi, $durata, $produzione, $distribuzione, $paese, $incassi, $costi_di_produzione, $descrizione, $trailer, $attori);
    $result = $stmt->execute();

    if (!$result) {
        return false;
    } else {
        return true;
    }
}

if (!campi_vuoti()) {
    if (inserimentoDati($conn))
        header("Location: ./film_aggiunto.php");
    else {
        header("Location: ./film_non_aggiunto.php");
    }
} else {
    header("Location: ./film_non_aggiunto.php");
}
?>