<?php
include "../Elementi in comune/databaseConnection.php";

$query = "SELECT Email FROM Utenti WHERE Email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $_POST["email"]);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    return false;
}

?>