<!DOCTYPE html>
<html lang="en">

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
    $query = "SELECT * FROM Utenti WHERE Email = ?";
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
    ?>
    <div class="contenitore">
        <aside>
            <div class="Image">
                <?php
                echo "<img src='data:image/jpeg;base64," . base64_encode($row['photo']) . "'>";
                
                ?>
            </div>

            <h3 class="nickname" style="color: white;">
                <?php
                echo "<p>".$row["nome"]."</p>"; // Display the name
                ?>
            </h3>
            <h3 class="nickname" style="color: white;">
                <?php
                echo "<p>".$row["cognome"]."</p>";
                ?>
            </h3>
            <h3 class="nickname" style="color: white;">
                <?php
                echo "<p>".$row["email"]."</p>";
                ?>
            </h3>
            <button class="button" onclick="window.location.href='../User_area/form_update_profile.php';">Edit
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
            </div>
            <div class="Favorites">
                <h2>Preferiti</h2>
            </div>
        </section>
    </div>
</body>

</html>