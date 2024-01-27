<?php
include "../Common_elements/databaseConnection.php";

$query = "SELECT * FROM film_preferiti WHERE email=? AND film=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $_SESSION["email"], $_SESSION["titolo"]);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "true";
}
else{
    echo "false";
}

exit();
?>