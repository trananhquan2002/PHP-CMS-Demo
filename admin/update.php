<?php
session_start();
include_once('../config/Database.php');
if (isset($_POST['title'], $_POST['message'], $_POST['category_id'], $_POST['userid'], $_POST['status'], $_POST['created'], $_POST['updated'])) {
	$title = $_POST['title'];
	$message = $_POST['message'];
	$category_id = $_POST['category_id'];
	$userid = $_POST['userid'];
	$status = $_POST['status'];
	$created = $_POST['created'];
	$updated = $_POST['updated'];
	if (empty($title) or empty($message) or empty($category_id) or empty($userid) or empty($status) or empty($created) or empty($updated)) {
		$error = 'All fields are required';
	} else {
		$query = $pdo->prepare('INSERT INTO cms_posts(title, `message`, category_id, userid, `status`, created, updated) VALUES(?, ?, ?, ?, ?, ?, ?)');
		$query->bindValue(1, $title);
		$query->bindValue(2, $message);
		$query->bindValue(3, $category_id);
		$query->bindValue(4, $userid);
		$query->bindValue(5, $status);
		$query->bindValue(6, $created);
		$query->bindValue(7, $updated);
		$query->execute();
		header('Location: ../index.php');
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add new Article</title>
	<link rel="stylesheet" href="../style.css">
</head>
<body>
	<h1>Add new Article</h1>
	<?php if (isset($error)) { ?>
		<small style="color: #aa0000;"><?php echo $error ?></small>
	<?php } ?>
	<form action="add.php" method="post" autocomplete="off">
		<div class="form-group">
			<label for="title">Title</label>
			<input id="title" type="text" name="title" placeholder="title">
		</div>
		<div class="form-group">
			<label for="message">Message</label>
			<textarea name="message" id="message" cols="50" rows="15" placeholder="message"></textarea>
		</div>
		<div class="form-group">
			<label for="category_id">Category_id</label>
			<input id="category_id" type="text" name="category_id" placeholder="category_id">
		</div>
		<div class="form-group">
			<label for="userid">Userid</label>
			<input id="userid" type="text" name="userid" placeholder="userid">
		</div>
		<div class="form-group">
			<label for="status">Status</label>
			<input id="status" type="text" name="status" placeholder="status">
		</div>
		<div class="form-group">
			<label for="created">Created</label>
			<input id="created" type="text" name="created" placeholder="created">
		</div>
		<div class="form-group">
			<label for="updated">Updated</label>
			<input id="updated" type="text" name="updated" placeholder="updated">
		</div>
		<div class="form-group">
			<input type="submit" value="Thêm mới">
		</div>
	</form>
</body>
</html>