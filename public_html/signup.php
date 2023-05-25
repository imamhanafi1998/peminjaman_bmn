<?php
session_start();
if (isset($_SESSION['id_user'])) {
	header('location:dashboard.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Peminjaman BMN</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
	<div class="container">
		<div class="card mt-5 mb-5">
			<div class="card-header"><center><h3>DAFTAR</h3></center></div>
			<div class="card-body">
				<form action="proses_signup.php" method="post" class="">
					<div class="form-group">
						<label>NAMA LENGKAP</label>
						<input type="text" class="form-control" placeholder="NAMA LENGKAP" required="required" name="nama">
					</div>
					<div class="form-group">
						<label>NIP</label>
						<input type="number" class="form-control" placeholder="NIP" required="required" name="nip">
					</div>
					<div class="form-group">
						<label>PASSWORD</label>
						<input type="password" class="form-control" placeholder="PASSWORD" required="required" name="password">
					</div>
					<div class="form-group">
						<label>JABATAN</label>
						<input type="text" class="form-control" placeholder="JABATAN" required="required" name="jabatan">
					</div>
					<div class="form-group">
						<label>NO. TELEPON</label>
						<input type="number" class="form-control" placeholder="NO. TELEPON" required="required" name="no_telp">
					</div>
					<div class="row align-items-center mt-5">
						<div class="col-6"><button type="submit" class="btn btn-primary">DAFTAR</button></div>
						<div class="col-6 text-left"><h5 class="text-right">Sudah punya akun? <a href="login.php">MASUK</a></h5></div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
