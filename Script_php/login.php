<?php

function campi_vuoti()
{
    return empty($_POST["email"]) || empty($_POST["pass"]);
}

function queryUserData($user_email, $conn)
{
    $query = "SELECT * FROM utenti WHERE Email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $user_email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        return $row = $result->fetch_assoc();
    } else {
        echo "Email non presente nel database";
        return $row = false;
    }
}


function controllo_credenziali()
{
    include "../Common_elements/databaseConnection.php";

    session_start();


    if (campi_vuoti()) {
        echo "mancano dei parametri";
        exit();
    }

    $email = $conn->real_escape_string(htmlspecialchars(trim(($_POST['email']))));
    $pass = $conn->real_escape_string(htmlspecialchars(trim(($_POST['pass']))));

    //Se non si passano i controlli dei coockie si controllano le credenziali all'interno del form
    $row = queryUserData($email, $conn);
    if (!$row) {
        header("Location: ../Login/account_not_found.php");
    } else {
        if (!password_verify($pass, $row["password"])) {
            header("Location: ../Login/password_sbagliata.php");
            exit();
        } else {
            $_SESSION["email"] = $row["email"];
            $_SESSION["firstname"] = $row["nome"];
            $_SESSION["lastname"] = $row["cognome"];
            $_SESSION["cell"] = $row["numero_telefono"];
            $_SESSION["photo"] = $row["photo"];
            header("Location: ../logo/logo.html");
        }
    }
}

controllo_credenziali();
?>