<?php
include "../Elementi in comune/databaseConnection.php";

$query = "SELECT Email FROM Utenti WHERE Email = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param("s", $_POST["email"]);
$stmt->execute();
$result = $stmt->get_result();
$prova = [];
while ($row = $result->fetch_assoc()) {
    array_push($prova, $row);
}

echo json_encode($prova);


?>