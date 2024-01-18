<?php
session_start();
if(empty($_SESSION["email"])){
    session_unset();
    session_destroy();
    header("Location: ../Login/form_login.php");
}
?>