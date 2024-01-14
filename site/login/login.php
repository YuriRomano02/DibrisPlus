<?php

function campi_vuoti()
{
    return empty($_POST["email"]) || empty($_POST["pass"]);
}


session_start();


if (campi_vuoti()) {
    echo "mancano dei parametri";
    exit();
}

include "../Elementi in comune/databaseConnection.php";

$email = $conn->real_escape_string(htmlspecialchars(trim(($_POST['email']))));
$pass = $conn->real_escape_string(htmlspecialchars(trim(($_POST['pass']))));

$query = "SELECT Email, Password FROM Utenti WHERE Email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Email non presente nel database";
    exit();
}

if (isset($_COOKIE["email"])) {
    $email = $_COOKIE["email"];
    session_start();
    $_SESSION["user"] = $row["Email"];
    header("Location: ../Sezioni/Home/home.php");
}

if (isset($_POST["remember"])) {
    setcookie("email", $email, time() + (86400 * 30), "/");
    setcookie("password", $pass, time() + (86400 * 30), "/");
}

$_SESSION["user"] = $email;
if (!password_verify($pass, $row["Password"])) {
    echo "la password è sbagliata";
    exit();
} else {
    header("Location: ../Sezioni/Home/home.php");
}
?>