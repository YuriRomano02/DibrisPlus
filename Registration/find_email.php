<?php
include "../Common_elements/databaseConnection.php";

$query = "SELECT Email FROM utenti WHERE Email = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param("s", $_POST["email"]);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows > 0){
    echo "true";
}
else{
    echo "false";
}
exit();

?>