<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Common_elements/background.css">
    <link rel="stylesheet" href="../../Common_elements/sidebar.css">
    <link rel='stylesheet' href="../Sezioni/Area_utente/user.css">

    <script src="https://kit.fontawesome.com/549ec4da67.js" crossorigin="anonymous"></script>
    <title>Area riservata</title>
</head>

<body>
    <?php
    include "../../Common_elements/controllo_accesso.php";
    include "../../Common_elements/background.html";
    include "../../Common_elements/sidebar.php";

    include "../../Common_elements/databaseConnection.php";
    $query = "SELECT * FROM Utenti WHERE Email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $_SESSION["user"]);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }
    else{
        echo "Errore";
    }
    ?>
    <div class="contenitore">
        <aside>
            <div class="Image">
                <?php
                if ($row['photo'] != null) {
                    echo "<img src='data:image/jpeg;base64," . base64_encode($row['photo']) . "'>";
                } else {
                    echo "<img src='profile.png' alt=''>";
                }
                ?>
            </div>

            <h3 class="nickname" style="color: white;">
                <?php
                $email = $_SESSION['user'];
                $query = mysqli_query($conn, "SELECT nome FROM utenti WHERE email = '$email'");
                $fetch = mysqli_fetch_array($query);
                echo $row["nome"]; // Display the name
                ?>
            </h3>   
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
                <h2>Film da Guardare</h2>
                <div class="film-container">
                </div>
            </div>
            <div class="Seen">
                <h2>Film Visti</h2>
                <?php
                //echo "<img src='" . $row['film_visti'] . " ' style='width: 300px;'>";
                ?>
            </div>
            <div class="Favorites">
                <h2>Preferiti</h2>
            </div>

        </section>
    </div>
</body>

</html>