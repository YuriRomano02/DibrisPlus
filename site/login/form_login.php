<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-in</title>
    <link rel="stylesheet" href="../Elementi in comune/sfondo.css">
    <link rel="stylesheet" href="./form_login.css">
    <link href="https://fonts.cdnfonts.com/css/new-walt-disney-font" rel="stylesheet">
</head>

<body>
    <?php
    include "../Elementi in comune/sfondo.html";
    ?>
    <div id="contenitore">
        <div id="div_logo">
            <p>Dibris</p>
            <p id="stellina">+</p>
        </div>
        <div></div>
        <form action="./login.php" method="post">

            <h1>Log-in to your Account</h1>

            <label for="email">Email</label><br>
            <input type="email" name="email" placeholder="inserisci la tua email" value="<?php if (isset($_COOKIE['email'])) {
                echo $_COOKIE['email'];
            } ?>" required>

            <input type="password" name="pass" placeholder="inserisci la tua password" maxlength="24" minlength="6" value="<?php if (isset($_COOKIE['password'])) {
                echo $_COOKIE['password'];
            } ?>" required><br>

            <div id="remember">
                <label for="remember">Ricordami</label>
                <input type="checkbox" name="remember">
            </div>

            <input type="submit" name="submit" value="...A VOSTRA SCELTA...">

            <a href="../registration/form_registration.php">Account non ancora registrato?</a>
        </form>
    </div>

    <script src="https://kit.fontawesome.com/549ec4da67.js" crossorigin="anonymous"></script>
</body>

</html>