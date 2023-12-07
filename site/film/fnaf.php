<?php
// Connect to the database
$servername = "localhost";
$username = "yuri";
$password = "romanus99";
$dbname = "unige";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Search for HTML code by name
$name = "Five Nights at Freddy";
$sql = "SELECT contenuto FROM tabella_html WHERE titolo = '$name'";
$result = $conn->query($sql);

// Output the HTML code
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo $row["contenuto"];
} else {
    echo "film non ancora aggiunto";
}

// Close the database connection
$conn->close();
?>