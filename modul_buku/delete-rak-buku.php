<?php

include '../connection.php';

$id_rak = $_GET['id_rak'];

$query = "DELETE FROM rak WHERE rak_id = $id_rak";
$hasil = mysqli_query($db, $query);

if ($hasi == true) {
    header('location: list-rak-buku.php');
} else {
    header('location: list-rak-buku.php');
}
