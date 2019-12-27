<?php

include '../connection.php';

include 'proses-list-pinjam-data.php';

$halaman = 10;
$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
$result = mysqli_query($db,"SELECT pinjam.*,pinjam.pinjam_id as id_pinjam, buku.buku_id ,buku.buku_judul, anggota.anggota_nama,
    (SELECT tgl_kembali FROM kembali JOIN pinjam ON kembali.pinjam_id=pinjam.pinjam_id WHERE kembali.pinjam_id=id_pinjam) as tgl_kembali
    FROM pinjam
    JOIN buku ON buku.buku_id = pinjam.buku_id
    JOIN anggota ON anggota.anggota_id = pinjam.anggota_id");
$total = mysqli_num_rows($result);
$pages = ceil($total/$halaman);            
$query = mysqli_query($db,"SELECT pinjam.*,pinjam.pinjam_id as id_pinjam, buku.buku_id ,buku.buku_judul, anggota.anggota_nama,
    (SELECT tgl_kembali FROM kembali JOIN pinjam ON kembali.pinjam_id=pinjam.pinjam_id WHERE kembali.pinjam_id=id_pinjam) as tgl_kembali
    FROM pinjam
    JOIN buku ON buku.buku_id = pinjam.buku_id
    JOIN anggota ON anggota.anggota_id = pinjam.anggota_id LIMIT $mulai, $halaman")or die(mysqli_error);

$no =$mulai+1;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Peminjaman</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container clearfix">
        <h1>My Perpustakaan</h1>

        <?php include '../sidebar.php' ?>

        <div class="content">
            <h1>Daftar Peminjaman</h1>
            <div class="btn-tambah-div">
                <a href="pinjam-form.php"><button class="btn btn-tambah">Transaksi Baru</button></a>
            </div>

            <?php if (empty($data_pinjam)) : ?>
                Tidak ada data.
            <?php else : ?>
<<<<<<< HEAD:modul_pinjam/pinjam-data.php
            <table class="data">
                <tr>
                    <th>No</th>
                    <th>Buku</th>
                    <th>Nama</th>
                    <th>Tgl Pinjam</th>
                    <th>Tgl Jatuh Tempo</th>
                    <th>Tgl Kembali</th>
                    <th>Status</th>
                    <th width="30%">Pilihan</th>
                </tr>
                <?php
                     while ($pinjam = mysqli_fetch_assoc($query)) {
                ?>
                <tr align="center">
                    <td><?php echo  $no++ ?></td>
                    <td><?php echo $pinjam['buku_judul'] ?></td>
                    <td><?php echo $pinjam['anggota_nama'] ?></td>
                    <td><?php echo date('d-m-Y', strtotime($pinjam['tgl_pinjam'])) ?></td>
                    <td><?php echo date('d-m-Y', strtotime($pinjam['tgl_jatuh_tempo'])) ?></td>
                    <td>
                    <?php  
                        if (empty($pinjam['tgl_kembali'])) {
=======
                <table class="data">
                    <tr>
                        <th>Buku</th>
                        <th>nama</th>
                        <th>Tgl Pinjam</th>
                        <th>Tgl Jatuh Tempo</th>
                        <th>Tgl Kembali</th>
                        <th>Status</th>
                        <th width="30%">Pilihan</th>
                    </tr>
                    <?php foreach ($data_pinjam as $pinjam) : ?>
                    <tr>
                        <td><?php echo $pinjam['buku_judul']; ?></td>
                        <td><?php echo $pinjam['anggota_nama'] ?></td>
                        <td><?php echo date ('d-m-y',strtotime($pinjam['tgl_pinjam'])) ?></td>
                        <td><?php echo date ('d-m-y',strtotime($pinjam['tgl_jatuh_tempo'])) ?></td>
                        <td>
                        <?php if (empty($pinjam['tgl_kembali'])) {
>>>>>>> 08fdac12d2cbc8e6289095777019daea96fc8873:modul_buku/pinjam-data.php
                            echo "-";
                        }
                        else {
                            echo date('d-m-y',strtotime($pinjam['tgl_kembali']));
                        }
                        ?>
                        </td>
                         <td>
                        <?php $status = '' ?>
                        <?php if (empty($pinjam['tgl_kembali'])): ?>
                            pinjam
                        <?php $status = 'pinjam' ?>
                        <?php else: ?>
                            kembali
                        <?php $status = 'kembali' ?>  
                        <?php endif ?>
                    </td>
                        <td align="center">
                            <?php if (empty($pinjam['tgl_kembali'])): ?>
                            <a href="../modul_buku/pengembalian.php?id_pinjam=<?php echo $pinjam['pinjam_id'] ?>" class="btn btn-tambah" title="klik untuk proses pengembalian">Kembali</a>
                            <a href="edit-pinjam.php?id_pinjam=<?php echo $pinjam['pinjam_id']; ?>&&status=<?php echo $status; ?>" class="btn btn-edit">Edit</a>
                        <?php endif ?>
                        <a href="proses-delete-pinjam.php?id_pinjam=<?php echo $pinjam['pinjam_id']; ?>&&status=<?php echo $status; ?>&&buku_id=<?php echo $pinjam['buku_id']; ?>"  onclick="return confirm('anda yakin akan menghapus data?')" class="btn btn-hapus">Hapus</a>
<<<<<<< HEAD:modul_pinjam/pinjam-data.php
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
=======
                        </td>
                    </tr>
                <?php endforeach ?>
                </table>
>>>>>>> 08fdac12d2cbc8e6289095777019daea96fc8873:modul_buku/pinjam-data.php
            <?php endif ?>
        </div>

    </div>
</body>
</html>
