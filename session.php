<?php 

session_start();

if (!isset($_SESSION['authenticate'])) {
    header('Location: /');
}

?>