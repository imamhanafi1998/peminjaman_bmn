<?php
session_start();
include 'connection.php';
if (empty($_SESSION['id_user'])) {
	header('location:login.php');
}
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
if ($_SESSION['status_user'] == 'admin') {
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Sistem Informasi Peminjaman BMN</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body>
		<div style="margin-top: 80px" class="container">
			<center>
				<h3>DASHBOARD</h3>
			</center>
			<div class="card border-dark mb-3">
				<div class="card-header">INFO USER</div>
				<div class="card-body text-dark">
					<div class="row">
						<div class="col-3"><p class="card-text">NAMA LENGKAP<br><?= $baris['nama_lengkap']; ?></p></div>
						<div class="col-3"><p class="card-text">NIP<br><?= $baris['nip']; ?></p></div>
						<div class="col-3"><p class="card-text">JABATAN<br><?= $baris['jabatan']; ?></p></div>
						<div class="col-3"><p class="card-text">NO. TELEPON<br><?= $baris['no_telp']; ?></p></div>
					</div>
				</div>
				<div class="card-footer"><a href="logout.php" class="btn bg-primary text-white">LOGOUT</a></div>
			</div><br><br><br>
			<form action="dashboard.php" method="get">
				FILTER TANGGAL PENGAJUAN : <select name="tgl_pengajuan">
					<?php
					$query3 = "select distinct(tgl_pengajuan) from data_peminjaman_bmn";
					$hasil3 = mysqli_query($connection, $query3);
					while ($baris3 = mysqli_fetch_array($hasil3, MYSQLI_ASSOC)) {
						?>
						<option value="<?= $baris3['tgl_pengajuan']; ?>"><?= $baris3['tgl_pengajuan']; ?></option>
						<?php
					}
					?>
				</select>
				<input class="btn btn-sm bg-primary text-white" type="submit" value="OK">
			</form>
			<?php
			if (isset($_GET['tgl_pengajuan'])) {
				$tgl_pengajuan = $_GET['tgl_pengajuan'];
				$query2 = "select * from data_peminjaman_bmn inner join user on id_peminjam = id where tgl_pengajuan = '$tgl_pengajuan'";
				$hasil2 = mysqli_query($connection, $query2);
			} else {
				$query2 = "select * from data_peminjaman_bmn inner join user on id_peminjam = id";
				$hasil2 = mysqli_query($connection, $query2);
			}
			?>
		</div>
		<div style="margin-left: 3%; margin-right: 3%" class="mb-5">
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col">NIP PEMINJAM</th>
						<th scope="col">NAMA BMN</th>
						<th scope="col">TANGGAL PENGAJUAN</th>
						<th scope="col">ALASAN PEMINJAMAN</th>
						<th scope="col">TANGGAL MULAI PEMINJAMAN</th>
						<th scope="col">TANGGAL SELESAI PEMINJAMAN</th>
						<th scope="col">STATUS PEMINJAMAN</th>
						<th colspan="2" scope="col"><center>OPSI</center></th>
					</tr>
				</thead>
				<tbody>
					<?php
					while ($baris2 = mysqli_fetch_array($hasil2, MYSQLI_ASSOC)) {
						?>
						<tr>
							<td><?= $baris2['nip']; ?></td>
							<td><?= $baris2['nama_bmn']; ?></td>
							<td><?= $baris2['tgl_pengajuan']; ?></td>
							<td><?= $baris2['alasan_peminjaman']; ?></td>
							<td><?= $baris2['tgl_mulai_peminjaman']; ?></td>
							<td><?= $baris2['tgl_selesai_peminjaman']; ?></td>
							<td><?= $baris2['status_peminjaman']; ?></td>
							<?php
							if ($baris2['status_peminjaman'] == 'MENUNGGU') {
								?>
								<td><a class="btn bg-success text-white" href="persetujuan.php?y=<?= $baris2['id_peminjaman']; ?>">SETUJUI</a></td>
								<td><a class="btn bg-danger text-white" href="persetujuan.php?n=<?= $baris2['id_peminjaman']; ?>">TOLAK</a></td>
								<?php
							} else {
								?>
								<td colspan="2">-</td>
								<?php
							}
							?>

						</tr>
						<?php
					}
					?>
				</tbody>
			</table>
		</div>
	</body>
	</html>
	<?php
} elseif ($_SESSION['status_user'] = 'user') {
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Sistem Informasi Peminjaman BMN</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body>

		<div style="margin-top: 80px" class="container">
			<center>
				<h3>DASHBOARD</h3>
			</center>
			<div class="card border-dark mb-3">
				<div class="card-header">INFO USER</div>
				<div class="card-body text-dark">
					<div class="row">
						<div class="col-3"><p class="card-text">NAMA LENGKAP<br><?= $baris['nama_lengkap']; ?></p></div>
						<div class="col-3"><p class="card-text">NIP<br><?= $baris['nip']; ?></p></div>
						<div class="col-3"><p class="card-text">JABATAN<br><?= $baris['jabatan']; ?></p></div>
						<div class="col-3"><p class="card-text">NO. TELEPON<br><?= $baris['no_telp']; ?></p></div>
					</div>
				</div>
				<div class="card-footer"><a href="logout.php" class="btn bg-primary text-white">LOGOUT</a></div>
			</div><br><br><br>
			<a class="btn bg-primary text-white" href="buat_peminjaman.php">BUAT PEMINJAMAN</a>
			<br><br>
			<form action="dashboard.php" method="get">
				FILTER TANGGAL PENGAJUAN : <select name="tgl_pengajuan">
					<?php
					$query3 = "select distinct(tgl_pengajuan) from data_peminjaman_bmn where id_peminjam = '$id_user'";
					$hasil3 = mysqli_query($connection, $query3);
					while ($baris3 = mysqli_fetch_array($hasil3, MYSQLI_ASSOC)) {
						?>
						<option value="<?= $baris3['tgl_pengajuan']; ?>"><?= $baris3['tgl_pengajuan']; ?></option>
						<?php
					}
					?>
				</select>
				<input class="btn btn-sm bg-primary text-white" type="submit" value="OK">
			</form>
			<?php
			if (isset($_GET['tgl_pengajuan'])) {
				$tgl_pengajuan = $_GET['tgl_pengajuan'];
				$query2 = "select * from data_peminjaman_bmn where id_peminjam = '$id_user' and tgl_pengajuan = '$tgl_pengajuan'";
				$hasil2 = mysqli_query($connection, $query2);
			} else {
				$query2 = "select * from data_peminjaman_bmn where id_peminjam = '$id_user'";
				$hasil2 = mysqli_query($connection, $query2);	
			}
			?>
		</div>
		<div style="margin-left: 3%; margin-right: 3%" class="mb-5">
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col">NAMA BMN</th>
						<th scope="col">TANGGAL PENGAJUAN</th>
						<th scope="col">ALASAN PEMINJAMAN</th>
						<th scope="col">TANGGAL MULAI PEMINJAMAN</th>
						<th scope="col">TANGGAL SELESAI PEMINJAMAN</th>
						<th scope="col">STATUS PEMINJAMAN</th>
						<th scope="col">CETAK</th>
					</tr>
				</thead>
				<tbody>
					<?php
					while ($baris2 = mysqli_fetch_array($hasil2, MYSQLI_ASSOC)) {
						?>
						<tr>
							<td><?= $baris2['nama_bmn']; ?></td>
							<td><?= $baris2['tgl_pengajuan']; ?></td>
							<td><?= $baris2['alasan_peminjaman']; ?></td>
							<td><?= $baris2['tgl_mulai_peminjaman']; ?></td>
							<td><?= $baris2['tgl_selesai_peminjaman']; ?></td>
							<td><?= $baris2['status_peminjaman']; ?></td>

							<?php
							if ($baris2['status_peminjaman'] == 'DISETUJUI') {
								?>
								<td><a class="btn bg-primary text-white" href="cetak.php?id_peminjaman=<?= $baris2['id_peminjaman']; ?>">CETAK</a></td>
								<?php
							} else {
								?>
								<td>-</td>
								<?php
							}
							?>

						</tr>
						<?php
					}
					?>
				</tbody>
			</table>
		</div>
	</body>
	</html>
	<?php
}
?>