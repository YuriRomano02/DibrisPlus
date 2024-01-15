<?php
session_start();

include "../../Elementi in comune/databaseConnection.php";

function aggiungi_preferiti($conn)
{
    $query = "INSERT INTO (Email, film) film_da_guardare VALUES(?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $_SESSION["user"], $_POST["film"]);
    $stmt->execute();
}

function aggiungi_guarda_dopo($conn)
{
    $query = "INSERT INTO (Email, film) film_da_guardare VALUES(?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $_SESSION["user"], $_POST["film"]);
    $stmt->execute();
}

function aggiungi_film_visti($conn)
{
    $query = "INSERT INTO (Email, film) film_da_guardare VALUES(?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $_SESSION["user"], $_POST["film"]);
    $stmt->execute();
}

if ($_POST["preferiti"]) {
    aggiungi_preferiti($conn);
}
if ($_POST["guardaDopo"]) {
    aggiungi_guarda_dopo($conn);
}
if ($_POST["visto"]) {
    aggiungi_film_visti($conn);
}

$conn->close();
?>