<?php
function controlla_permessi()
{
    include "../Common_elements/databaseConnection.php";
    $query = "SELECT Admin, Email FROM utenti WHERE Email = ? AND admin = 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $_SESSION['email']);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->num_rows > 0;
}

if (!controlla_permessi()) {
    header("Location: ../Common_elements/access_denied.php");
    exit();
}

?>