<?php

session_start();

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