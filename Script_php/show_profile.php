<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Common_elements/background.css">
    <link rel="stylesheet" href="../Common_elements/sidebar.css">
    <link rel='stylesheet' href="../User_area/user.css">
    <title>Area riservata</title>
</head>

<body>
    <?php
    include "../Common_elements/controllo_accesso.php";
    include "../Common_elements/background.html";
    include "../Common_elements/sidebar.php";
    include "../Common_elements/databaseConnection.php";
    include "../User_area/dati_film.php";
    ?>
    <div class="contenitore">
        <div class="userInformation">
            <div class="Image">
                <?php
                if (empty($row["photo"])) {
                    echo "<img src='../Media/Immagini/profile.jpeg'>";
                } else {
                    echo "<img src='data:image/jpeg;base64," . base64_encode($row['photo']) . "'>";
                }

                ?>
            </div>


            <h3 class="dati" style="color: white;">
                <?php
                echo "<p>Email: " . $row["email"] . "</p>";
                ?>
            </h3>
            <h3 class="dati" style="color: white;">
                <?php
                echo "<p>Nome: " . $row["nome"] . "</p>"; // Display the name
                ?>
            </h3>
            <h3 class="dati" style="color: white;">
                <?php
                echo "<p>Cognome: " . $row["cognome"] . "</p>";
                ?>
            </h3>
            <h3 class="dati" style="color: white;">
                <?php
                if ($row["numero_telefono"] != 0)
                    echo "<p>Telefono: " . $row["numero_telefono"] . "</p>";
                else
                    echo "Numero telefono non registrato";
                ?>
            </h3>
            <button class="button" onclick="window.location.href='../User_area/form_update_profile.php';">Modifica
                profilo</button>
        </div>
        <section class="Film">
            <div class="Not_Seen">
                <h2>Film da Guardare</h2>
                <div class="scroll">
                    <?php
                    if ($da_guardare->num_rows > 0) {
                        while ($row = $da_guardare->fetch_assoc()) {
                            echo "<a href='../Film/film.php?film=" . $row['Titolo'] . "'><img src='data:image/jpeg;base64," . base64_encode($row['Locandina']) . "'></a>";
                        }
                    } else {
                        echo "Non hai ancora inserito dei film";
                    }
                    ?>
                </div>
            </div>
            <div class="Seen">
                <h2>Film Visti</h2>
                <div class="scroll">
                    <?php
                    if ($visti->num_rows > 0) {
                        while ($row = $visti->fetch_assoc()) {
                            echo "<a href='../Film/film.php?film=" . $row['Titolo'] . "'><img src='data:image/jpeg;base64," . base64_encode($row['Locandina']) . "'></a>";
                        }
                    } else {
                        echo "Non hai ancora inserito dei film";
                    }
                    ?>
                </div>
            </div>
            <div class="Favorites">
                <h2>Preferiti</h2>
                <div class="scroll">
                    <?php
                    if ($preferiti->num_rows > 0) {
                        while ($row = $preferiti->fetch_assoc()) {
                            echo "<a href='../Film/film.php?film=" . $row['Titolo'] . "'><img src='data:image/jpeg;base64," . base64_encode($row['Locandina']) . "'></a>";
                        }
                    } else {
                        echo "Non hai ancora inserito dei film";
                    }
                    ?>
                </div>
            </div>
        </section>
    </div>

    <script src="https://kit.fontawesome.com/549ec4da67.js" crossorigin="anonymous"></script>
</body>

</html>