<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="change_p.css">
</head>
<body>
    <h1>Change here your password</h1><br>
    <form action="change_p.php" method="post">
        <label for="email">Email</label><br>
        <input type="email" name="email" id="email" placeholder="Email"><br>
        <label for="new_p">New Password</label><br>
        <input type="password" name="new_p" id="new_p" placeholder="New Password"><br>
        <label for="new_p2">Repeat new password</label><br>
        <input type="password" name="new_p2" id="new_p2" placeholder="Repeat New Password"><br>
        <input type="submit" value="Change"><br>
</body>
</html>

<?php

$servername = "localhost";
$username = "yuri";
$password = "romanus99";
$dbname = "unige";

if (isset($_POST['email']) && isset($_POST['new_p']) && isset($_POST['new_p2'])) {
    $email = $_POST['email'];
    $new_p = $_POST['new_p'];
    $new_p2 = $_POST['new_p2'];

    if ($new_p == $new_p2) {
        $conn = mysqli_connect("$servername", "$username", "$password", "$dbname");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $query = "UPDATE utenti SET password = '$new_p' WHERE email = '$email'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "Password changed successfully";
        } else {
            echo "Error executing the query";
        }
    } else {
        echo "Passwords don't match";
    }
}

?>