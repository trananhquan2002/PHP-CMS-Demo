<?php
include_once('config/Database.php');
include_once('class/Articles.php');
$article = new Articles;
if(isset($_GET['id'])) {
	$id = $_GET['id'];
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
			<form action="delete.php" method="get">
                <select onchange="this.form.submit();">
                    <?php foreach ($articles as $obj) {
                        # code...
                    }?>
                </select>
            </form>
		</div>
	</body>
	</html>
<?php
} else {
	header('Location: index.php');
	exit();
}
?>