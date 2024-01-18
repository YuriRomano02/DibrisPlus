<aside class="sidebar">
    <div>
        <a href="../Home/home.php"><i class="fa-solid fa-house icona" id="home"></i></a>
        <label for="home">Home</label>
    </div>
    <div>
        <a href="../Cinema/cinema.php"><i class="fa-solid fa-film icona" id="cinema"></i></a>
        <label for="cinema">Cerca cinema</label>
    </div>
    <div>
        <a href="../Search_page/search_page.php"><i class="fa-solid fa-magnifying-glass icona" id="search"></i></a>
        <label for="search">Cerca film</label>
    </div>
    <?php
    include "../Common_elements/databaseConnection.php";
    $query = "SELECT Admin, Email FROM Utenti WHERE Email = ? AND admin = 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $_SESSION['user']);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        echo '<div>';
        echo '<a href="../Amministration/allusers.php"><i class="fa-solid fa-users icona" id="amministrazione"></i></a>';
        echo '<label for="amministrazione">Area admin</label>';
        echo '</div>';
    }
    ?>
    <div>
        <a href="../Script_php/show_profile.php"><i class="fa-regular fa-user icona" id="profilo"></i></a>
        <label for="profilo">Profilo</label>
    </div>
    <div>
        <a href="../Script_php/logout.php"><i class="fa-solid fa-right-from-bracket icona" id="logout"></i></a>
        <label for="logout">Esci</label>
    </div>
</aside>