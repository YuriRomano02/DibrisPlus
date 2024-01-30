<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Amministrazione</title>

    <link rel="stylesheet" href="../Common_elements/background.css">
    <link rel="stylesheet" href="../Common_elements/sidebar.css">
    <link rel="stylesheet" href="./amministration.css">
    <link href="https://fonts.cdnfonts.com/css/new-walt-disney-font" rel="stylesheet">
    <script src="https://kit.fontawesome.com/549ec4da67.js" crossorigin="anonymous"></script>

</head>

<body>
    <?php
    include "../Common_elements/controllo_accesso.php";
    include "../Common_elements/background.html";
    include "../Common_elements/sidebar.php";
    include "../Common_elements/controlla_permessi.php";
    ?>

    <div class="contenitore">
        <h1>Area amministrativa</h1>


        <div class="link_container">
            <a href="./form_aggiunta_film.php">
                <div>
                    <h1>Aggiungi film</h1>
                    <i class="fa-solid fa-plus"></i>
                    <p>aggiungi film al catalogo</p>
                </div>
            </a>

            <a href="./allusers.php">
                <div>
                    <h1>Gestione utenti</h1>
                    <i class="fa-solid fa-users"></i>
                    <p>Visualizza e gestisci tutti gli utenti nel database</p>
                </div>
            </a>

            <a href="./gestione_film.php">
                <div>
                    <h1>Gestione film</h1>
                    <i class="fa-solid fa-film"></i>
                    <p>Visualizza e gestisci tutti i film nel database</p>
                </div>
            </a>
        </div>
    </div>
</body>

</html>