<?php

session_start();

include "../Common_elements/databaseConnection.php";

function ottieni_dati_utente($conn)
{
    $query = "SELECT * FROM utenti WHERE Email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $_SESSION["user"]);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    }

    return false;
}

function invio_dati()
{
    include "../Common_elements/databaseConnection.php";

    $firstname = $conn->real_escape_string(htmlspecialchars(trim(($_POST['firstname']))));
    $lastname = $conn->real_escape_string(htmlspecialchars(trim(($_POST['lastname']))));
    $cell = $conn->real_escape_string(htmlspecialchars(trim(($_POST['cell']))));
    $foto = $conn->real_escape_string(htmlspecialchars(trim(($_FILES["foto"]["tmp_name"]))));
    $row = ottieni_dati_utente($conn);
    if (!$row) {
        echo "Errore";
        exit();
    }
    if (!$_POST["firstname"]) {
        $firstname = $row["nome"];
    }
    if (!$_POST["lastname"]) {
        $lastname = $row["cognome"];
    }
    if (!$_POST["cell"]) {
        $cell = $row["numero_telefono"];
    }
    if (!$_FILES["foto"]["tmp_name"]) {
        $foto = $row["photo"];
    }
    $query = "UPDATE utenti SET nome=?, cognome=?, numero_telefono=?, photo=? WHERE Email=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssss", $firstname, $lastname, $Cell, $foto, $_SESSION["user"]);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
        echo "inserimento non avvenuto";
    } else {
        echo "inserimento avvenuto";
    }
    $conn->close();
}

invio_dati();
header("Location: ../Script_php/show_profile.php");

?>