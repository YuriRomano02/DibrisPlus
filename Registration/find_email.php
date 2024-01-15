<?php
include "../Common_elements/databaseConnection.php";

$query = "SELECT Email FROM Utenti WHERE Email = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param("s", $_POST["email"]);
$stmt->execute();
$result = $stmt->get_result();
$rows = [];
while ($row = $result->fetch_assoc()) {
    array_push($rows, $row);
}

echo json_encode($rows);

?>