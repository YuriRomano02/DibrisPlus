<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presentazione</title>

    <link rel="stylesheet" href="../../Elementi in comune/sfondo.css">
    <link rel="stylesheet" href="./presentazione.css">
    <link href="https://fonts.cdnfonts.com/css/new-walt-disney-font" rel="stylesheet">
</head>

<body>

    <?php
    include "../../Elementi in comune/sfondo.html";
    ?>
    <nav>
        <div>
            <p>Dibris</p>
            <p id="plus">+</p>
        </div>
        <div class="nav_items">
            <a href="./work_in_progress.php">Home</a>
            <a href="./work_in_progress.php">Cinema</a>
            <a href="../../Login/form_login.php">Login</a>
            <a href="../../registration/registration.php">Sign-up</a>
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
            <img src="../../Media/Immagini/Dibris_topo.png" alt="un catalogo di film">
        </div>
    </section>

    <section class="sezione">
        <div>
            <h2>Preferiti</h2>
            <p>Aggiungi alla tua lista tutti i film che ti sono piaciuti, grazie alla funzione preferiti.</p>
        </div>
        <div>
            <img src="../../Media/Immagini/Dibris_topo.png" alt="un catalogo di film">
        </div>
    </section>

    <section class="sezione">
        <div>
            <h2>Cinema vicino a te</h2>
            <p>Nella sezione apposita, troverai una mappa di tutta l'italia. Sono evideziati la maggior parte dei
                cinema: cerca quello più vicino a te.</p>
        </div>
        <div>
            <img src="../../Media/Immagini/Dibris_topo.png" alt="un catalogo di film">
        </div>
    </section>

    <h1 id="sottotitolo">Sei pronto/a?</h1>
    <div id="buttons_container">
        <button onclick="location.href = '../../Login/form_login.php'">Login</button>
        <button onclick="location.href = '../../registration/regitration.php'">Sign-up</button>
    </div>

    <footer>Prova</footer>

    <script src="https://kit.fontawesome.com/549ec4da67.js" crossorigin="anonymous"></script>
</body>

</html>