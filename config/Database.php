<?php
try {
	$pdo = new PDO('mysql:host=db;dbname=travellist', 'travellist_user', 'password');
} catch (PDOException $e) {
	exit('Database error.');
}