<?php

include '../connection.php';

include 'proses-list-kategori.php';

$halaman = 5;
$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
$result = mysqli_query($db,"SELECT * FROM kategori");
$total = mysqli_num_rows($result);
$pages = ceil($total/$halaman);            
$query = mysqli_query($db,"SELECT * FROM kategori LIMIT $mulai, $halaman")or die(mysqli_error);

$no =$mulai+1;

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Daftar Kategori</title>
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<div class="container clearfix">
		<h1>My Perpustakaan</h1>
<<<<<<< HEAD

		<?php include '../sidebar.php' ?>

=======

		<?php include '../sidebar.php' ?>

>>>>>>> 08fdac12d2cbc8e6289095777019daea96fc8873
		<div class="content">
			<h1>Daftar Kategori</h1>
			<div class="btn-tambah-div">
				<a href="tambah-kategori.php"><button class="btn btn-tambah">Tambah Data</button></a>
			</div>
			<?php if (empty($data_kategori)) : ?>
				Tidak ada data.
			<?php else : ?>
			<table class="data">
				<tr>
<<<<<<< HEAD
					<th>No</th>
					<th>Kategori</th>
					<th width="20%">Pilihan</th>
				</tr>
				<?php 
					while ($kategori = mysqli_fetch_assoc($query)) {
				?>
				<tr>
					<td><?php echo $no++ ?></td>
=======
					<th>Kategori</th>
					<th width="20%">Pilihan</th>
				</tr>
				<?php foreach ($data_kategori as $kategori) : ?>
				<tr>
>>>>>>> 08fdac12d2cbc8e6289095777019daea96fc8873
					<td><?php echo $kategori ['kategori_nama'] ?></td>
					<td>
						<a href="edit-kategori.php?id_kategori=<?php echo $kategori['kategori_id']; ?>" class="btn btn-edit">Edit</a>
						<a href="delete-kategori.php?id_kategori=<?php echo $kategori['kategori_id']; ?>" class="btn btn-hapus" onclick="return confrim('Hapus data ini?');">Hapus</a>
						</td>
				</tr>
<<<<<<< HEAD
				<?php } ?>
			</table>
			<div>
			  <font>Page</font>
              <?php for ($i=1; $i<=$pages ; $i++){ ?>
              &nbsp;<a href="?halaman=<?php echo $i; ?>" style="color:black;"><?php echo $i; ?></a>
 
              <?php } ?>
 
			</div>
=======
				<?php endforeach ?>
			</table>
>>>>>>> 08fdac12d2cbc8e6289095777019daea96fc8873
		  <?php endif ?>
		</div>
	</div>
</body>
</html>