<?php

include "../Common_elementstabaseConnection.php";

// real_escape_string() serve per evitare l'SQL injection,ovvero l'attacco che consiste nell'inserire codice SQL all'interno di un form
$firstname = $conn->real_escape_string(htmlspecialchars(trim(($_POST['firstname']))));
$lastname = $conn->real_escape_string(htmlspecialchars(trim(($_POST['lastname']))));
$email = $conn->real_escape_string(htmlspecialchars(trim(($_POST['email']))));
$pass = $conn->real_escape_string(htmlspecialchars(trim(($_POST['pass']))));
$confirm = $conn->real_escape_string(htmlspecialchars(trim(($_POST['confirm']))));


function campi_vuoti()
{
    return empty($_POST["firstname"]) || empty($_POST["lastname"]) || empty($_POST["email"]) || empty($_POST["pass"]) || empty($_POST["confirm"]);
}

function controllo_password($pass, $confirm)
{
    return $pass == $confirm;
}

function controllo_email($email, $conn)
{
    $query = "SELECT Email FROM Utenti WHERE Email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return false;
    }

    return true;
}

function inserimento_dati($firstname, $lastname, $email, $pass, $conn)
{
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    $query = "INSERT INTO utenti (nome, cognome, email, password) VALUES (?,?,?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss", $firstname, $lastname, $email, $hash);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($stmt->affected_rows > 0) {
        echo ("<br>Inserimento avvenuto correttamente");
    } else {
        echo ("<br>Inserimento non eseguito");
        error_log("You messed up!", 3, "./my-errors.log");
        return false;
    }
    $conn->close();

    return true;
}
if (campi_vuoti()) {
    echo "mancano dei parametri";
} else if (!controllo_password($pass, $confirm)) {
    echo "errore nella password";
} else if (!controllo_email($email, $conn)) {
    echo "<div style='width:40%;float:left'><h3>Email gia registrata nel nostro sito</h3><br><p>cliccare il riferimento qui accanto per accedere</p><br><a href='../login/login.php'>Login</a></div>";
    echo "<div style='margin-left=40%'><img src='../immagini e gif/gif/welcome.gif' alt='' width='780' height='auto'></div>";
} else if (!inserimento_dati($firstname, $lastname, $email, $pass, $conn)) {
    echo "<br>errore nei dati";
}
header("Location:./registration_success.php")
?>