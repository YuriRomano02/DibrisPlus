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

    <div id="div_logo">
        <p>Dibris</p>
        <p id="stellina">+</p>
    </div>
    <div></div>
    <form action="./login.php" method="post">

        <h1>Log-in to your Account</h1>
        <div class="social_button">
            <button>
                <i class="fa-brands fa-google"></i>
                Use Google
            </button>
            <button>
                <i class="fa-brands fa-github"></i>
                Use GitHub
            </button>
        </div>
        <div class="divider">
            <div class="line"></div>
            <p>Or</p>
            <div class="line"></div>
        </div>

        <label for="email">Email</label><br>
        <input type="email" placeholder="enter mail" name="Email" value="<?php if (isset($_COOKIE['email'])) {
            echo $_COOKIE['email'];
        } ?>" required><br>

        <label for="password">Password</label><br>
        <input type="password" placeholder="enter password" maxlength="24" minlength="6" name="password" value="<?php if (isset($_COOKIE['password'])) {
            echo $_COOKIE['password'];
        } ?>" required><br>

        <div id="remember">
            <label for="remember">Ricordami</label>
            <input type="checkbox" name="remember">
        </div>

        <button type="submit" name="submit" class="registerbtn ">Conferma</button>

        <a href="../login/change_p.php">Hai dimenticato la password?</a>
        <a href="../registration/registration.html">Account non ancora registrato?</a>
    </form>
    <div></div>

    <script src="https://kit.fontawesome.com/549ec4da67.js" crossorigin="anonymous"></script>
</body>

</html>