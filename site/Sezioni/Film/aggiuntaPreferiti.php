<?php
session_start();

$servername = "localhost";
$username = "yuri";
$password = "romanus99";
$dbname = "unige";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_SESSION['titolo'])) {
    $titolo = $_SESSION['titolo'];

    $sql = "INSERT INTO watched (film_visti) VALUES ('$titolo')";

    if ($conn->query($sql) === TRUE) {
        echo "aggiunto ai preferiti";   
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "No film title found in session";
}

$conn->close();
?>