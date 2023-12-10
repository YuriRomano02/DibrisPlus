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

    // Check if the new passwords match
    if ($new_p === $new_p2) {
        // Hash the new password
        $hashed_password = password_hash($new_p, PASSWORD_DEFAULT);

        // Update the password in the database
        $conn = new mysqli($servername, $username, $password, $dbname);
        $query = "UPDATE utenti SET password = '$hashed_password' WHERE email = '$email'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "Password updated successfully.";
            header("Location: ../login/login.php");
        } else {
            echo "Error updating password: " . mysqli_error($conn);
        }

        // Close the database connection
        mysqli_close($conn);
    } else {
        echo "New passwords do not match.";
    }
}
?>