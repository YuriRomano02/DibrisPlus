<?php
session_start();

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

    $query = "SELECT utenti.nome, film.film_visti FROM utenti
                JOIN film ON utenti.email = film.email
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
    <?php
        $cssFile="user.css";
        echo "<link rel='stylesheet' href='" . $cssFile . "'>";
    ?>
    <title>User</title>
</head>
<body>
<aside>
<?php
$email=$_SESSION['email'];
$sql = "SELECT photo FROM utenti WHERE email='$email'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if($row['photo']!=null){
    echo "<img src='data:image/jpeg;base64,".base64_encode($row['photo'])."' style='width: 200px; height: auto;'>";
}else{  
    echo "<img src='img/user.png' style='width: 200px; height: auto;'>";
}
?>

    <h3 class="nickname" style="color: white;"><?php echo $user ?></h3>
    <h3 class="nickname" style="color: white;"></h3>
<button class="button" style="text-align: center;" onclick="window.location.href='modify_user.php';"><span>Edit your profile</span></button>

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
</section>
</body>
</html>
