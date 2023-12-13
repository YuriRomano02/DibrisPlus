<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../Elementi in comune/sfondo.css">
    <link rel="stylesheet" href="../Elementi in comune/sidebar.css">

    <link rel="stylesheet" href="./search.css">

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
        <div id="cover">
            <form method="get" action="search.php">
                <div class="tb">
                    <div class="td"><input type="text" name="searchbox" placeholder="Search" required></div>
                    <div class="td" id="s-cover">
                        <button type="submit" name="submit">
                            <div id="s-circle"></div>
                            <span></span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="film">
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<a href='./film.php?film=" . $row['Titolo'] . "'><img src='data:image/jpeg;base64," . base64_encode($row['Locandina']) . "'></a>";
            }
            ?>
        </div>
    </div>
</body>

</html>