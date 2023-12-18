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

    include "../../Elementi in comune/sfondo.html";
    include "../../Elementi in comune/sidebar.php";


    include "../../Elementi in comune/databaseConnection.php";
    $film = $mysqli->real_escape_string(htmlspecialchars($_GET['film']));
    $query = "SELECT * FROM film WHERE Titolo = '$film'";
    $result = $mysqli->query($query);
    $row = $result->fetch_assoc();
    ?>

    <div class="elementi">

        <h1>
            <?php echo $row["Titolo"] ?>
        </h1>
        <script>
            function Add() {
                
                var preferitiElement = document.getElementById("preferiti");

                
                if (preferitiElement) {
                    var newITag = document.createElement("i");
                    newITag.setAttribute("class", "fa-solid fa-heart preferiti");

                    
                    preferitiElement.parentNode.replaceChild(newITag, preferitiElement);
                }
            }
        </script>

        <i id="preferiti" class="fa-regular fa-heart preferiti" onclick="Add()"></i>
        <?php
        $servername = "localhost";
        $username = "yuri";
        $password = "romanus99";
        $dbname = "unige";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


        ?>



        <div class="informazioni">
            <div class="video-container">
                <iframe width="560" height="315" src="<?php echo $row["Trailer"] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            <div class="img_container">
                <?php
                echo "<img src='data:image/jpeg;base64," . base64_encode($row['Locandina']) . "'>";
                ?>
            </div>
        </div>

        <div class="informazioni">
            <div class="Description">
                <?php echo $row["Descrizione"] ?>
            </div>
            <div class="Information">
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
    <script>
        function aggiungiAiPreferiti() {
            document.getElementById("preferiti")
        }
    </script>


</body>

</html>