<?php

<<<<<<< HEAD
include '../connection.php';

include 'proses-list-buku.php';

$halaman = 5;
$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
$result = mysqli_query($db,"SELECT buku.*, kategori.kategori_nama
    FROM buku 
    JOIN kategori 
    ON buku.kategori_id = kategori.kategori_id");
$total = mysqli_num_rows($result);
$pages = ceil($total/$halaman);            
$query = mysqli_query($db,"SELECT buku.*, kategori.kategori_nama
    FROM buku 
    JOIN kategori 
    ON buku.kategori_id = kategori.kategori_id LIMIT $mulai, $halaman")or die(mysqli_error);

$no =$mulai+1;

=======
// ... ambil data dari database
include 'proses-list-buku.php';

>>>>>>> 08fdac12d2cbc8e6289095777019daea96fc8873
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<<<<<<< HEAD
    <title>Daftar Buku</title>
=======
    <title>Daftar Kategori</title>
>>>>>>> 08fdac12d2cbc8e6289095777019daea96fc8873
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container clearfix">
        <h1>SI Perpustakaan</h1>

        <?php include '../sidebar.php' ?>

        <div class="content">
            <h1>Daftar Buku</h1>
            <div class="btn-tambah-div">
                <a href="tambah-buku.php"><button class="btn btn-tambah">Tambah Data</button></a>
            </div>
            <?php if (empty($data_buku)) : ?>
            Tidak ada data.
            <?php else : ?>
            <table class="data">
                <tr>
<<<<<<< HEAD
                    <th>No</th>
=======
>>>>>>> 08fdac12d2cbc8e6289095777019daea96fc8873
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Deskripsi</th>
                    <th>Jumlah</th>
                    <th>Cover</th>
                    <th width="20%">Pilihan</th>
                </tr>
<<<<<<< HEAD
                <?php 
                    while ($buku = mysqli_fetch_assoc($query)) {
                ?>
                <tr>
                    <td><?php echo $no++ ?></td>
=======
                <?php foreach ($data_buku as $buku) : ?>
                <tr>
>>>>>>> 08fdac12d2cbc8e6289095777019daea96fc8873
                    <td><?php echo $buku['buku_judul'] ?></td>
                    <td><?php echo $buku['kategori_nama'] ?></td>
                    <td><?php echo $buku['buku_deskripsi'] ?></td>
                    <td><?php echo $buku['buku_jumlah'] ?></td>
<<<<<<< HEAD
                    <td><img width="130px" class="buku-cover" src="cover/<?php echo $buku['buku_cover'] ?>"></td>
=======
                    <td><img class="buku-cover" width="130px" src="cover/<?php echo $buku['buku_cover'] ?>"></td>
>>>>>>> 08fdac12d2cbc8e6289095777019daea96fc8873
                    <td>
                        <a href="edit-buku.php?id_buku=<?php echo $buku['buku_id']; ?>" class="btn btn-edit">Edit</a>
                        <a href="delete-buku.php?id_buku=<?php echo $buku['buku_id']; ?>" class="btn btn-hapus" onclick="return confirm('anda yakin akan menghapus data?');">Hapus</a>
                    </td>
                </tr>
<<<<<<< HEAD
                <?php } ?>
            </table>
            <div class="">
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
