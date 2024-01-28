<?php
session_start();
include "../Common_elements/databaseConnection.php";

$query = "SELECT * FROM voti WHERE email = ? AND film = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $_SESSION["email"], $_SESSION["titolo"]);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows == 0) {
    $query = "INSERT INTO voti (Email, Voto, Film) VALUES (?,?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $_SESSION["email"], $_POST["voto"], $_SESSION["titolo"]);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result)
        echo "inserito";
    else
        echo "errore";
} else {
    $query = "UPDATE voti SET voto = ? WHERE email = ? AND film = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $_POST["voto"], $_SESSION["email"], $_SESSION["titolo"]);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result)
        echo "cambiato";
}
exit();

?>