<?php
session_start();
if (isset($_SESSION['username'], $_SESSION['password'])) {
    unset($_SESSION['username']);
    unset($_SESSION['password']);
}
header('Location: index.php');
?>