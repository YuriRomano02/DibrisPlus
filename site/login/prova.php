<?php

//il "main" del codice è in fondo alla pagina

function campi_vuoti()
{
    empty($_POST["email"]) || empty($_POST["pass"]);
}

function controllo_password($passDataBase, $formPass)
{
    return password_verify($passDataBase, $formPass);
}


function controllo_coockie($result, $conn)
{
    if (isset($_COOKIE["email"])) {
        $email = $_COOKIE["email"];

        if ($result) {
            $_SESSION['user'] = $result["Email"];
            header("Location: ../Sezioni/Home/home.php");
            exit();
        }
    }
}

function cockie_remember_me($email, $password)
{
    if (isset($_POST['remember'])) {
        $Cookie_email = "email";
        $Cookie_password = "password";
        setcookie($Cookie_email, $email, time() + (86400 * 30), "/");
        setcookie($Cookie_password, $password, time() + (86400 * 30), "/");
        return true;
    } else {
        setcookie("username", "");
        setcookie("password", "");
        return false;
    }
}

session_start();

include "../Elementi in comune/databaseConnection.php";

$email = $conn->real_escape_string(htmlspecialchars(trim(($_POST['email']))));
$pass = $conn->real_escape_string(htmlspecialchars(trim(($_POST['pass']))));

if (campi_vuoti()) {
    echo "mancano dei parametri";
    exit();
}

$query = "SELECT Email Password FROM Utenti WHERE Email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    
    $row= $result->fetch_assoc();
    controllo_coockie($row, $conn);
    if (!controllo_password($row["Password"], $pass)) {
        echo "valori non corretti";
    }
    cockie_remember_me($email, $pass);
}

$conn->close();
?>