<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="modify.css">
    <link href="https://fonts.cdnfonts.com/css/new-walt-disney-font" rel="stylesheet">
    <link rel="stylesheet" href="../Common_elements/background.css">
    <link rel="stylesheet" href="../Common_elements/sidebar.css">
</head>

<body>
    <?php
    include "../Common_elements/controllo_accesso.php";
    include "../Common_elements/background.html";
    include "../Common_elements/sidebar.php";
    ?>
    <div class="contenitore">
        <form action="../Script_php/update_profile.php" method="post" enctype="multipart/form-data">

            <h1>Modifica dati</h1>
            <div class="form_container">
                <div class="photo">
                    <label for="foto">Foto</label>
                    <input type="file" placeholder="enter photo" id="foto" name="foto" accept="image/*"
                        onchange="PreviewImage();">
                        <?php
                if (empty($_SESSION["photo"])) {
                    echo "<img id='uploadPreview' src='../Media/Immagini/profile.jpeg'>";
                } else {
                    echo "<img id='uploadPreview' src='data:image/jpeg;base64," . base64_encode($_SESSION['photo']) . "'>";
                }

                ?>
                    <label for="foto" id="pulsante">Inserisci immagine</label>
                </div>
                <div class="dati">
                    <label for="firstname">Nome</label>
                    <input type="text" placeholder="enter name" id="firstname" name="firstname" maxlength="50" 
                        value="<?php echo $_SESSION["firstname"]; ?>">
                    <label for="lastname">Cognome</label>
                    <input type="text" placeholder="enter surname" id="Cognome" name="lastname" maxlength="50" 
                        value="<?php echo $_SESSION["lastname"]; ?>">
                    <label for="cell">telefono</label>
                    <input type="cell" placeholder="enter cell" id="cell" name="cell"  maxlength="10" minlength="10"
                        value="<?php echo $_SESSION["cell"]; ?>">
                    <button type="submit" name="submit" class="registerbtn">Invia</button>
                </div>
            </div>
        </form>
    </div>

    <script type="text/javascript">
        function PreviewImage() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("foto").files[0]);

            oFReader.onload = function (oFREvent) {
                document.getElementById("uploadPreview").src = oFREvent.target.result;
            };
        };
    </script>

    <script src="https://kit.fontawesome.com/549ec4da67.js" crossorigin="anonymous"></script>

</body>

</html>