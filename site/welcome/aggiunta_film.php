<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>

    <link rel="stylesheet" href="../Elementi in comune/sfondo.css">
    <link rel="stylesheet" href="../Elementi in comune/sidebar.css">
    <link rel="stylesheet" href="./aggiunta_film.css">
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

            <label>Locandina</label>
            <input type="file" id="myFile" name="filename">

            <label>Descrizione</label>
            <textarea></textarea>

            <label>Anno di rilascio</label>
            <input type="date" id="" name="">

            <label>Direttore</label>
            <input type="Text" placeholder="ES. Oceania">

            <label>Genere</label>
            <select name="generi" id="generi">
                <option value="Azione">Azione</option>
                <option value="Commedia">Commedia</option>
                <option value="Romantico">Romantico</option>
            </select>

            <label>Durata</label>
            <input type="number" id="quantity" name="quantity" min="0" max="500" step="10" value="120">

            <label>Produzione</label>
            <input type="Text" placeholder="ES. Oceania">

            <label>Distribuzione</label>
            <input type="Text" placeholder="ES. Oceania">

            <label>Paese</label>
            <input type="Text" placeholder="ES. Oceania">

            <label>Incassi</label>
            <input type="number" id="quantity" name="quantity" min="0" max="500" step="10" value="120">

            <label>Costi di produzione</label>
            <input type="number" id="quantity" name="quantity" min="0" max="500" step="10" value="120">
        </form>
    </div>

</body>

</html>