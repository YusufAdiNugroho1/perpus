<?php
include_once("../connection.php");
$showRecordPerPage = 5;
if(isset($_GET['page']) && !empty($_GET['page'])){
$currentPage = $_GET['page'];
}else{
$currentPage = 1;
}
$startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;
$totalEmpSQL = "SELECT * FROM buku";
$allEmpResult = mysqli_query($db, $totalEmpSQL);
$totalEmployee = mysqli_num_rows($allEmpResult);
$lastPage = ceil($totalEmployee/$showRecordPerPage);
$firstPage = 1;
$nextPage = $currentPage + 1;
$previousPage = $currentPage - 1;
$empSQL = "SELECT buku_id,buku_judul,kategori_id,buku_deskripsi,buku_jumlah,buku_cover 
FROM `buku` LIMIT $startFrom, $showRecordPerPage";
$empResult = mysqli_query($db, $empSQL);
?>