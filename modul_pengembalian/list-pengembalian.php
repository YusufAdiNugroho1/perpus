<?php

include 'proses-list-pengembalian.php';

$halaman = 5;
$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;

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

                <?php foreach ($data_kembali as $kembali) : ?>

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
                <?php endforeach ?>

            </table>
            <?php endif ?>
        </div>

    </div>
</body>
</html>

