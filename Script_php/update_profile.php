<?php

if (isset($_POST["submit"])) {
    if (isset($_FILES["foto"]["tmp_name"])) {
        $b = getimagesize($_FILES["foto"]["tmp_name"]);
        $email = $_SESSION['email'];
        if ($b !== false) {
            //Get the contents of the image
            $file = $_FILES['foto']['tmp_name'];
            $image = addslashes(file_get_contents($file));
            $nome = $_POST['Nome'];
            $cognome = $_POST['Cognome'];
            $cell = $_POST['cell'];


            $host = 'localhost';
            $username = 'yuri';
            $password = 'romanus99';
            $db = 'unige';

            $db = new mysqli($host, $username, $password, $db);

            // Check if the connection was successful
            if ($db->connect_error) {
                die("Connection failed: " . $db->connect_error);
            }

            $query = "UPDATE utenti SET photo = '$image', nome = '$nome', cognome = '$cognome', numero_telefono = '$cell' WHERE email = '$email'";

            $result = $db->query($query);

            if ($result === true) {
                echo "Photo updated successfully";
                header("Location: ./show_profile.php");
            } else {
                echo "Error updating photo: " . $db->error;
            }

            $db->close();
        }
    }
}
?>