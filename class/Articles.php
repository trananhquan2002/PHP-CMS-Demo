<?php
class Articles {
	public function fetch_All() {
		global $pdo;
		$query = $pdo->prepare("SELECT * FROM cms_posts");
		$query->execute();
		return $query->fetchAll();
	}
	public function fetch_data($id) {
		global $pdo;
		$query = $pdo->prepare("SELECT * FROM cms_posts WHERE id = ?");
		$query->bindValue(1, $id);
		$query->execute();
		return $query->fetch();
	}
}