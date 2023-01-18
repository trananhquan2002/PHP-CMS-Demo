<?php
include_once('../config/Database.php');
include_once('../class/Articles.php');
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
	<link rel="stylesheet" href="../style.css">
</head>
<body>
	<div id="blog" class="row">
		<h1>List Articles</h1>
		<ol>
			<?php foreach ($articles as $obj) { ?>
			<li>
				<a href="add.php"><?php echo $obj['title']?></a>
			</li>
			<?php } ?>
		</ol>
	</div>
</body>
</html>