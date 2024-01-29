<?php
session_start();
session_unset();
session_destroy();

setcookie("email", '', time() - (24 * 60));
setcookie("password", '', time() - (24 * 60));

header('Location:../Login/form_login.php');
?>