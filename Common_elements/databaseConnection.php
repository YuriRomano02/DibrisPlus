<?php
    $conn = new mysqli('localhost', 'S5225277', '07I2CXiBr5Nv', 'S5225277');
    if ($conn->connect_error) {
        throw new RuntimeException('mysqli connection error: ' . $con->connect_error);
    }
?>