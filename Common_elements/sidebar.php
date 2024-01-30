<aside class="sidebar">
    <a href="../Home/home.php">
        <div>
            <i class="fa-solid fa-house icona" id="home"></i>
            <label for="home">Home</label>
        </div>
    </a>
    <a href="../Cinema/cinema.php">
        <div>
            <i class="fa-solid fa-globe icona"></i>
            <label for="cinema">Cerca cinema</label>
        </div>
    </a>
    <a href="../Search_page/search_page.php">
        <div>
            <i class="fa-solid fa-magnifying-glass icona" id="search"></i>
            <label for="search">Cerca film</label>
        </div>
    </a>
    <?php
    include "../Common_elements/databaseConnection.php";
    $query = "SELECT Admin, Email FROM utenti WHERE Email = ? AND admin = 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $_SESSION['email']);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        echo '<a href="../Amministration/amministration.php">';
        echo '<div>';
        echo '<i class="fa-solid fa-pen icona"></i>';
        echo '<label for="amministrazione">Area admin</label>';
        echo '</div>';
        echo '</a>';
    }
    ?>
    <a href="../Script_php/show_profile.php">
        <div>
            <i class="fa-regular fa-user icona" id="profilo"></i>
            <label for="profilo">Profilo</label>
        </div>
    </a>
    <a href="../Script_php/logout.php">
        <div>
            <i class="fa-solid fa-right-from-bracket icona" id="logout"></i>
            <label for="logout">Esci</label>
        </div>
    </a>
</aside>