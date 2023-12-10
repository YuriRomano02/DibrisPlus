<?php
    error_reporting(0);
    mysqli_report(MYSQLI_REPORT_OFF);
    $mysqli = mysqli_connect('localhost', 'Utente', '1234', 'users');
    if (mysqli_connect_errno()) {
        throw new RuntimeException('mysqli connection error: ' . mysqli_connect_error());
    }

        /* Set the desired charset after establishing a connection */
    mysqli_set_charset($mysqli, 'utf8mb4');
    if (mysqli_errno($mysqli)) {
        throw new RuntimeException('mysqli error: ' . mysqli_error($mysqli));
    }
?>