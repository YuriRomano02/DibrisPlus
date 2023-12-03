<?php

$mysqli = mysqli_connect('localhost', 'Utente', '1234', 'users');

if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_COOKIE["email"])) {
    $email = $_COOKIE["email"];
    $result = $conn->query("SELECT * FROM utenti WHERE email = '$email'");
    if ($result->num_rows > 0) {
        session_start();
        $_SESSION['user'] = $result->fetch_assoc();
        if ($email == "lollo02@gmail.com")
            header("Location: ../welcome/welcomeroot.html");
        else {
            header("Location: ../welcome/welcomebase.html");
        }
        exit;
    }
}

if (isset($_POST['Email']) && isset($_POST['password'])) {
    $email = $_POST['Email'];
    $password = $_POST['password'];
    $result = $mysqli->query("SELECT * FROM utenti WHERE email = '$email'");

    if (isset($_POST['remember'])) {
        $Cookie_email = "email";
        $Cookie_password = "password";
        setcookie($Cookie_email, $email, time() + (86400 * 30), "/");
        setcookie($Cookie_password, $password, time() + (86400 * 30), "/");
    } else {
        setcookie("username", "");
        setcookie("password", "");
    }

    if (isset($_POST['log_out'])) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION = array();

        session_destroy();

        if (isset($_COOKIE["email"]) and isset($_COOKIE["password"])) {
            setcookie("email", '', time() - (86400 * 30), '/');
            setcookie("password", '', time() - (86400 * 30), '/');
        }

        header('Location:login.php');
        exit;
    }

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (!password_verify($password, $row['password'])) {
            echo "<script>alert('Password is incorrect.');window.location.href='login.php';</script>";
            exit();
        } else {
            $_SESSION['email'] = $email;
            if ($email == "lollo02@gmail.com") {
                header("Location: ../welcome/welcomeroot.html");
            } else {
                header("Location: ../welcome/welcomebase.html");
            }
            exit();
        }
    }


}

$mysqli->close();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.cdnfonts.com/css/new-walt-disney-font" rel="stylesheet">
</head>

<body>


    <section class="sticky">
        <div class="bubbles">
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>

        </div>
    </section>


    <div id="div_logo">
        <p>Dibris</p>
        <p id="stellina">+</p>
    </div>


    <form action="login.php" method="post">

        <h2>Log-in</h2><br>

        <label for="email">
            <h4>Email</h4>
        </label><br>
        <input type="email" placeholder="enter mail" name="Email" value="<?php if (isset($_COOKIE['email'])) {
            echo $_COOKIE['email'];
        } ?>" required><br><br>

        <label for="password">
            <h4>Password</h4>
        </label><br>
        <input type="password" placeholder="enter password" maxlength="24" minlength="6" name="password" value="<?php if (isset($_COOKIE['password'])) {
            echo $_COOKIE['password'];
        } ?>" required><br><br>

        <label for="remember">Ricordami</label>
        <input type="checkbox" name="remember">

        <p><a href="../registration/info.html">Hai dimenticato la password?</a></p>
        <p><a href="../registration/registration.html">Account non ancora registrato?</a></p>
        
        <button type="submit" name="submit" class="registerbtn">Conferma</button>
    </form>
</body>

</html>