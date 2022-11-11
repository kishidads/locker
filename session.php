<?php 

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

//session_regenerate_id();

if (!isset($_SESSION['authenticate'])) {
    header('Location: /');
    die();
}

?>