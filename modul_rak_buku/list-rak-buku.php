<?php

include 'proses-list-rak-buku.php';

$halaman = 5;
$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;

$no =$mulai+1;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Rak Buku</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container clearfix">
        <h1>My Perpustakaan</h1>

        <?php include '../sidebar.php' ?>

        <div class="content">
            <h1>Rak</h1>
            <div class="btn-tambah-div">
                <a href="tambah-rak-buku.php"><button class="btn btn-tambah">Tambah</button></a>
            </div>
            <?php if (empty($data_rak)) : ?>
                Tidak ada data.
            <?php else : ?>
            <table class="data">
                <tr>
                    <th>No</th>
                    <th>Rak</th>
                    <th width="20%">Pilihan</th>
                </tr>
                <?php foreach ($data_rak as $rak) : ?>
                <tr>
                    <td><?php echo $no++ ?>;</td>
                    <td><?php echo $rak['rak_nama'] ?></td>
                    <td>
                        <a href="edit-rak-buku.php?rak_id=<?php echo $rak['rak_id']; ?>" class="btn btn-edit">Edit</a>
                        <a href="delete-rak-buku.php?rak_id=<?php echo $rak['rak_id']; ?>" class="btn btn-hapus" onclick="return confrim('Hapus data ini?');">Hapus</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </table>
          <?php endif ?>
        </div>
    </div>
</body>
</html>