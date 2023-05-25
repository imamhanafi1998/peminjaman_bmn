<?php
session_start();
include 'connection.php';
$nip = $_POST['nip'];
$password = $_POST['password'];
$query = "select * from user where nip = '$nip' && password = '$password'";
$hasil = mysqli_query($connection, $query);
$baris = mysqli_fetch_array($hasil, MYSQLI_ASSOC);
if (empty($baris)) {
	header('location:login.php');
} else {
	if ($baris['nip'] == '999') {
		$_SESSION['id_user'] = $baris['id'];
		$_SESSION['status_user'] = 'admin';
		header('location:dashboard.php');
	} else {
		$_SESSION['id_user'] = $baris['id'];
		$_SESSION['status_user'] = 'user';
		header('location:dashboard.php');
	}
}
?>