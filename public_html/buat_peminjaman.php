<?php
session_start();
include 'connection.php';
if (empty($_SESSION['id_user'])) {
	header('location:login.html');
} else {
	if ($_SESSION['status_user'] == 'admin') {
		header('location:dashboard.php');
	} else {
		$id_user = $_SESSION['id_user'];
		$query = "select * from user where id = '$id_user'";
		$hasil = mysqli_query($connection, $query);
		$baris = mysqli_fetch_array($hasil, MYSQLI_ASSOC);
		?>
		<nav class="navbar fixed-top navbar-dark bg-dark">
			<div class="container">
				<a class="navbar-brand" href="dashboard.php">SISTEM INFORMASI PEMINJAMAN BARANG MILIK NEGARA</a>
			</div>
		</nav>
		<?php
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<title>
				Sistem Informasi Peminjaman BMN
			</title>
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		</head>
		<body>
			<div style="margin-top: 80px" class="container mb-5">
				<center>
					<h3>DASHBOARD</h3>
				</center>
				<div class="card border-dark mb-3">
					<div class="card-header">INFO USER</div>
					<div class="card-body text-dark">
						<div class="row">
							<div class="col-3"><p class="card-text">NAMA LENGKAP<br><?= $baris['nip']; ?></p></div>
							<div class="col-3"><p class="card-text">NIP<br><?= $baris['nip']; ?></p></div>
							<div class="col-3"><p class="card-text">JABATAN<br><?= $baris['jabatan']; ?></p></div>
							<div class="col-3"><p class="card-text">NO. TELEPON<br><?= $baris['no_telp']; ?></p></div>
						</div>
					</div>
					<div class="card-footer"><a href="logout.php" class="btn bg-primary text-white">LOGOUT</a></div>
				</div>
				<br><br><br>
				<a class="btn bg-primary text-white" href="dashboard.php">KEMBALI KE DASHBOARD</a>
				<div class="card mt-5">
					<div class="card-header"><center><h3>FORM PENGAJUAN PEMINJAMAN BARANG MILIK NEGARA</h3></center></div>
					<div class="card-body">
						<form action="proses_buat_peminjaman.php" method="post" class="">
							<div class="form-group">
								<label >NAMA BMN</label>
								<select class="form-control" name="nama_bmn">
									<option value="Mobil">MOBIL</option>
									<option value=" Motor">MOTOR</option>
									<option value="Laptop">LAPTOP</option>
								</select>
							</div>
							<div class="form-group">
								<label>ALASAN PEMINJAMAN</label>
								<textarea class="form-control" rows="3" required="required" name="alasan_peminjaman"></textarea>
							</div>
							<div class="form-group">
								<label>TANGGAL MULAI PEMINJAMAN BMN</label>
								<input type="date" class="form-control" name="tgl_mulai_peminjaman" min="<?= date('Y-m-d'); ?>" value="<?= date('Y-m-d'); ?>" required="required">
								<input type="hidden" name="tgl_pengajuan" value="<?= date('Y-m-d'); ?>">
							</div>
							<div class="form-group">
								<label>TANGGAL SELESAI PEMINJAMAN BMN</label>
								<input type="date" class="form-control" name="tgl_selesai_peminjaman" min="<?= date('Y-m-d'); ?>" value="<?= date('Y-m-d'); ?>" required="required">
							</div>
							<button type="submit" class="mt-5 btn btn-primary">BUAT</button>
						</form>
					</div>
				</div>
			</div>

		</body>
		</html>
		<?php
	}
}
?>
