<?php
require "./config/Database.php";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
$sql = "DELETE FROM cms_posts WHERE id = $id";
$qr = $conn->exec($sql);
header("location: index.php");
?>