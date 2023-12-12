<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Elementi in comune/sfondo.css">
    <link rel="stylesheet" href="../Elementi in comune/sidebar.css">
    <link rel="stylesheet" href="./welcome copy.css">
    <link href="https://fonts.cdnfonts.com/css/new-walt-disney-font" rel="stylesheet">
    <script src="https://kit.fontawesome.com/549ec4da67.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    include "../Elementi in comune/sfondo.html";
    include "../Elementi in comune/sidebar.php";

    include "./databaseConnection.php";
    $query = "SELECT Titolo, Locandina FROM film";
    $result = $mysqli->query($query);
    ?>

    <div class="elementi">
        <div id="div_logo">
            <p>Dibris</p>
            <p id="stellina">+</p>
        </div>
        <section class="film">
            <h1>Film in evidenza</h1>
            <div class="scroll">
                <?php
                while ($row = $result->fetch_assoc()) {
                    echo "<a href='./film.php?film=" . $row['Titolo'] . "'><img src='data:image/jpeg;base64," . base64_encode($row['Locandina']) . "'></a>";
                }
                ?>
            </div>
        </section>
    </div>
</body>

</html>