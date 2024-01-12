<?php

include "../../Elementi in comune/databaseConnection.php";ì;

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
    $titolo = htmlspecialchars($_POST["titolo"]);
    $locandina = addslashes(file_get_contents($_FILES['locandina']['tmp_name']));
    $data_di_rilascio = htmlspecialchars($_POST["data_di_rilascio"]);
    $regista = htmlspecialchars($_POST["regista"]);
    $generi = htmlspecialchars($_POST["genere"]);
    $durata = htmlspecialchars($_POST["durata"]);
    $produzione = htmlspecialchars($_POST["produzione"]);
    $distribuzione = htmlspecialchars($_POST["distribuzione"]);
    $paese = htmlspecialchars($_POST["paese"]);
    $incassi = htmlspecialchars($_POST["incassi"]);
    $costi_di_produzione = htmlspecialchars($_POST["costi_di_produzione"]);
    $descrizione = htmlspecialchars($_POST["descrizione"]);
    $trailer = htmlspecialchars($_POST["trailer"]);
    $attori = htmlspecialchars($_POST["Attori"]);

    $query = "INSERT INTO film (Titolo, Locandina, AnnoDiRilascio, Regista, Genere, Durata, Produzione, Distribuzione, Paese, Incassi, CostiDiProduzione, Descrizione, Trailer , Attori) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssssssssssssss', $titolo, $locandina, $data_di_rilascio, $regista, $generi, $durata, $produzione, $distribuzione, $paese, $incassi, $costi_di_produzione, $descrizione, $trailer, $attori);
    $result = $query->execute();

    if (!$result) {
        echo "Error: " . $query->error;
    } else {
        echo "<br>Inserimento avvenuto correttamente";
    }
    $conn->close();
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!campi_vuoti()) {
        inserimentoDati($conn);
    } else {
        echo "Please fill all the fields";
    }
}
?>