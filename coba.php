<?php

$host = "localhost";
$user = "root";
$pass = "";
$database = "db_perpus";
$db = mysqli_connect($host, $user, $pass, $database);


$query = "SELECT anggota_nama as nama FROM anggota";

$hasil = mysqli_query($db, $query);
mysqli_connect_error();

// ... membuat variable untuk menampung semua data
$data = [];

// var_dump(($hasil));

// ... tiap baris dari hasil query dikumpulkan ke $data_buku
while ($row = mysqli_fetch_assoc($hasil)) {
    $data[] = $row;
}

print_r($data);

foreach ($data as $key => $value) {
	// print_r($value);
	print_r($key . $value['nama']."<br>");	
}

?>