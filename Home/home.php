<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Common_elements/background.css">
    <link rel="stylesheet" href="../Common_elements/sidebar.css">
    <link rel="stylesheet" href="./home.css">
    <link href="https://fonts.cdnfonts.com/css/new-walt-disney-font" rel="stylesheet">
</head>

<body>
    <?php
    include "../Common_elements/controllo_accesso.php";
    include "../Common_elements/background.html";
    include "../Common_elements/sidebar.php";

    include "../Common_elements/databaseConnection.php";
    include "./show_film.php";
    $query = "SELECT Titolo, Locandina FROM film";
    $result = $conn->query($query);
    ?>

    <div class="contenitore">
        <div id="div_logo">
            <p>Dibris</p>
            <p id="stellina">+</p>
        </div>
        <div class="Image">
        </div>
        <section class="film">
            <h1>Film in evidenza</h1>
            <div class="scroll">
                <?php
                while ($row = $result->fetch_assoc()) {
                    echo "<a href='../Film/film.php?film=" . $row['Titolo'] . "'><img src='data:image/jpeg;base64," . base64_encode($row['Locandina']) . "'></a>";
                }
                ?>
            </div>
        </section>
        <section class="film">
            <h1>Commedia</h1>
            <div class="scroll">
                <?php
                filmFromDatabase("commedia", $conn);
                ?>
            </div>
        </section>
        <section class="film">
            <h1>Romantico</h1>
            <div class="scroll">
                <?php
                filmFromDatabase("Romantico", $conn);
                ?>
            </div>
        </section>
        <section class="film">
            <h1>Azione</h1>
            <div class="scroll">
                <?php
                filmFromDatabase("Azione", $conn);
                ?>
            </div>
        </section>
        <section class="film">
            <h1>Horror</h1>
            <div class="scroll">
                <?php
                filmFromDatabase("Horror", $conn);
                ?>
            </div>
        </section>
    </div>

    <script src="https://kit.fontawesome.com/549ec4da67.js" crossorigin="anonymous"></script>
</body>

</html>