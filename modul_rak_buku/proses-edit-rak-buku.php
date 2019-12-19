<?php
include '../connection.php';

$id_rak = $_POST['rak_id'];
$rak 	= $_POST['rak'];

$query = "UPDATE rak
    SET rak_nama = '$rak'
    WHERE rak_id = '$id_rak'";

$hasil = mysqli_query($db, $query);
if ($hasil == true) {
    header('Location: list-rak-buku.php');
} else {
    header('Location: edit-rak-buku.php');
}
