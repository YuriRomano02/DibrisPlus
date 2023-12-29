<!DOCTYPE html>
<html lang="en">

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
            <h2>Dibris</h2>
            <p id="plus">+</p>
        </div>
        <div class="nav_items">
            <a href="">Home</a>
            <a href="">Cinema</a>
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
        <img src="../../Media/Immagini/Dibris_topo.png" alt="un catalogo di film">
    </section>

    <section class="sezione">
        <img src="../../Media/Immagini/Dibris_topo.png" alt="un catalogo di film">
        <div class="destra">
            <h2>Preferiti</h2>
            <p>Aggiunti alla tua lista tutti i film che ti sono piaciuti, grazie alla funzione preferiti.</p>
        </div>
    </section>

    <section class="sezione">
        <div>
            <h2>Cinema vicino a te</h2>
            <p>Nella sezione apposita, troverai una mappa di tutta l'italia. Sono evideziati la maggior parte dei
                cinema: cerca quello più vicino a te.</p>
        </div>
        <img src="../../Media/Immagini/Dibris_topo.png" alt="un catalogo di film">
    </section>

    <h1 id="sottotitolo">Sei pronto/a?</h1>
    <div id="buttons_container">
        <a class="login" href="../../Login/login.php">LOGIN</a>
        <a class="login" href="../../Login/login.php">SIGN-UP</a>
    </div>

    <footer>Prova</footer>

    <script src="https://kit.fontawesome.com/549ec4da67.js" crossorigin="anonymous"></script>
</body>

</html>