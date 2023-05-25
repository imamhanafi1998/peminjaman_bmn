<?php
include 'connection.php';
$nama = $_POST['nama'];
$nip = $_POST['nip'];
$password = $_POST['password'];
$jabatan = $_POST['jabatan'];
$no_telp = $_POST['no_telp'];
$query = "insert into user (nip, nama_lengkap, password, jabatan, no_telp) values ('$nip','$nama', '$password', '$jabatan', '$no_telp')";
mysqli_query($connection, $query);
header('location:login.php');
?>