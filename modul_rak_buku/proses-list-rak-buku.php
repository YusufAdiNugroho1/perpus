<?php
if(!isset($_SESSION))
	 session_start();

include '../connection.php';

$query = "SELECT * FROM rak ORDER BY rak_nama ASC"; 

$hasil = mysqli_query($db, $query);
$data_rak = array();

while ($row = mysqli_fetch_assoc($hasil)) {
    $data_rak[] = $row;

}
