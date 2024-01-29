<?php
    $conn = new mysqli('localhost', 'yuri', 'romanus99', 'unige');
    if ($conn->connect_error) {
        throw new RuntimeException('mysqli connection error: ' . $con->connect_error);
    }
?>