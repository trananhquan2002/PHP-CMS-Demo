<?php
session_start();
require "./config/Database.php";
if (isset($_POST["login"])) {
	$us = $_POST["username"];
	$ps = md5($_POST["password"]);
}
if(isset($_SESSION['username'], $_SESSION['password'])) {
	header('Location: index.php');
}
if ($us != "" && $ps != "") {
	$sql = "SELECT * FROM cms_user WHERE username = '$us' AND `password` = '$ps'";
	$qr = $conn->query($sql);
	if ($qr->fetchAll() > 0) {
		$_SESSION['username'] = $us;
		$_SESSION['password'] = $ps;
		header("Location: index.php");
	} else {
		echo "Sai tài khoản hoặc mật khẩu";
		require "login.php";
	}
}