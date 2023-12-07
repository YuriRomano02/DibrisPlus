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

    $query = "SELECT nome FROM utenti WHERE email = '$mail'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            if ($user) {
                echo "User's name: " . $user['nome'];
            } else {
                echo "Failed to fetch user's data from the database.";
            }
        } else {
            echo "No user found with email: " . $mail;
        }
    } else {
        echo "Query failed: " . mysqli_error($conn);
    }
} else {
    echo "User is not logged in.";
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
        <h3 class="Title_Description" style="color: white;">Descrizione</h3>
        <textarea class="description"  cols="30" rows="10" style="color: white;"></textarea>
    </aside>
    <section class="Film">
        <div class="Not_Seen">
            <h2 style="color: white;">Film da Guardare</h2>
            <img src="https://th.bing.com/th/id/R.ba26a3fc831a0bb87736889e02172657?rik=uXyAdlOkXmrwnw&pid=ImgRaw&r=0" alt="" style="width: auto; height: 315px;">
        </div>
        <div class="Seen">
            <h2 style="color: white;">Film Visti</h2>
            <img src="https://www.kino-zeit.de/sites/default/files/styles/plakat/public/2020-04/super-mario-bros..jpg?itok=XWsY0-0n" alt="" style="width: auto; height: 315px;">
        </div>
        <div class="Favorites">
            <h2 style="color: white;">Preferiti</h2>
        </div>
    </section>
</body>
</html>