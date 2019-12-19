<?php

include '../connection.php';

$id = $_GET['id'];

$query = "DELETE FROM rak_buku WHERE id = '$id'";
$hasil = mysqli_query($db, $query);

if ($hasil == true) {
    header('location: list-rak.php');
} else {
    header('location: list-rak.php');
}
