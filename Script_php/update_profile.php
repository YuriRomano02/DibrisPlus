<?php
include "../Common_elements/controllo_accesso.php";
include "../Common_elements/databaseConnection.php";

$firstname = $conn->real_escape_string(htmlspecialchars(trim(($_POST['firstname']))));
$lastname = $conn->real_escape_string(htmlspecialchars(trim(($_POST['lastname']))));
if (empty($_POST['cell'])) {
    $cell = 0;
} else {
    $cell = $conn->real_escape_string(htmlspecialchars(trim(($_POST['cell']))));
}

if (!empty($_FILES["foto"]["tmp_name"])) {
    $foto = file_get_contents($_FILES["foto"]["tmp_name"]);
} else {
    $foto = $_SESSION['photo'];
}

$query = "UPDATE utenti SET nome=?, cognome=?, numero_telefono=?, photo=? WHERE email=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("sssss", $firstname, $lastname, $cell, $foto, $_SESSION["email"]);
$stmt->execute();
$result = $stmt->get_result();

header("Location: ../Script_php/show_profile.php");
?>