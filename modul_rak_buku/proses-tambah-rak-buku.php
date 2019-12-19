<?php
session_start();  

if (! isset($_SESSION['user'])) {
    header('Location: ../login.php');
    exit();
}

include '../connection.php';

$nama = $_POST['rak_nama'];

$query = "INSERT INTO rak (rak_nama) 
    VALUES ('$nama')";
$hasil = mysqli_query($db, $query);

if ($hasil == true) {
    header('Location: list-rak-buku.php');
} else {
    header('Location: tambah-rak-buku.php');
}

?>