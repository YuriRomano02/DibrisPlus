<?php

if (isset($_POST["submit"])) {

    $filename = $_FILES["foto"]["name"];
    $tempname = $_FILES["foto"]["tmp_name"];
    $folder = "./images/" . $filename;

    $nome = $_POST['Nome'];
    $cognome = $_POST['Cognome'];
    $cell = $_POST['cell'];


    include "../Common_elements/databaseConnection.php";

    $query = "UPDATE utenti SET photo = '$filename', nome = '$nome', cognome = '$cognome', numero_telefono = '$cell' WHERE email = '$email'";

    $result = $conn->query($query);

    if ($result === true) {
        echo "Photo updated successfully";
        header("Location: ./show_profile.php");
    } else {
        echo "Error updating photo: " . $conn->error;
    }

    $conn->close();
}
