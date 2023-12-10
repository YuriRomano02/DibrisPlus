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
            empty($_POST["locandina"]) ||
            empty($_POST["data_di_rilascio"]) ||
            empty($_POST["regista"]) ||
            empty($_POST["generi"]) ||
            empty($_POST["durata"]) ||
            empty($_POST["produzione"]) ||
            empty($_POST["distribuzione"]) ||
            empty($_POST["paese"]) ||
            empty($_POST["incassi"]) ||
            empty($_POST["costi_di_produzione"]) ||
            empty($_POST["descrizione"]);
    }

    function inserimentoDati($mysqli)
    {
        $titolo = $mysqli->real_escape_string(htmlspecialchars($_POST["titolo"]));
        $locandina = $mysqli->real_escape_string(htmlspecialchars($_POST["locandina"]));
        $data_di_rilascio = $mysqli->real_escape_string(htmlspecialchars($_POST["data_di_rilascio"]));
        $regista = $mysqli->real_escape_string(htmlspecialchars($_POST["regista"]));
        $generi = $mysqli->real_escape_string(htmlspecialchars($_POST["generi"]));
        $durata = $mysqli->real_escape_string(htmlspecialchars($_POST["durata"]));
        $produzione = $mysqli->real_escape_string(htmlspecialchars($_POST["produzione"]));
        $distribuzine = $mysqli->real_escape_string(htmlspecialchars($_POST["distribuzione"]));
        $paese = $mysqli->real_escape_string(htmlspecialchars($_POST["paese"]));
        $incassi = $mysqli->real_escape_string(htmlspecialchars($_POST["incassi"]));
        $costi_di_produzione = $mysqli->real_escape_string(htmlspecialchars($_POST["costi_di_produzione"]));
        $descrizione = $mysqli->real_escape_string(htmlspecialchars($_POST["descrizione"]));

        $query = "INSERT INTO film (Titolo, Locandina, Anno di rilascio, Regista, Genere, Durata, Produzione, Distribuzione, Paese, Incassi, Costi di produzione, Descrizione) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";

        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("sssssssssssss", $titolo, $locandina, $data_di_rilascio, $regista, $generi, $durata, $produzione, $distribuzine, $paese, $incassi, $costi_di_produzione, $descrizione);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result) {
            echo "<br>Inserimento avvenuto correttamente";
        } else {
            echo "<br>Inserimento non eseguito";
            error_log("You messed up!", 3, "./my-errors.log");
        }
        $mysqli->close();
    }

    include "./databaseConnection.php";
    if (campi_vuoti())
        echo "<h1>Mancano dei parametri.</h1>\n";
    else {
        inserimentoDati($mysqli);
        echo $titolo."prova";
    }

    ?>
</body>

</html>