<!DOCTYPE html>
<html lang="en">

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
    include "../Common_elements/background.html";
    include "../Common_elements/sidebar.php";
    ?>
    <div class="contenitore">
        <form action="../Script_php/update_profile.php" method="post" enctype="multipart/form-data">
            <div class="profile">
                <h1>Edit Profile</h1>
                <label for="firstname">Nome</label><br>
                <input type="text" placeholder="enter name" id="firstname" name="firstname"><br>
                <label for="lastname">Cognome</label><br>
                <input type="text" placeholder="enter surname" id="Cognome" name="lastname"><br>
                <label for="cell">telefono</label><br>
                <input type="cell" placeholder="enter cell" id="cell" name="cell"><br>
                <button type="submit" name="submit" class="registerbtn">SUBMIT</button>
            </div>
            <div class="photo">
                <label for="foto">Foto</label><br>
                <input type="file" placeholder="enter photo" id="foto" name="foto"
                    onchange="PreviewImage();"><br>
                <img id="uploadPreview" style="width: 200px; height: 200px;" />
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
            </div>
        </form>
    </div>

</body>

</html>