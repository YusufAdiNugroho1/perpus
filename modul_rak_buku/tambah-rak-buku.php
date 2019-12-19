<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../login.php');
    exit();
}

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
            <h3>Tambah Data Rak</h3>
            <form method="post" action="proses-tambah-rak-buku.php">
                <p>Nama Rak</p>
                <p><input type="text" name="rak_nama"></p>
                <p>
                    <input type="submit" class="btn btn-submit" value="Simpan">
                </p>
            </form>
        </div>

    </div>
</body>
</html>
