<?php

include '../connection.php';

include 'proses-list-pengembalian.php';

$halaman = 10;
$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
$result = mysqli_query($db,"SELECT buku.buku_judul, pinjam.tgl_pinjam, pinjam.tgl_jatuh_tempo,kembali.kembali_id, kembali.tgl_kembali, anggota.anggota_nama
    FROM pinjam
    JOIN buku ON buku.buku_id = pinjam.buku_id
    JOIN anggota ON anggota.anggota_id = pinjam.anggota_id
    JOIN kembali ON pinjam.pinjam_id = kembali.pinjam_id");
$total = mysqli_num_rows($result);
$pages = ceil($total/$halaman);            
$query = mysqli_query($db,"SELECT buku.buku_judul, pinjam.tgl_pinjam, pinjam.tgl_jatuh_tempo,kembali.kembali_id, kembali.tgl_kembali, anggota.anggota_nama
    FROM pinjam
    JOIN buku ON buku.buku_id = pinjam.buku_id
    JOIN anggota ON anggota.anggota_id = pinjam.anggota_id
    JOIN kembali ON pinjam.pinjam_id = kembali.pinjam_id LIMIT $mulai, $halaman")or die(mysqli_error);

$no =$mulai+1;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Pengembalian</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container clearfix">
        <h1>My Perpustakaan</h1>

        <?php include '../sidebar.php' ?>
        <div class="content">
            <h1>Daftar Pengembalian</h1>
            <?php if (empty($data_kembali)) : ?>
            Tidak ada data.
            <?php else : ?>
            <table class="data">
                <tr>
                    <th>No</th>
                    <th>Buku</th>
                    <th>Nama</th>
                    <th>Tgl Pinjam</th>
                    <th>Tgl Jatuh Tempo</th>
                    <th>Tgl Kembali</th>
                    <th width="20%">Pilihan</th>
                </tr>

                <?php 
                    while ($kembali = mysqli_fetch_assoc($query)) {
                ?>

                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $kembali['buku_judul'] ?></td>
                    <td><?php echo $kembali['anggota_nama'] ?></td>
                    <td><?php echo $kembali['tgl_pinjam'] ?></td>
                    <td><?php echo $kembali['tgl_jatuh_tempo'] ?></td>
                    <td><?php echo $kembali['tgl_kembali'] ?></td>
                    <td align="center">
                    <a href="delete-pengembalian.php?id_kembali=<?php echo $kembali['kembali_id'] ?>" onclick="return confirm('anda yakin akan menghapus data?')" class="btn btn-hapus">Hapus</a>
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

