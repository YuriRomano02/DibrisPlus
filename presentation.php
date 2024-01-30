<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presentazione</title>

    <link rel="stylesheet" href="./Common_elements/background.css">
    <link rel="stylesheet" href="./Presentation/presentation.css">
    <link href="https://fonts.cdnfonts.com/css/new-walt-disney-font" rel="stylesheet">
</head>

<body>

    <?php
    include "./Common_elements/background.html";
    ?>
    <nav>
        <div>
            <p>Dibris</p>
            <p id="plus">+</p>
        </div>
        <div class="nav_items">
            <a href="./Presentation/work_in_progress.php">Home</a>
            <a href="./Presentation/work_in_progress.php">Cinema</a>
            <a href="./Login/form_login.php">Login</a>
            <a href="./Registration/form_registration.php">Sign-up</a>
        </div>
    </nav>

    <header>
        <h1>Benvenuto</h1>
    </header>

    <section class="sezione">
        <div>
            <h2>Cosa offre il sito?</h2>
            <p>Dibris+ è una piattaforma online adatta per tutti gli amanti dei film. Grazie alle diverse sezioni è
                possibile consultare un catalogo di film.</p>
        </div>
        <div>
            <img src="Media/Immagini/catalogo.jpeg" alt="un catalogo di film">
        </div>
    </section>

    <section class="sezione">
        <div>
            <h2>Preferiti</h2>
            <p>Aggiungi alla tua lista con gli appositi pulsanti tutti i film che ti sono piaciuti, che vuoi vedere dopo
                e anche quelli che hai visto.</p>
        </div>
        <div>
            <i id="preferiti" class="fa-solid fa-heart"></i>
            <i id="preferiti" class="fa-solid fa-clock"></i>
            <i id="preferiti" class="fa-solid fa-check"></i>
        </div>
    </section>

    <section class="sezione">
        <div>
            <h2>Cinema vicino a te</h2>
            <p>Nella sezione apposita, troverai una mappa di tutta l'italia. Sono evideziati la maggior parte dei
                cinema: cerca quello più vicino a te.</p>
        </div>
        <div>
            <img src="Media/Immagini/maps.jpeg" alt="un catalogo di film">
        </div>
    </section>

    <h1 id="sottotitolo">Sei pronto/a?</h1>
    <div id="buttons_container">
        <button onclick="location.href = 'Login/form_login.php'">Login</button>
        <button onclick="location.href = 'Registration/regitration.php'">Sign-up</button>
    </div>

    <footer>Prova</footer>

    <script src="https://kit.fontawesome.com/549ec4da67.js" crossorigin="anonymous"></script>
</body>

</html>