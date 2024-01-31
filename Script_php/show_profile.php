<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Common_elements/background.css">
    <link rel="stylesheet" href="../Common_elements/sidebar.css">
    <link rel='stylesheet' href="../User_area/user.css">

    <script src="https://kit.fontawesome.com/549ec4da67.js" crossorigin="anonymous"></script>
    <title>Area riservata</title>
</head>

<body>
    <?php
    include "../Common_elements/controllo_accesso.php";
    include "../Common_elements/background.html";
    include "../Common_elements/sidebar.php";

    include "../Common_elements/databaseConnection.php";
    $query = "SELECT * FROM utenti WHERE Email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $_SESSION["email"]);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Errore";
    }

    $_SESSION["email"] = $row["email"];
    $_SESSION["firstname"] = $row["nome"];
    $_SESSION["lastname"] = $row["cognome"];
    $_SESSION["cell"] = $row["numero_telefono"];
    $_SESSION["photo"] = $row["photo"];

    $query_select = "SELECT * FROM film_preferiti, film WHERE email=? AND film_preferiti.film = film.Titolo";

    $stmt = $conn->prepare($query_select);
    $stmt->bind_param("s", $_SESSION["email"]);
    $stmt->execute();
    $preferiti = $stmt->get_result();

    $query_select = "SELECT * FROM film_da_guardare, film WHERE email=? AND film_da_guardare.film = film.Titolo";

    $stmt = $conn->prepare($query_select);
    $stmt->bind_param("s", $_SESSION["email"]);
    $stmt->execute();
    $da_guardare = $stmt->get_result();

    $query_select = "SELECT * FROM film_visti, film WHERE email=? AND film_visti.film = film.Titolo";

    $stmt = $conn->prepare($query_select);
    $stmt->bind_param("s", $_SESSION["email"]);
    $stmt->execute();
    $visti = $stmt->get_result();
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
            <div class="add">
                <?php
                $email = 'S5231931@studenti.unige.it';
                if (isset($_SESSION['email']) && $_SESSION['email'] == $email) {
                    echo "<button class='button' onclick=\"window.location.href='../Sezione amministratore/form_aggiunta_film.php';\"><span>Admin</span></button>";
                }
                ?>
            </div>
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
</body>

</html>