<?php
session_start();
require "./config/Database.php";
if (!isset($_SESSION['username'], $_SESSION['password'])) {
	header('Location: login.php');
}
?>
<!Doctype html>
<html lang="en">
<head>
	<title>Title</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<style>
		.header-content {
			display: flex;
			align-items: center;
			justify-content: space-between;
			margin-right: 5px;
		}
	</style>
</head>
<body>
	<main>
		<div class="container-fluid">
			<div class="row flex-nowrap">
				<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
					<div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
						<a href="" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
							<span class="fs-5 d-none d-sm-inline">Menu</span>
						</a>
						<ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
							<li>
								<a href="" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
									<i class="fs-4 bi-speedometer2"></i>
									<span class="ms-1 d-none d-sm-inline">Manage Article</span>
								</a>
							</li>
							<li>
								<a href="" class="nav-link px-0 align-middle">
									<i class="fs-4 bi-table"></i>
									<span class="ms-1 d-none d-sm-inline">Manage User</span>
								</a>
							</li>
							<li>
								<a href="" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
									<i class="fs-4 bi-grid"></i>
									<span class="ms-1 d-none d-sm-inline">Manage Category</span>
								</a>
							</li>
						</ul>
						<hr>
						<div class="dropdown pb-4">
							<a href="" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
								<img src="313424636_542195904386587_8577198730808437858_n.jpg" alt="hugenerd" width="30" height="30" class="rounded-circle">
								<span class="d-none d-sm-inline mx-1">
									<?php
									if (isset($_SESSION['username'])) {
										$username = $_SESSION['username'];
										echo $username;
									}
									?>
								</span>
							</a>
							<ul class="dropdown-menu dropdown-menu-dark text-small shadow">
								<li>
									<a class="dropdown-item" href="logout.php">Logout</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col py-3">
					<div class="header-content">
						<h1>Quản Lý Bài Viết</h1>
						<a class="btn btn-primary" href="them.php">Thêm</a>
					</div>
					<div class="table-responsive">
						<table class="table table-striped table-hover align-middle">
							<thead class="table-light">
								<tr>
									<th>id</th>
									<th>title</th>
									<th>message</th>
									<th>name</th>
									<th>fullname</th>
									<th>status</th>
									<th>created</th>
									<th>updated</th>
									<th>Action</th>
								</tr>
								<?php
								$pageSize = 3; // Số lượng record của 1 trang
								$startRow = 0; // Dòng thứ mấy bắt đầu lấy
								$pageNum = 1; // Số trang user muốn xem
								$offset = 3; // Số link trước và sau trang hiện tại
								if (isset($_GET['pageNum']) == true) {
									$pageNum = $_GET['pageNum'];
								}
								$startRow = ($pageNum - 1) * $pageSize;
								$sql = "SELECT cms_posts.id, cms_posts.title, cms_posts.message, cms_category.name, cms_user.fullname, cms_posts.status, cms_posts.created, cms_posts.updated FROM cms_posts INNER JOIN cms_category ON cms_posts.category_id = cms_category.id INNER JOIN cms_user ON cms_posts.userid = cms_user.id LIMIT $startRow,$pageSize";
								$data = $conn->query($sql);
								$sql = "SELECT COUNT(*) FROM cms_posts INNER JOIN cms_category ON cms_posts.category_id = cms_category.id INNER JOIN cms_user ON cms_posts.userid = cms_user.id";
								$kq = $conn->query($sql);
								$r = $kq->fetch();
								$tongSoRecord = $r[0];
								$tongSoTrang = ceil($tongSoRecord / $pageSize);
								$from = $pageNum - $offset;
								if ($from < 1) {
									$from = 1;
								}
								$to = $pageNum + $offset;
								if ($to > $tongSoTrang) {
									$to = $tongSoTrang;
								}
								$pageNext = $pageNum + 1;
								$pagePrev = $pageNum - 1;
								foreach ($data as $row) { ?>
							</thead>
							<tbody>
								<tr>
									<td><?php echo $row["id"] ?></td>
									<td><?php echo $row["title"] ?></td>
									<td><?php echo $row["message"] ?></td>
									<td><?php echo $row["name"] ?></td>
									<td><?php echo $row["fullname"] ?></td>
									<td><?php echo $row["status"] ?></td>
									<td><?php echo $row["created"] ?></td>
									<td><?php echo $row["updated"] ?></td>
									<td>
										<a class="btn btn-primary" href="sua.php?id=<?php echo $row['id'] ?>">Sửa</a><br>
										<a class="btn btn-primary" onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết <?php echo $row['title'] ?> này không ?')" href="xoa.php?id=<?php echo $row['id'] ?>">Xóa</a>
										<a class="btn btn-primary" href="detail.php?id=<?php echo $row['id'] ?>">Detail</a>
									</td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
					</div>
					<nav aria-label="Page navigation example">
						<ul class="pagination">
							<li class="page-item"><a class="page-link" href="index.php"><<</a></li>
							<?php if ($pageNum > 1) { ?>
								<li class="page-item"><a class="page-link" href="index.php?pageNum=<?php echo $pagePrev?>"><</a></li>
							<?php } ?>
							<?php for ($i = $from; $i <= $to; $i++) { ?> 
								<?php if ($i == $pageNum) { ?>
									<li class="page-item"><a class="page-link bg-warning" href="index.php?pageNum=<?php echo $i?>"><?php echo $i?></a></li>
								<?php } else { ?>
									<li class="page-item"><a class="page-link" href="index.php?pageNum=<?php echo $i?>"><?php echo $i?></a></li>
								<?php } ?>
							<?php } ?>
							<?php if ($pageNum < $tongSoTrang) { ?>
								<li class="page-item"><a class="page-link" href="index.php?pageNum=<?php echo $pageNext?>">></a></li>
							<?php } ?>
							<li class="page-item"><a class="page-link" href="index.php?pageNum=<?php echo $tongSoTrang?>">>></a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</main>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
	</script>
</body>
</html>