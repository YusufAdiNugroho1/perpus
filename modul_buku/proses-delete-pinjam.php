<?php 

include '../connection.php';

$id_pinjam = $_GET['id_pinjam'];

$query = "DELETE FROM pinjam WHERE pinjam_id = $id_pinjam";
$hasil = mysqli_query($db, $query);

if($hasil){
	header("location: pinjam-data.php");
}else{
	header("location: pinjam-data.php");
}


?>