<aside class="sidebar">
    <div>
        <a href="../Home/home.php"><i class="fa-solid fa-house icona"></i></a>
        <label for="home">Home</label>
    </div>
    </div>
    <a href="../Cinema/cinema.php"><i class="fa-solid fa-film icona"></i></a>
    </div>
    <a href="../Search page/search_page.php"><i class="fa-solid fa-magnifying-glass icona"></i></a>
    <?php
    include "../../Elementi in comune/databaseConnection.php";
    $query = "SELECT Admin, Email FROM Utenti WHERE Email = ? AND admin = 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $_SESSION['user']);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        echo '<a href="../Sezione amministratore/allusers.php"><i class="fa-solid fa-users icona"></i></a>';
    }
    ?>
    <a href="../Area utente/user.php"><i class="fa-regular fa-user icona"></i></a>
    <a href="../exit.php"><i class="fa-solid fa-right-from-bracket icona"></i></a>
</aside>