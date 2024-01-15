<?php

function campi_vuoti()
{
    return empty($_POST["email"]) || empty($_POST["pass"]);
}

function query_email($user_email, $conn)
{
    $query = "SELECT Email, Password FROM Utenti WHERE Email = ?";
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
    $row = query_email($email, $conn);
    if (!$row) {
        header("Location: ../Login/account_not_found.php");
    } else {
        if (!password_verify($pass, $row["Password"])) {
            header("Location: ../Login/password_sbagliata.php");
            exit();
        } else {
            $_SESSION["user"] = $email;
            $_SESSION["discard_after"] = time() + 540;
            header("Location: ../logo/logo.html");
        }
    }
}

controllo_credenziali();
?>