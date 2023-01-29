<?php
require "./config/Database.php";
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$sql = "SELECT * FROM cms_posts WHERE id = $id";
    $qr = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Detail Article</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="row">
        <?php while ($rows = $qr->fetch()) { ?>
            <h1><?php echo $rows['title'] ?></h1>
            <p><?php echo $rows['message'] ?></p>
        <?php } ?>
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