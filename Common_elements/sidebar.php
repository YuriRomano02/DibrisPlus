<aside class="sidebar">
    <div>
        <a href="../Home/home.php"><i class="fa-solid fa-house icona"></i></a>
        <label for="home">Home</label>
    </div>
    <div>
        <a href="../Cinema/cinema.php"><i class="fa-solid fa-film icona"></i></a>
        <label for="home">Cerca cinema</label>
    </div>
    <div>
        <a href="../Search page/search_page.php"><i class="fa-solid fa-magnifying-glass icona"></i></a>
        <label for="home">Cerca film</label>
    </div>
    <?php
    include "../../Common_elements/databaseConnection.php";
    $query = "SELECT Admin, Email FROM Utenti WHERE Email = ? AND admin = 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $_SESSION['user']);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        echo '<div>';
        echo '<a href="../Sezione amministratore/allusers.php"><i class="fa-solid fa-users icona"></i></a>';
        echo '<label for="home">Area amministrazione</label>';
        echo '</div>';
    }
    ?>
    <div>
        <a href="../../script_php/user.php"><i class="fa-regular fa-user icona"></i></a>
        <label for="home">Profilo</label>
    </div>
    <div>
        <a href="../exit.php"><i class="fa-solid fa-right-from-bracket icona"></i></a>
        <label for="home">Esci</label>
    </div>
</aside>