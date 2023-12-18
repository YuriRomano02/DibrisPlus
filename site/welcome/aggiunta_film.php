<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>log-in</title>
</head>

<body>

    <?php
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
            empty($_POST["descrizione"])||
            empty($_POST["trailer"]) ||
            empty($_POST["Attori"]);
    }

    function inserimentoDati($mysqli)
    {
        $titolo = $mysqli->real_escape_string(htmlspecialchars($_POST["titolo"]));
        $locandina = addslashes(file_get_contents($_FILES['locandina']['tmp_name']));
        $data_di_rilascio = $mysqli->real_escape_string(htmlspecialchars($_POST["data_di_rilascio"]));
        $regista = $mysqli->real_escape_string(htmlspecialchars($_POST["regista"]));
        $generi = $mysqli->real_escape_string(htmlspecialchars($_POST["genere"]));
        $durata = $mysqli->real_escape_string(htmlspecialchars($_POST["durata"]));
        $produzione = $mysqli->real_escape_string(htmlspecialchars($_POST["produzione"]));
        $distribuzione = $mysqli->real_escape_string(htmlspecialchars($_POST["distribuzione"]));
        $paese = $mysqli->real_escape_string(htmlspecialchars($_POST["paese"]));
        $incassi = $mysqli->real_escape_string(htmlspecialchars($_POST["incassi"]));
        $costi_di_produzione = $mysqli->real_escape_string(htmlspecialchars($_POST["costi_di_produzione"]));
        $descrizione = $mysqli->real_escape_string(htmlspecialchars($_POST["descrizione"]));
        $trailer = $mysqli->real_escape_string(htmlspecialchars($_POST["trailer"]));
        $attori = $mysqli->real_escape_string(htmlspecialchars($_POST["Attori"]));

        $query = "INSERT INTO film (Titolo, Locandina, AnnoDiRilascio, Regista, Genere, Durata, Produzione, Distribuzione, Paese, Incassi, CostiDiProduzione, Descrizione, Trailer , Attori) VALUES ('$titolo', '$locandina', '$data_di_rilascio', '$regista', '$generi', '$durata', '$produzione', '$distribuzione', '$paese', '$incassi', '$costi_di_produzione', '$descrizione', '$trailer', '$attori')";
        $result = $mysqli->query($query);
        if (!$result) {
            echo "Failed to connect to MySQL: " . $mysqli->error;
            exit();
        }
        if ($result) {
            echo "<br>Inserimento avvenuto correttamente";
        } else {
            echo "<br>Inserimento non eseguito";
            error_log("You messed up!", 3, "./my-errors.log");
        }
        $mysqli->close();
    }

    print_r($_POST);
    print_r($_FILES);
    include "./databaseConnection.php";
    if (campi_vuoti())
        echo "<h1>Mancano dei parametri.</h1>\n";
    else {
        inserimentoDati($mysqli);
    }

    ?>
</body>

</html>