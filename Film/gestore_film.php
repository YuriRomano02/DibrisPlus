<?php
session_start();

include "../Common_elements/databaseConnection.php";


function controlla_database($query_select, $conn)
{
    $stmt = $conn->prepare($query_select);
    $stmt->bind_param("ss", $_SESSION["email"], $_SESSION["titolo"]);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result->num_rows > 0;
}

function aggiungi($query_insert, $conn)
{


    $stmt = $conn->prepare($query_insert);
    $stmt->bind_param("ss", $_SESSION["email"], $_SESSION["titolo"]);
    $stmt->execute();

    return $stmt->get_result();
}

function togli($query, $conn)
{

    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $_SESSION["email"], $_SESSION["titolo"]);
    $stmt->execute();

    return $stmt->get_result();
}

function ritorna_valore_fetch($query_select, $query_insert, $query_remove, $conn)
{
    if (controlla_database($query_select, $conn)) {
        if (togli($query_remove, $conn))
            echo "tolto";
    } else if (aggiungi($query_insert, $conn))
        echo "false";
    else
        echo "aggiunto";
    exit();
}

if (isset($_POST["preferiti"])) {
    $query_select = "SELECT * FROM film_preferiti WHERE email=? AND film=?";
    $query_insert = "INSERT INTO film_preferiti (Email, film) VALUES(?,?)";
    $query_remove = "DELETE FROM film_preferiti WHERE email=? AND film=?";
    ritorna_valore_fetch($query_select, $query_insert, $query_remove, $conn);
} else if (isset($_POST["guardaDopo"])) {
    $query_select = "SELECT * FROM film_da_guardare WHERE email=? AND film=?";
    $query_insert = "INSERT INTO film_da_guardare (Email, film) VALUES(?,?)";
    $query_remove = "DELETE FROM film_da_guardare WHERE email=? AND film=?";
    ritorna_valore_fetch($query_select, $query_insert, $query_remove, $conn);
} else if (isset($_POST["visto"])) {
    $query_select = "SELECT * FROM film_visti WHERE email=? AND film=?";
    $query_insert = "INSERT INTO film_visti (Email, film) VALUES(?,?)";
    $query_remove = "DELETE FROM film_visti WHERE email=? AND film=?";
    ritorna_valore_fetch($query_select, $query_insert, $query_remove, $conn);
}

$conn->close();
?>