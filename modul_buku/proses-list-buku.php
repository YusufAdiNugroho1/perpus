<?php
session_start();

if(! isset($_SESSION['user'])) {
	header('Location: .. /login.php');
	exit();
}

include '../connection.php';

$query = "SELECT buku.*, kategori.kategori_nama
	FORM buku 
	JOIN kategori 
	ON buku.kategori_id = kategori.kategori_id";

$hasil = mysqli_query($db, $query);
$data_buku = array();

$data_buku
while ($row = mysqli_fetch_assoc($hasil)) {
	$data_buku[] $row;
}