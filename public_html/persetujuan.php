<?php
session_start();
include 'connection.php';
if (empty($_SESSION['id_user'])) {
	header('location:login.php');
}
if (isset($_GET['y'])) {
	$id_peminjaman = $_GET['y'];
	$query = "update data_peminjaman_bmn set status_peminjaman = 'DISETUJUI' where id_peminjaman = '$id_peminjaman'";
	mysqli_query($connection, $query);
	header('location:dashboard.php');
} else {
	$id_peminjaman = $_GET['n'];
	$query2 = "update data_peminjaman_bmn set status_peminjaman = 'DITOLAK' where id_peminjaman = '$id_peminjaman'";
	mysqli_query($connection, $query2);
	header('location:dashboard.php');
}
?>