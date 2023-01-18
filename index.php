<?php
include_once('config/Database.php');
include_once('class/Articles.php');
$article = new Articles;
$articles = $article->fetch_All();
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
		<h1>List Articles</h1>
		<ol>
			<?php foreach ($articles as $obj) {?>
			<li>
				<a href="Articles.php?id=<?php echo $obj['id']?>"><?php echo $obj['title']?></a>
			</li>
			<?php } ?>
		</ol>
		<h1><a href="admin/add.php">Add new Article</a></h1>
		<h1><a href="admin/update.php"></a>Update Article</h1>
		<h1><a href="admin/delete.php"></a>Delete Article</h1>
		<h1><a href="admin/logout.php"></a>Logout</h1>
	</div>
</body>
</html>