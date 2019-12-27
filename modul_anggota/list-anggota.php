<?php

include '../connection.php';

include 'proses-list-anggota.php';

$halaman = 5;
$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
$result = mysqli_query($db,"SELECT * FROM anggota");
$total = mysqli_num_rows($result);
$pages = ceil($total/$halaman);            
$query = mysqli_query($db,"SELECT * FROM anggota LIMIT $mulai, $halaman")or die(mysqli_error);

$no =$mulai+1;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Anggota</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container clearfix">
        <h1>My Perpustakaan</h1>

        <?php include '../sidebar.php' ?>

        <div class="content">
            <h1>Daftar Anggota</h1>
            <div class="btn-tambah-div">
                <a href="tambah-anggota.php"><button class="btn btn-tambah">Tambah Data</button></a>
            </div>
            <?php if (empty($data_anggota)) : ?>
            Tidak ada data.
            <?php else : ?>
            <table class="data">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>JK</th>
                    <th>No Telepon</th>
                    <th width="20%">Pilihan</th>
                </tr>
                <?php 
                    while ($anggota = mysqli_fetch_assoc($query)) {
                ?>
                <tr>
                    <td><?php echo $no++; ?></td> 
                    <td><?php echo $anggota['anggota_nama'] ?></td>
                    <td><?php echo $anggota['anggota_alamat'] ?></td>
                    <td><?php echo $anggota['anggota_jk'] ?></td>
                    <td><?php echo $anggota['anggota_telp'] ?></td>
                    <td>
                        <a href="edit-anggota.php?id_anggota=<?php echo $anggota['anggota_id']; ?>" class="btn btn-edit">Edit</a>
                        <a href="delete-anggota.php?id_anggota=<?php echo $anggota['anggota_id']; ?>" class="btn btn-hapus" onclick="return confirm('anda yakin akan menghapus data?');">Hapus</a>
                    </td>
                </tr>
                <?php  } ?>
            </table>
            <div class="">
              <font>Page</font>
              <?php for ($i=1; $i<=$pages ; $i++){ ?>
              &nbsp;<a href="?halaman=<?php echo $i; ?>" style="color:black;"><?php echo $i; ?></a>
 
              <?php } ?>
 
            </div>
            <?php endif ?>
        </div>

    </div>
</body>
</html>
