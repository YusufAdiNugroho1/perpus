<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: ../login.php');
    exit();
}

include '../connection.php';

$rak_id = $_GET['rak_id']; 
$query = "SELECT * FROM rak WHERE rak_id = '$rak_id'";
$hasil = mysqli_query($db, $query);
$rak = mysqli_fetch_assoc($hasil);

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
            <h3>Edit Data Rak</h3>
            <form method="post" action="proses-edit-rak-buku.php">
                <input type="hidden" name="rak_id" id="rak_id" value="<?php echo $rak['rak_id']; ?>">
                <p>Nama Rak</p>
                <p><input type="text" name="rak" value="<?php echo $rak['rak_nama'] ?>"></p>
                <p>
                    <input type="submit" class="btn btn-submit" value="Simpan">
                    <input type="reset" class="btn btn-submit" value="Batal" onclick="self.history.back();">
                </p>
            </form>
        </div>

    </div>
</body>
</html>
