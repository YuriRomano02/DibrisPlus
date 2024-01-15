<?php
session_start();
if(empty($_SESSION["user"])){
    header("Location: ../Login/form_login.php");
}else{
    $now = time();
    if (isset($_SESSION['discard_after']) && $now > $_SESSION['discard_after']) {
        session_unset();
        session_destroy();
        session_start();
    }
    $_SESSION['discard_after'] = $now + 540;
}
?>