<?php
session_start();

if (! isset($_SESSION['user'])) {
	header('Location: ../login.php');
	exit();
}

incude '../connection.php';

$kategori = $_POST['kategori'];

$query = "INSERT INTO kategori (kategori_nama) VALUES ('$kategori')";
$hasil = mysqli_query($db, $query);

if ($hasil == true) {
	header('Location: list-kategori.php');
} else {
	header('Location: tambah-kategori.php');
}