<?php
if(!isset($_SESSION))
	 session_start();

$host = "localhost";
$user = "root";
$pass = "";
$database = "siperpus";
$db = mysqli_connect($host, $user, $pass, $database);

$query = "SELECT * FROM rak_buku JOIN buku ON buku.buku_id = rak_buku.buku_id JOIN rak ON rak_buku.rak_id = rak.rak_id ORDER BY rak.rak_nama ASC"; 
	
$hasil = mysqli_query($db, $query);
$data_rak = array();

while ($row = mysqli_fetch_assoc($hasil)) {
    $data_rak[] = $row;

}