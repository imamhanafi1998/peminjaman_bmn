<?php
session_start();
include 'connection.php';
if (empty($_SESSION['id_user'])) {
	header('location:login.php');
}
$id_user = $_SESSION['id_user'];
$nama_bmn = $_POST['nama_bmn'];
$alasan_peminjaman = $_POST['alasan_peminjaman'];
$tgl_mulai_peminjaman = $_POST['tgl_mulai_peminjaman'];
$tgl_selesai_peminjaman = $_POST['tgl_selesai_peminjaman'];
$tgl_pengajuan = $_POST['tgl_pengajuan'];
$query = "insert into data_peminjaman_bmn (id_peminjam, nama_bmn, alasan_peminjaman, tgl_mulai_peminjaman, tgl_selesai_peminjaman, tgl_pengajuan) values ('$id_user','$nama_bmn', '$alasan_peminjaman', '$tgl_mulai_peminjaman', '$tgl_selesai_peminjaman', '$tgl_pengajuan')";
mysqli_query($connection, $query);
header('location:dashboard.php');
?>