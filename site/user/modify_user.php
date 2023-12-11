<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="modify.css">
</head>
<body>
<form action="" method="post">
        <h1>Edit Profile</h1>
        <label for="Nome">Nome</label><br>
        <input type="text" placeholder="enter name" id="Nome" name="Nome" required><br>
        <label for="Cognome">Cognome</label><br>
        <input type="text" placeholder="enter surname" id="Cognome" name="Cognome" required><br>
        <label for="cell">telefono</label><br>
        <input type="cell" placeholder="enter cell" id="cell" name="cell" required><br>
        <label for="foto">Foto</label><br>
        <input type="file" placeholder="enter photo" id="foto" name="foto" required><br>
        <button type="submit" name="submit" class="registerbtn">SUBMIT</button>
    </form>
</body>
</html>
<?php
session_start();
$servername = "localhost";
$username = "yuri";
$password = "romanus99";
$dbname = "unige";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if (isset($_POST['submit'])) {
    $nome = isset($_POST['Nome']) ? $_POST['Nome'] : '';
    $cognome = isset($_POST['Cognome']) ? $_POST['Cognome'] : '';
    $cell = isset($_POST['cell']) ? $_POST['cell'] : '';
    $foto = isset($_POST['foto']) ? $_POST['foto'] : '';

    // Get the email from the session or pass it through the form
    $email = isset($_SESSION['email']) ? $_SESSION['email'] : '';

    // Construct the update query
    $sql = "UPDATE utenti SET nome='$nome', cognome='$cognome', numero_telefono='$cell', photo='$foto' WHERE email='$email'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("Location: user.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }

}

// Close the database connection
$conn->close();
?>