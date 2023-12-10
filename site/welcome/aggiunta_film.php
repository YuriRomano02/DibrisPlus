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
            empty($_POST["descizione"]);
    }

    session_start();
    include "./databaseConnection.php";
    if (campi_vuoti())
        echo "<h1>Mancano dei parametri</h1>";
    else if () {
        header("Location: ../index.php");
    } else {
        echo "<h1>Credenziali sbagliate, riprovare.</h1>";
    }

    ?>
</body>

</html>