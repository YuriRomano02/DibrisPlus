<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../../Elementi in comune/sfondo.css">
    <link rel="stylesheet" href="../../Elementi in comune/sidebar.css">

    <link rel="stylesheet" href="./search.css">

    <script src="https://kit.fontawesome.com/549ec4da67.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    include "../../Elementi in comune/sfondo.html";
    include "../../Elementi in comune/sidebar.php";

    include "../../Elementi in comune/databaseConnection.php";
    $query = "SELECT Titolo, Locandina FROM film";
    $result = $mysqli->query($query);
    ?>
    <div class="elementi">
        <form method="get" action="search.php">
            <input type="text" name="searchbox" placeholder="Search" required>
            <button type="submit" name="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        <div class="film">
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<a href='../Film/film.php?film=" . $row['Titolo'] . "'><img src='data:image/jpeg;base64," . base64_encode($row['Locandina']) . "'></a>";
            }
            ?>
        </div>
    </div>
</body>

</html>