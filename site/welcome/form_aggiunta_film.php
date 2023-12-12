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
        <form action="./aggiunta_film.php" method="post" enctype="multipart/form-data">
            <div>
                <label>Titolo</label>
                <input type="Text" id="titolo" name="titolo" placeholder="ES. Oceania">

                <label>Locandina</label>
                <input type="file" id="locandina" name="locandina" accept="image/*">

                <label>Anno di rilascio</label>
                <input type="date" id="data_di_rilascio" name="data_di_rilascio">

                <label>Regista</label>
                <input type="Text" id="regista" name="regista" placeholder="ES. Oceania">

                <label>Genere</label>
                <select id="generi"name="generi">
                    <option value="Azione">Azione</option>
                    <option value="Commedia">Commedia</option>
                    <option value="Romantico">Romantico</option>
                </select>

                <label>Durata</label>
                <input type="number" id="durata" name="durata" min="0" max="500" step="10" value="120">

                <label>Produzione</label>
                <input type="Text" id="produzione" name="produzione" placeholder="ES. Oceania">

                <label>Distribuzione</label>
                <input type="Text" id="distribuzione" name="distribuzione" placeholder="ES. Oceania">

                <label>Paese</label>
                <input type="Text" id="paese" name="paese" placeholder="ES. Oceania">

                <label>Incassi</label>
                <input type="number" id="incassi" name="incassi" min="0" max="500" step="10" value="120">

                <label>Costi di produzione</label>
                <input type="number" id="costi_di_produzione" name="costi_di_produzione" min="0" max="500" step="10" value="120">
            </div>

            <label>Descrizione</label><br>
            <textarea id="descrizione" name="descrizione"></textarea>

            <input type="submit">

        </form>
    </div>

</body>

</html>