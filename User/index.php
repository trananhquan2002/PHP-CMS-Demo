<?php
require "./config/Database.php";
?>
<?php
$sql = "SELECT * FROM cms_posts";
$data = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Articles</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="blog" class="row">
        <h1>List Articles</h1>
        <ol>
            <?php foreach ($data as $row) { ?>
                <li>
                    <a href="article.php?id=<?php echo $row['id'] ?>"><?php echo $row['title'] ?></a>
                </li>
            <?php } ?>
        </ol>
    </div>
</body>
</html>