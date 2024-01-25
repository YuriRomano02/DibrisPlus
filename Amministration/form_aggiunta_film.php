<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>

    <link rel="stylesheet" href="../Common_elements/background.css">
    <link rel="stylesheet" href="../Common_elements/sidebar.css">
    <link rel="stylesheet" href="./aggiunta_film copy.css">
    <link href="https://fonts.cdnfonts.com/css/new-walt-disney-font" rel="stylesheet">
    <script src="https://kit.fontawesome.com/549ec4da67.js" crossorigin="anonymous"></script>

</head>

<body>
    <?php
    include "../Common_elements/background.html";
    include "../Common_elements/sidebar.php";

    ?>

    <div class="contenitore">
        <h1>Inserisci film</h1>
        <div>
            <form action="./aggiunta_film.php" method="post" enctype="multipart/form-data">
                <div class="dati">
                    <div class="input-container">
                        <input type="Text" id="titolo" name="titolo" required="">
                        <label>Titolo</label>
                    </div>
                    <div class="input-container">
                        <input type="date" id="data_di_rilascio" name="data_di_rilascio">
                        <label>Data di rilascio</label>
                    </div>
                    <div class="input-container">
                        <input type="Text" id="regista" name="regista" required="">
                        <label>Regista</label>
                    </div>
                    <div class="input-container">
                        <input type="number" id="durata" name="durata" min="0" max="500" value="" required="">
                        <label>Durata</label>
                    </div>
                    <div class="input-container">
                        <input type="Text" id="produzione" name="produzione" required="">
                        <label>Produzione</label>
                    </div>
                    <div class="input-container">
                        <input type="Text" id="distribuzione" name="distribuzione" required="">
                        <label>Distribuzione</label>
                    </div>
                    <div class="input-container">
                        <input type="Text" id="paese" name="paese" required="">
                        <label>Paese</label>
                    </div>
                    <div class="input-container">
                        <input type="trailer" id="trailer" name="trailer" value="" required="">
                        <label>Trailer</label>
                    </div>
                    <div class="input-container">
                        <input type="number" id="incassi" name="incassi" value="" required="">
                        <label>Incassi</label>
                    </div>
                    <div class="input-container">
                        <input type="number" id="costi_di_produzione" name="costi_di_produzione" value="" required="">
                        <label>Costi di produzione</label>
                    </div>
                    <div class="input-container">
                        <input type="text" id="attori" name="Attori" required="">
                        <label>Attori</label>
                    </div>
                </div>

                <div class="locandina">
                    <label>Locandina</label>
                    <input type="file" onchange="loadFile(event)" id="locandina" name="locandina" accept="image/*">
                    <label class="immagine" for="locandina" id="button">Carica immagine</label>
                </div>

                <div class="immagine">
                    <img id="image">
                </div>

                <div class="input-container">
                    <select type="Text" id="genere" name="genere[]" value="" required="" multiple="multiple">
                        <option value="azione">Azione</option>

                        <option value="commedia">Commedia</option>

                        <option value="Romantico">Romantico</option>

                        <option value="animazione">Animazione</option>

                        <option value="horror">Horror</option>
                    </select>
                    <label>Generi</label>
                </div>

                <label>Sinossi della Trama</label><br>
                <textarea id="descrizione" name="descrizione"></textarea>

                <button type="submit" class="btn">submit</button>
            </form>
        </div>
    </div>

    <script>
        var loadFile = function (event) {
            var image = document.getElementById('image');
            image.style.height = "20vw";
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
    <script>
        var checkList = document.getElementById('Genere');
        checkList.getElementsByClassName('anchor')[0].onclick = function (evt) {
            if (checkList.classList.contains('visible'))
                checkList.classList.remove('visible');
            else
                checkList.classList.add('visible');
        }
    </script>
</body>

</html>