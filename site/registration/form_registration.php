<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <form action="registration.php" method="post">
            <h1>Sign-up</h1>
            <label for="Nome">Nome</label><br>
            <input type="text" placeholder="enter name" id="Nome" name="Nome" required><br>
            <label for="Cognome">Cognome</label><br>
            <input type="text" placeholder="enter surname" id="Cognome" name="Cognome" required><br>
            <label for="email">Email</label><br>
            <input type="email" placeholder="enter mail" id="email" name="Email" required><br>
            <label for="password">Password</label><br>
            <input type="password" placeholder="enter password" id="password" maxlength="24" minlength="6"
                name="password" required><br>
            <label for="rp_password">Repeat password</label><br>
            <input type="password" placeholder="repeat password" id="rp_password" maxlength="24" minlength="6"
                name="rp_password" required><br>
            <button type="submit" name="submit" class="registerbtn">SUBMIT</button>
            <p><a href="../login/login.php">Hai già un account?</a></p>
        </form>
    </div>
</body>

</html>