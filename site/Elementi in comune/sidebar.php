<aside class="sidebar">
    <div></div>
    <a href="../Home/home.php"><i class="fa-solid fa-house icona"></i></a>
    <a href="../Cinema/cinema.php"><i class="fa-solid fa-film icona"></i></a>
    <a href="../Search page/search_page.php"><i class="fa-solid fa-magnifying-glass icona"></i></a>
    <?php
        session_start();
        $email = 'S5231931@studenti.unige.it';
        if(isset($_SESSION['email']) && $_SESSION['email'] == $email) {
            echo '<a href="../Sezione amministratore/allusers.php"><i class="fa-solid fa-users icona"></i></a>';
        }
    ?>
    <a href="../Area utente/user.php"><i class="fa-regular fa-user icona"></i></a>
    
    <a href="../exit.php"><i class="fa-solid fa-right-from-bracket icona"></i></a>
</aside>