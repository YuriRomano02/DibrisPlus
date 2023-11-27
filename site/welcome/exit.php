<?php
if (isset($_COOKIE['email'])) {
    setcookie('email', '', time() - (86400 * 30), '/');
}

if (isset($_COOKIE['password'])) {
    setcookie('password', '', time() - (86400 * 30), '/');
}

header('Location: ../login/login.php');
exit;
?>