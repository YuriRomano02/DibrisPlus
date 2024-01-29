<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Film</title>

    <link rel="stylesheet" href="../Common_elements/background.css">
    <link rel="stylesheet" href="../Common_elements/sidebar.css">

    <link rel="stylesheet" href="./film.css">
    <link href="https://fonts.cdnfonts.com/css/new-walt-disney-font" rel="stylesheet">
    <script src="https://kit.fontawesome.com/549ec4da67.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    include "../Common_elements/controllo_accesso.php";
    include "../Common_elements/background.html";
    include "../Common_elements/sidebar.php";
    include "../Common_elements/databaseConnection.php";
    include "./filmData.php";
    ?>

    <div class="contenitore">
        <header>
            <h1>
                <?php echo $titolo ?>
            </h1>
            <div>
                <?php
                if ($preferiti)
                    echo '<i id="preferiti" class="fa-solid fa-heart preferiti"></i>';
                else
                    echo '<i id="preferiti" class="fa-regular fa-heart preferiti"></i>';
                if ($da_guardare)
                    echo '<i id="guardaDopo" class="fa-solid fa-clock guardaDopo"></i>';
                else
                    echo '<i id="guardaDopo" class="fa-regular fa-clock guardaDopo"></i>';
                if ($visti)
                    echo '<i id="visto" class="fa-solid fa-xmark visto"></i>';
                else
                    echo '<i id="visto" class="fa-solid fa-check visto"></i>';
                ?>
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

        <div class="datiFilm">
            <?php if (isset($_SESSION["voto"]))
                echo "<h2>Media voti: " . (int) $media_voti["media"] . "/10</h2>";
            ?>
        </div>

        <div class="datiFilm">
            <h1>Il tuo voto:</h1>
            <select id="voto">
                <option value="" selected disabled hidden>seleziona</option>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
        </div>

        <div class="datiFilm">
            <?php if ($_SESSION["voto"] == null)
                echo "<h1>Non hai ancora votato</h1>";
            else
                echo "<h1>Il tuo voto: " . $_SESSION["voto"]["voto"] . "/10</h1>";
            ?>
        </div>


        <div class="datiFilm" id="informazioni">
            <div class="Description">
                <h2>Sinossi</h2>
                <div>
                    <?php echo "<p>" . $row["Descrizione"] . "</p>" ?>
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
    <script src="./film.js"></script>
</body>

</html>