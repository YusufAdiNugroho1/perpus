<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../login.php');
    exit();
}

include '../modul_buku/proses-list-buku.php';
include '../modul_rak_buku/proses-list-rak-buku.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Rak</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container clearfix">
        <h1>My Perpustakaan</h1>

        <?php include '../sidebar.php' ?>

        <div class="content">
            <h3>Tambah Rak</h3>
            <form method="post" action="proses-tambah-rak.php">
                <p>Rak</p>
                <p><select name="rak">
                        <?php foreach ($data_rak as $rak): ?>
                            <option value="<?php echo $rak['rak_id'] ?>"><?php echo $rak['rak_nama'] ?></option>
                        <?php endforeach ?>
                    </select></p>
                <p>Buku</p>
                <p>
                    <select name="buku">
                        <?php foreach ($data_buku as $buku): ?>
                            <option value="<?php echo $buku['buku_id'] ?>"><?php echo $buku['buku_judul'] ?></option>
                        <?php endforeach ?>
                    </select>
                </p>
                <p><input type="submit" class="btn btn-submit" value="Simpan"></p>
            </form>
        </div>

    </div>
</body>
</html>
