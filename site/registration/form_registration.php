<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrazione</title>
    <link rel="stylesheet" href="../Elementi in comune/sfondo.css">
    <link rel="stylesheet" href="./registration.css">
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
        <form id="form" action="registration.php" method="post">
            <h1>Sign-up</h1>

            <label for="firstname">Nome</label>
            <input type="text" name="firstname" id="firstname" placeholder="inserisci il tuo nome">
            <label for="lastname">Cognome</label>
            <input type="text" name="lastname" id="lastname" placeholder="inserisci il tuo cognome">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="inserisci la tua email">
            <p id="emailEsistente"></p>
            <label for="pass">Password</label>
            <input type="password" name="pass" id="pass" placeholder="inserisci la password" maxlength="24" minlength="6">
            <label for="confirm">Ripeti password</label>
            <input type="password" name="confirm" id="confirm" placeholder="ripeti la password" maxlength="24" minlength="6">
            <input type="submit" name="submit" id="submit_button" value="Invia">

            <p><a href="../login/form_login.php">Hai già un account?</a></p>
        </form>
    </div>
    <script src="./registration.js"></script>
</body>

</html>