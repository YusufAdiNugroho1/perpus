</<?php 
	session_start();

	if (empty($_SESSION['user'])) {
		header('Location: login.php');
		exit();
	}	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Daftar Petugas</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="container clearfix">
		<h1>My Perpustakaan</h1>
		<div class="sidebar">
			<ul>
				<li><a href="modul_kategori/list-kategori.php">Data Kategori</a></li>
				<li><a href="modul_buku/list-buku.php">Data Buku</a></li>
				<li><a href="modul_buku/list-anggota.php">Data Anggota</a></li>
				<li><a href="modul_buku/pinjam-data.php">Peminjaman</a></li>
				<li><a href="modul_buku/list-pengembalian">Pengembalian</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</div>
		<div class="content">
			<h1>Selamat datang, <?php echo $_SESSION['user']['petugas_nama'];?></h1>
		</div>
	</div>
</body>
</html>