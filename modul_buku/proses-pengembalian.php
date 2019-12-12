<?php
session_start();

if (! isset($_SESSION['user'])) {
    header('Location: ../login.php');
    exit();
}

include '../connection.php';
include '../function.php';

$tgl_kembali = $_POST['tgl_kembali'];
$denda = $_POST['denda'];
$pinjam_id = $_POST['pinjam_id'];

$query = "INSERT INTO kembali (pinjam_id, tgl_kembali, denda)
        VALUES ($pinjam_id, '$tgl_kembali', $denda)";

// die(var_dump($query));

$hasil = mysqli_query($db, $query);



if ($hasil == true) {
    header('Location: ../modul_buku/pinjam-data.php');
} else {
    header('Location: pengembalian.php?id_pinjam=' . $pinjam_id);
}

?>