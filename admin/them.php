<?php
require "./config/Database.php";
if (isset($_SESSION['username'], $_SESSION['password'])) {
	if (isset($_POST["them"])) {
		$Title = $_POST["title"];
		$Message = $_POST["message"];
		$Category_id = $_POST["category_id"];
		$Userid = $_POST["userid"];
		$Status = $_POST["status"];
		$Created = $_POST["created"];
		$Updated = $_POST["updated"];
		if ($Title != "" && $Message != "" && $Category_id != "" && $Userid != "" && $Status != "" && $Created != "" && $Updated != "") {
			$sql = "INSERT INTO cms_posts(title, `message`, category_id, userid, `status`, created, updated) VALUES('$Title', '$Message', '$Category_id', '$Userid', '$Status', '$Created', '$Updated')";
			$qr = $conn->exec($sql);
			header("location: index.php");
		}
	}
}
?>
<!Doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add new Article</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
	<div class="container mt-5">
		<h1>Add new Article</h1>
		<form class="row g-3" action="" method="post">
			<div class="col-md-6">
				<label for="title" class="form-label">Title</label>
				<input type="text" class="form-control" id="title" name="title" placeholder="title" required>
			</div>
			<div class="col-md-6">
				<label for="message" class="form-label">Message</label>
				<textarea class="form-control" id="message" name="message" rows="3" placeholder="message" required></textarea>
			</div>
			<div class="col-md-8">
				<label for="category_id" class="form-label">Category_id</label>
				<input type="text" class="form-control" id="category_id" name="category_id" placeholder="category_id" required>
			</div>
			<div class="col-md-4">
				<label for="userid" class="form-label">Userid</label>
				<input type="text" class="form-control" id="userid" name="userid" placeholder="userid">
			</div>
			<div class="col-md-12">
				<label for="status" class="form-label">Status</label>
				<input type="text" class="form-control" id="status" name="status" placeholder="status" required>
			</div>
			<div class="col-md-12">
				<label for="created" class="form-label">Created</label>
				<input type="date" class="form-control" id="created" name="created" required>
			</div>
			<div class="col-md-12">
				<label for="updated" class="form-label">Updated</label>
				<input type="date" class="form-control" id="updated" name="updated" required>
			</div>
			<div class="col-md-12">
				<input type="submit" class="btn btn-primary" name="them" value="Them">
			</div>
		</form>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>