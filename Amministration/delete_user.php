<?php

include "../Common_elements/databaseConnection.php";

if(isset($_POST['delete_user']))
{
    $email_user = mysqli_real_escape_string($conn, $_POST['delete_user']);

    $query = "DELETE FROM utenti WHERE email='$email_user' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header("Location: allusers.php");
        exit(0);
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
        header("Location: allusers.php");
        exit(0);
    }
}

?>