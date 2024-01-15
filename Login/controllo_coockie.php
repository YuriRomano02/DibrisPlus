<?php
function query_email($user_email, $conn)
{
    $query = "SELECT Email, Password FROM Utenti WHERE Email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $user_email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        return $row = $result->fetch_assoc();
    } else {
        echo "Email non presente nel database";
        return $row = false;
    }
}

//si controlla se la mail contenuta nei coockie è presente nel database
function controllo_coockie()
{
    include "../Common_elements/databaseConnection.php";
    if (isset($_COOKIE["email"]) && isset($_COOKIE["password"])) {
        $row = query_email($_COOKIE["email"], $conn);
        if ($row) {
            if (password_verify($_COOKIE["password"], $row["Password"])) {
                $_SESSION["user"] = $row["Email"];
                header("Location: ../Sezioni/Home/home.php");
                exit();
            }
        }
    }
}

controllo_coockie();
?>