<?php
$servername = "localhost";
$username = "yuri";
$password = "romanus99";
$dbname = "unige";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_COOKIE["email"])) {
    $email = $_COOKIE["email"];
    $result = $conn->query("SELECT * FROM utenti WHERE email = '$email'");
    if ($result->num_rows > 0) {
        session_start();
        $_SESSION['user'] = $result->fetch_assoc();
        header("Location: ../Sezioni/Home/home.php");
        exit;
    }
}

if (isset($_POST['Email']) && isset($_POST['password'])) {
    $email = $_POST['Email'];
    $password = $_POST['password'];
    $result = $conn->query("SELECT * FROM utenti WHERE email = '$email'");

    if (isset($_POST['remember'])) {
        $Cookie_email = "email";
        $Cookie_password = "password";
        setcookie($Cookie_email, $email, time() + (86400 * 30), "/");
        setcookie($Cookie_password, $password, time() + (86400 * 30), "/");
    } else {
        setcookie("username", "");
        setcookie("password", "");
    }

    if ($result->num_rows > 0) {
        session_start();
        $row = $result->fetch_assoc();
        $_SESSION['email'] = $email;
        if (!password_verify($password, $row['password'])) {
            echo "<script>alert('Password is incorrect.');window.location.href='login.php';</script>";
            exit();
        } else {
            header("Location: ../Sezioni/Home/home.php");
            exit();
        }
    }


}

$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-in</title>
    <link rel="stylesheet" href="../Elementi in comune/sfondo.css">
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

        <h1>Log-in</h1><br>

        <label for="email">Email</label><br>
        <input type="email" placeholder="enter mail" name="Email" value="<?php if (isset($_COOKIE['email'])) {
            echo $_COOKIE['email'];
        } ?>" required><br>

        <label for="password">Password</label><br>
        <input type="password" placeholder="enter password" maxlength="24" minlength="6" name="password" value="<?php if (isset($_COOKIE['password'])) {
            echo $_COOKIE['password'];
        } ?>" required><br>

        <label for="remember">Ricordami</label>
        <input type="checkbox" name="remember"><br>

        <button type="submit" name="submit" class="registerbtn">Conferma</button>

        <p><a href="../login/change_p.php">Hai dimenticato la password?</a></p>
        <p><a href="../registration/registration.html">Account non ancora registrato?</a></p>
    </form>
</body>

</html>