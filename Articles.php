<?php
include_once('config/Database.php');
include_once('class/Articles.php');
$article = new Articles;
if(isset($_GET['id'])) {
	$id = $_GET['id'];
	$data = $article->fetch_data($id);
	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>First PHP With Docker</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div class="row">
			<h4><?php echo $data['title']?></h4>
			<p><?php echo $data['message']?></p>
			<a href="index.php">&larr; Back</a>
		</div>
	</body>
	</html>
<?php
} else {
	header('Location: index.php');
	exit();
}
?>