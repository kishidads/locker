<?php
session_start();
unset($_SESSION['id'], $_SESSION['nome']);
header("Location: index.php");