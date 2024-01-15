<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>

    <link rel="stylesheet" href="../../Elementi in comune/sfondo.css">
    <link rel="stylesheet" href="../../Elementi in comune/sidebar.css">

    <link rel="stylesheet" href="./film.css">
    <link href="https://fonts.cdnfonts.com/css/new-walt-disney-font" rel="stylesheet">
    <script src="https://kit.fontawesome.com/549ec4da67.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    include "../../Elementi in comune/controllo_accesso.php";
    include "../../Elementi in comune/sfondo.html";
    include "../../Elementi in comune/sidebar.php";


    include "../../Elementi in comune/databaseConnection.php";
    $film = $conn->real_escape_string(htmlspecialchars($_GET['film']));
    $query = "SELECT * FROM film WHERE Titolo = '$film'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    $titolo = $row["Titolo"];
    $_SESSION['titolo'] = $titolo;
    ?>

    <div class="contenitore">
        <header>
            <h1>
                <?php echo $titolo ?>
            </h1>
            <div>
                <i id="preferiti" class="fa-regular fa-heart preferiti"></i>
                <i id="guardaDopo" class="fa-regular fa-clock guardaDopo"></i>
                <i id="visto" class="fa-solid fa-check visto"></i>
            </div>
        </header>

        <div class="datiFilm">
            <?php
            echo "<img src='data:image/jpeg;base64," . base64_encode($row['Locandina']) . "'>";
            ?>
            <iframe width="560" height="315" src="<?php echo $row["Trailer"] ?>" title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
        </div>

        <div class="datiFilm" id="informazioni">
            <div class="Description">
                <h2>Sinossi</h2>
                <div>
                    <?php echo "<p>".$row["Descrizione"]."</p>" ?>
                </div>
            </div>
            <div class="Information">
                <h2>Dettagli</h2>
                <ul>
                    <li>Data di rilascio:
                        <?php echo $row["AnnoDiRilascio"] ?>
                    </li>
                    <li>Regista:
                        <?php echo $row["Regista"] ?>
                    </li>
                    <li>Generi:
                        <?php echo $row["Genere"] ?>
                    </li>
                    <li>Durata:
                        <?php echo $row["Durata"] ?> minuti
                    </li>
                    <li>Produzione:
                        <?php echo $row["Produzione"] ?>
                    </li>
                    <li>Distribuzione:
                        <?php echo $row["Distribuzione"] ?>
                    </li>
                    <li>Paese:
                        <?php echo $row["Paese"] ?>
                    </li>
                    <li>Incassi:
                        <?php echo $row["Incassi"] ?>
                    </li>
                    <li>Costi di produzione:
                        <?php echo $row["CostiDiProduzione"] ?>
                    </li>
                    <li>Attori:
                        <?php echo $row["Attori"] ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <script src="./file.js"></script>
</body>

</html>