<?php 
session_start();

include '../connection.php';
include '../function.php';

$id_pinjam = $_GET['id_pinjam'];
$status	   = $_GET['status'];
$buku_id   = $_GET['buku_id'];

$stok_buku = cek_stok($db, $buku_id);

if ($stok_buku < 1) {
	$_SESSION['messages'] = '<font color="red">Hapus data gagal!</font>';
    header('Location: pinjam-data.php');
    exit();
}

if ($status == 'pinjam') {
	tambah_stok($db, $buku_id);
}

$query = "DELETE FROM pinjam WHERE pinjam_id = $id_pinjam";
$hasil = mysqli_query($db, $query);

if($hasil){
	header("location: pinjam-data.php");
}else{
	header("location: pinjam-data.php");
}
