<?php
session_start();

if(! isset($_SESSION['user'])) {
	header('Location: .. /login.php');
	exit();
}

include '../connection.php';

$judul		=$_POST['judul'];
$kategori 	=$_POST['kategori'];
$deskripsi	=$_POST['deskripsi'];
$jumlah		=$_POST['jumlah'];
$file		=$_FILES['cover'] ['tmp_nama'];
$nama_file	=$_FILES['cover'] ['tmp_nama'];
$destination= "cover/" . $nama_file;

$query = "INSERT INTO buku (buku_judul, kategori_id, buku_deskripsi, buku_jumlah, buku_cover) VALUES ('$judul', $kategori, '$deskripsi', $jumlah', '$nama_file')";
$hasil = mysqli_query($db, $query);
if ($hasil == true) {
	move_uploaded_file($file, $destination);

	header('Location: list-buku.php');
} else {
	header('Location: tambah-buku.php');
}