<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>

    <link rel="stylesheet" href="../Elementi in comune/sfondo.css">
    <link rel="stylesheet" href="../Elementi in comune/sidebar.css">

    <link rel="stylesheet" href="./film.css">
    <link href="https://fonts.cdnfonts.com/css/new-walt-disney-font" rel="stylesheet">
    <script src="https://kit.fontawesome.com/549ec4da67.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php

    include "../Elementi in comune/sfondo.html";
    include "../Elementi in comune/sidebar.php";

    include "./databaseConnection.php";
    $query = "SELECT * FROM film";
    $result = $mysqli->query($query);
    $row = $result->fetch_assoc();
    $prova = "../Immagini e gif/Immagini/locandine/The Marvels.jpg";
    ?>

    <div class="elementi">

        <h1>
            <?php echo $row["Titolo"] ?>
        </h1><i class="fa-regular fa-heart preferiti"></i><br>



        <div class="informazioni">
            <div class="video-container">
                <iframe width="560" height="315"
                    src="https://www.youtube.com/embed/dQw4w9WgXcQ?si=MJb0qPYp7nhe8moR&rel=0"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
            </div>

            <img src="<?php echo $row["Locandina"] ?>" alt="<?php echo $row["Locandina"] ?>">
        </div>

        <div class="informazioni">
            <div class="contenitori">
                <?php echo $row["Descrizione"] ?>
            </div>
            <div class="contenitori">
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
                </ul>
            </div>
        </div>
    </div>

</body>

</html>