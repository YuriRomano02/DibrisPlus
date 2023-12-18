<?php

$servername = "localhost";
$username = "yuri";
$password = "romanus99";
$dbname = "unige";

$conn = new mysqli($servername, $username, $password, $dbname);

$user = null;
$films = array();
// Verifica se l'utente è autenticato
if (isset($_SESSION['email'])) {
    $mail = $_SESSION['email'];

    $query = "SELECT utenti.nome, watched.film_visti FROM utenti
JOIN watched ON utenti.email = watched.email
WHERE utenti.email = '$mail'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $user = $row['nome'];
                $films[] = $row['film_visti'];
            }
        } else {
            echo "No user found with email: " . $mail;
        }
    } else {
        echo "Error executing the query.";
    }
}

// Chiudi la connessione al database

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Elementi in comune/sfondo.css">
    <link rel="stylesheet" href="../../Elementi in comune/sidebar.css">
    <?php
    $cssFile = "user.css";
    echo "<link rel='stylesheet' href='" . $cssFile . "'>";
    ?>

    <script src="https://kit.fontawesome.com/549ec4da67.js" crossorigin="anonymous"></script>
    <title>User</title>
</head>

<body>
    <?php
    include "../../Elementi in comune/sfondo.html";
    include "../../Elementi in comune/sidebar.php";

    include "../../Elementi in comune/databaseConnection.php";
    ?>
    <div class="contenitore">
        <aside>
            <div class="Image">
                <?php
                $email = $_SESSION['email'];
                $sql = "SELECT photo FROM utenti WHERE email='$email'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                if ($row['photo'] != null) {
                    echo "<img src='data:image/jpeg;base64," . base64_encode($row['photo']) . "'>";
                } else {
                    echo "<img src='img/user.png'>";
                }
                ?>
            </div>

            <h3 class="nickname" style="color: white;">
                <?php echo $user ?>
            </h3>
            <h3 class="nickname" style="color: white;"></h3>
            <button class="button" onclick="window.location.href='modify_user.php';">Edit
                    your profile</button>
            <div class="add">
                <?php
                $email = 'S5231931@studenti.unige.it';
                if (isset($_SESSION['email']) && $_SESSION['email'] == $email) {
                    echo "<button class='button' onclick=\"window.location.href='../Sezione amministratore/form_aggiunta_film.php';\"><span>Admin</span></button>";
                }
                ?>
            </div>
        </aside>
        <section class="Film">
            <div class="Not_Seen">
                <h2 style="color: white;">Film da Guardare</h2>
                <div class="film-container">
                    <?php
                    foreach ($films as $film) {
                        echo "<div class='film_visto'>";
                        echo "<img src='$film' alt='Film Visti' style='width: 200px; height: auto;'>";
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>
            <div class="Seen">
                <h2 style="color: white;">Film Visti</h2>

            </div>
            <div class="Favorites">
                <h2 style="color: white;">Preferiti</h2>

            </div>
    </div>
    </section>
</body>

</html>