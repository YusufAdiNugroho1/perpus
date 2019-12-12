<?php

include '../connection.php';

$id_buku = $_GET['id_buku'];

$query	= "DELETE FROM buku WHERE buku_id = $id_buku";
$hasil	= mysqli_query($db, $query);

if ($hasil == true) {
	header('Location: list-buku.php');
} else {
	header('Location: tambah-buku.php');
}
