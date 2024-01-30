<?php

include "../Common_elements/databaseConnection.php";

if(isset($_POST['delete_film']))
{
    $film_stored = mysqli_real_escape_string($conn, $_POST['delete_film']);

    $query = "DELETE FROM film WHERE Titolo='$film_stored' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header("Location: gestione_film.php");
        exit(0);
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
        header("Location: gestione_film.php");
        exit(0);
    }
}

?>