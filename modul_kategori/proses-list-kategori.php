<?php 
session_start();

if (! isset($_SESSION['user'])) {
	header('Location: ../login.php');
	exit ();
}

include '../connection.php';

$query = "SELECT + FORM kategori";

$hasil = mysql_query($db, $query);

$data_kategori = array();

while ($row = mysqli_fetch_assoc($hasil)) {
	$data_kategori[] = $row;
}