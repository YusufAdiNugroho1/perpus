<?php

include '../connection.php';

include 'proses-list-rak.php';

$halaman = 5;
$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
$result = mysqli_query($db,"SELECT * FROM rak_buku 
    JOIN buku ON buku.buku_id = rak_buku.buku_id 
    JOIN rak ON rak_buku.rak_id = rak.rak_id 
    ORDER BY rak.rak_nama ASC");
$total = mysqli_num_rows($result);
$pages = ceil($total/$halaman);            
$query = mysqli_query($db,"SELECT * FROM rak_buku 
    JOIN buku ON buku.buku_id = rak_buku.buku_id 
    JOIN rak ON rak_buku.rak_id = rak.rak_id 
    ORDER BY rak.rak_nama ASC LIMIT $mulai, $halaman")or die(mysqli_error);

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
            <h1>Rak Buku</h1>
            <div class="btn-tambah-div">
                <a href="tambah-rak.php"><button class="btn btn-tambah">Tambah</button></a>
            </div>
            <?php if (empty($data_rak)) : ?>
                Tidak ada data.
            <?php else : ?>
            <table class="data">
                <tr>
                    <th>No</th>
                    <th>Rak</th>
                    <th>Buku</th>
                    <th width="20%">Pilihan</th>
                </tr>
                <?php
                    while ($rak = mysqli_fetch_assoc($query)) { 
                ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $rak ['rak_nama'] ?></td>
                    <td><?php echo $rak ['buku_judul']; ?></td>
                    <td>
                        <a href="edit-rak.php?id=<?php echo $rak['id']; ?>" class="btn btn-edit">Edit</a>
                        <a href="delete-rak.php?id=<?php echo $rak['id']; ?>" class="btn btn-hapus" onclick="return confrim('Hapus data ini?');">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
            <div>
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