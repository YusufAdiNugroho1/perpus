<?php
if(!isset($_SESSION))
	 session_start();  

$host = "localhost";
$user = "root";
$pass = "";
$database = "siperpus";
$db = mysqli_connect($host, $user, $pass, $database);

$query = "SELECT buku.*, kategori.kategori_nama
	FROM buku 
	JOIN kategori 
	ON buku.kategori_id = kategori.kategori_id ";
	
$hasil = mysqli_query($db, $query);
$data_buku = array();

while ($row = mysqli_fetch_assoc($hasil)) {
	$data_buku[] = $row;

}