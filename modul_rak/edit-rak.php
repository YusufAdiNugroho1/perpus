<?php
session_start();

include '../modul_buku/proses-list-buku.php';
include '../modul_rak_buku/proses-list-rak-buku.php';

if (!isset($_SESSION['user'])) {
    header('Location: ../login.php');
    exit();
}

$id = $_GET['id'];
$query = "SELECT * FROM rak_buku WHERE id = '$id'";
$hasil = mysqli_query($db, $query);
$letak = mysqli_fetch_assoc($hasil);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Rak</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container clearfix">
        <h1>My Perpustakaan</h1>

        <?php include '../sidebar.php' ?>

        <div class="content">
            <h3>Edit Data Rak</h3>
            <form method="post" action="proses-edit-rak.php" enctype="multipart/form-data">
                <input type="hidden" name="rak_id" value="<?php echo $id; ?>">
                <p>Rak</p>
                <p>
                    <select name="rak">
                        <?php foreach ($data_rak as $rak): ?>
                            <option value="<?php echo $rak['rak_id'] ?>" <?= $rak['rak_id'] == $letak['rak_id'] ? 'selected' : '' ?> ><?php echo $rak['rak_nama'] ?></option>
                        <?php endforeach ?>
                    </select>
                </p>

                <p>Buku</p>
                <p>
                	<select name="buku">
                        <?php foreach ($data_buku as $buku): ?>
                            <option value="<?php echo $buku['buku_id'] ?>" <?php echo ($buku['buku_id'] == $letak['buku_id']) ? 'selected' : '' ; ?> ><?php echo $buku['buku_judul'] ?></option>
                        <?php endforeach ?>
                    </select>
                </p>

                <p><input type="submit" class="btn btn-submit" value="Simpan">
                <input type="reset" class="btn btn-submit"value="Batal" onclick="self.history.back();">
                </p>
            </form>
        </div>

    </div>
</body>
</html>
