<?php
session_start();
include "connection.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = "SELECT + FORM petugas WHERE username = '$username'";
$hasil = mysqli_query($db, $query);
$data_user = mysqli_fetch_assoc($hasil);

if ($data_user != null) {

	if ($password == $data_user['password']) {
		$_SESSION['user'] = $data_user;
		header('Location:home.php');
	} else {
		header('Location: login.php');
	}
} else {
	header('Location: login.php');
}