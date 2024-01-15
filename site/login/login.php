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

//si controlla se la mail contenuta nei coockie è presente nel database
function controllo_coockie()
{
    include "../Elementi in comune/databaseConnection.php";
    if (isset($_COOKIE["email"]) && isset($_COOKIE["password"])) {
        $row = query_email($_COOKIE["email"], $conn);
        if ($row) {
            if (password_verify($_COOKIE["password"], $row["Password"])) {
                $_SESSION["user"] = $row["Email"];
                header("Location: ../Sezioni/Home/home.php");
                exit();
            }
        }
    }
}


function controllo_credenziali()
{
    include "../Elementi in comune/databaseConnection.php";

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
        echo "Email non presente nel database";
    } else {
        if (!password_verify($pass, $row["Password"])) {
            echo "la password è sbagliata";
            exit();
        } else {
            $_SESSION["user"] = $email;
            $_SESSION["discard_after"] = time();
            if (isset($_POST["remember"])) {
                setcookie("email", $email, time() + (24 * 60), "/");
                setcookie("password", $pass, time() + (24 * 60), "/");
            }
            header("Location: ../Sezioni/Home/home.php");
        }
    }
}

controllo_credenziali();
?>