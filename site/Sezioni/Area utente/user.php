<?php

$servername = "localhost";
$username = "yuri";
$password = "romanus99";
$dbname = "unige";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}
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
                    echo "<img src='data:image/jpeg;base64," . base64_encode($row['photo']) . "' style='border-radius: 50%; width: 350px; height: 350px; object-fit: cover; object-position: center;margin-top: 3em;'>";
                } else {
                    echo "<img src='profile.png' style='border-radius: 50%;width: 350px;'>";
                }
                ?>
            </div>

            <h3 class="nickname" style="color: white;">
                <?php
                $email = $_SESSION['email'];
                $query = mysqli_query($conn, "SELECT nome FROM utenti WHERE email = '$email'");
                $fetch = mysqli_fetch_array($query);
                echo $fetch['nome']; // Display the name
                ?>
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
                    
                </div>
            </div>
            <div class="Seen">
                <h2 style="color: white;">Film Visti</h2>
                <?php
                $email = $_SESSION['email'];
                $query = mysqli_query($conn, "SELECT film_visti FROM watched WHERE email = '$email'");
                $fetch = mysqli_fetch_array($query);
                echo "<img src='" . $fetch['film_visti'] ." ' style='width: 300px;'>";
                ?>
            </div>
            <div class="Favorites">
                <h2 style="color: white;">Preferiti</h2>

            </div>
    </div>
    </section>
</body>

</html>