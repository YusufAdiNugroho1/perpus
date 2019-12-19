<?php
session_start();
if(! isset($_SESSION['user'])) {
	header('Location: .. /login.php');
	exit();
}

include '../connection.php';

$rak_id = $_POST['rak_id'];
$buku = $_POST['buku'];
$rak = $_POST['rak'];

$query = "UPDATE rak_buku
  SET rak_id = '$rak',
	  buku_id = '$buku'
  WHERE id = '$rak_id'";
$hasil = mysqli_query($db, $query);
if ($hasil == ture) {

	header('Location: list-rak.php');
} else {
	header('Location: edit-rak.php');
}