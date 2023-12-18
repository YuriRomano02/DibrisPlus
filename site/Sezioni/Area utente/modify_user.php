<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="modify.css">
</head>
<body>
<form action="modify_user.php" method="post" enctype="multipart/form-data">
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
if(isset($_POST["submit"])){
    if(isset($_FILES["foto"]["tmp_name"]) && !empty($_FILES["foto"]["tmp_name"])) {
        $b = getimagesize($_FILES["foto"]["tmp_name"]);
        $email=$_SESSION['email'];
        //Check if the user has selected an image
        if($b !== false){
            //Get the contents of the image
            $file = $_FILES['foto']['tmp_name'];
            $image = addslashes(file_get_contents($file));
            $nome = $_POST['Nome'];
            $cognome = $_POST['Cognome'];
            $cell = $_POST['cell'];


            $host     = 'localhost';
            $username = 'yuri';
            $password = 'romanus99';
            $db     = 'unige';

            //Create the connection and select the database
            $db = new mysqli($host, $username, $password, $db);

            // Check if the connection was successful
            if ($db->connect_error) {
                die("Connection failed: " . $db->connect_error);
            }

            // Update the "photo" variable in the database
            $query = "UPDATE utenti SET photo = '$image', nome = '$nome', cognome = '$cognome', numero_telefono = '$cell' WHERE email = '$email'";

            $result = $db->query($query);

            if ($result === true) {
                echo "Photo updated successfully";
                header("Location: user.php");
            } else {
                echo "Error updating photo: " . $db->error;
            }

            // Close the database connection
            $db->close();
        }
    }
}
?>