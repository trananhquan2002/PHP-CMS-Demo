<?php
require "./config/Database.php";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
if (isset($_SESSION['username'], $_SESSION['password'])) {
    $sql = "DELETE FROM cms_posts WHERE id = $id";
    $qr = $conn->exec($sql);
}
header("location: index.php");
?>