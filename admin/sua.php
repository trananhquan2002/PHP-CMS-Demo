<?php
require "./config/Database.php";
if (isset($_GET["id"])) {
	$id = $_GET["id"];
}
if (isset($_SESSION['username'], $_SESSION['password'])) {
	if (isset($_POST["sua"])) {
		$Title = $_POST["title"];
		$Message = $_POST["message"];
		$Created = $_POST["created"];
		$Updated = $_POST["updated"];
		if ($Title != "" && $Message != "" && $Created != "" && $Updated != "") {
			$sql = "UPDATE cms_posts INNER JOIN cms_category ON cms_posts.id = cms_category.id INNER JOIN cms_user ON cms_posts.id = cms_user.id SET cms_posts.title = '$Title', cms_posts.message = '$Message', cms_posts.created = '$Created', cms_posts.updated = '$Updated' WHERE cms_posts.id = $id";
			$qr = $conn->exec($sql);
			header("location: index.php");
		}
	}
}
$sql = "SELECT title, message, cms_category.name, cms_user.fullname, cms_posts.status, cms_posts.created, cms_posts.updated FROM cms_posts INNER JOIN cms_category ON cms_posts.id = cms_category.id INNER JOIN cms_user ON cms_posts.id = cms_user.id WHERE cms_posts.id = $id";
$qr = $conn->query($sql);
?>
<!Doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<title>Update Article</title>
</head>
<body>
	<div class="container mt-5">
		<h1>Update Article</h1>
		<form class="row g-3" action="" method="post">
			<?php while ($rows = $qr->fetch()) { ?>
				<div class="col-md-6">
					<label for="title" class="form-label">Title</label>
					<input type="text" class="form-control" id="title" name="title" value="<?php echo $rows['title'] ?>" required>
				</div>
				<div class="col-md-6">
					<label for="message" class="form-label">Message</label>
					<textarea class="form-control" id="message" name="message" rows="3" required><?php echo $rows['message'] ?></textarea>
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
					<input type="submit" class="btn btn-primary" name="sua" value="Sua">
				</div>
			<?php } ?>
		</form>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>