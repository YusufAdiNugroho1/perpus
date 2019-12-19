<?php
session_start();

if (! isset($_SESSION['user'])) {
    header('Location: ../login.php');
    exit();
}

include '../connection.php';

$rak 	= $_POST['rak'];
$buku 	= $_POST['buku'];

$query = "INSERT INTO rak_buku (rak_id, buku_id)
    VALUES ('$rak', '$buku')";

$hasil = mysqli_query($db, $query);

if ($hasil == true) {
    move_uploaded_file($file, $destination);
    header('Location: list-rak.php');
} else {
    header('Location: tambah-rak.php');
}
