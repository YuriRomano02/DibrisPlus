<?php

session_start();

include "../Common_elements/databaseConnection.php";

function invio_dati()
{
    include "../Common_elements/databaseConnection.php";

    $firstname = $conn->real_escape_string(htmlspecialchars(trim(($_POST['firstname']))));
    $lastname = $conn->real_escape_string(htmlspecialchars(trim(($_POST['lastname']))));
    $cell = $conn->real_escape_string(htmlspecialchars(trim(($_POST['cell']))));
    $foto = file_get_contents($_FILES["foto"]["tmp_name"]);

    $query = "UPDATE utenti SET nome=?, cognome=?, numero_telefono=?, photo=? WHERE email=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssss", $firstname, $lastname, $Cell, $foto, $_SESSION["email"]);
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