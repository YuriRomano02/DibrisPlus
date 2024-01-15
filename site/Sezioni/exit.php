<?php
session_start();
session_unset();
session_destroy();

if (isset($_COOKIE["email"]) and isset($_COOKIE["password"])) {
    setcookie("email", '', time() - (24 * 60));
    setcookie("password", '', time() - (24 * 60));
}


header('Location:../login/form_login.php');
?>