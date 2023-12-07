<?php
session_start();

$servername = "localhost";
$username = "yuri";
$password = "romanus99";
$dbname = "unige";

$conn = new mysqli($servername, $username, $password, $dbname);

$user = null;

// Verifica se l'utente è autenticato
if (isset($_SESSION['email'])) {
    $mail = $_SESSION['email'];

    $query = "SELECT utenti.nome, film.film_visti FROM utenti
              JOIN film ON utenti.email = film.email
              WHERE utenti.email = '$mail'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            if ($user) {
                $filmVisti = $user['film_visti'];
            } else {
                echo "Failed to fetch user's data from the database.";
            }
        } else {
            echo "No user found with email: " . $mail;
        }
    } else {
        echo "Error executing the query.";
    }
}

// Chiudi la connessione al database
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        $cssFile="user.css";
        echo "<link rel='stylesheet' href='" . $cssFile . "'>";
    ?>
    <title>User</title>
</head>
<body>
    <aside>
        <img src="../Immagini e gif/Immagini/avatar.png" alt="Avatar" class="avatar" style="width: 100%;height: auto;">
        <h3 class="nickname" style="color: white;"><?php echo $user ? $user['nome'] : '';?></h3>
        <h3 class="nickname" style="color: white;"></h3>
    </aside>
    <section class="Film">
        <div class="Not_Seen">
            <h2 style="color: white;">Film da Guardare</h2>
            <?php echo "<img src='$filmVisti' alt='Film Visti' style='width: 30%; height: auto;'>"; ?>
        </div>
        <div class="Seen">
            <h2 style="color: white;">Film Visti</h2>
            
        </div>
        <div class="Favorites">
            <h2 style="color: white;">Preferiti</h2>
            
        </div>
    </section>
</body>
</html>