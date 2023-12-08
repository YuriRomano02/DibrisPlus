<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>

    <link rel="stylesheet" href="../Elementi in comune/sfondo.css">
    <link rel="stylesheet" href="../Elementi in comune/sidebar.css">

    <link rel="stylesheet" href="../aggiunta_film.css">

    <link rel="stylesheet" href="./film.css">
    <link href="https://fonts.cdnfonts.com/css/new-walt-disney-font" rel="stylesheet">
    <script src="https://kit.fontawesome.com/549ec4da67.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php

    include "../Elementi in comune/sfondo.html";
    include "../Elementi in comune/sidebar.php";

    ?>

    <div class="elementi">
        <h1>Inserisci film</h1>
        <form>
            <label>Titolo</label>
            <input type="Text" placeholder="ES. Oceania">

            
            <label>Descrizione</label>
            <input type="Text" placeholder="ES. Oceania">

            
            <label>Uscita</label>
            <input type="Text" placeholder="ES. Oceania">

            
            <label>Incassi</label>
            <input type="Text" placeholder="ES. Oceania">
        </form>
    </div>

</body>

</html>