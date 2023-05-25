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
			<div class="card-header"><center><h3>MASUK</h3></center></div>
			<div class="card-body">
				<form action="proses_login.php" method="post" class="">
					<div class="form-group">
						<label>NIP</label>
						<input type="number" class="form-control" name="nip" placeholder="NIP">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" name="password" placeholder="PASSWORD">
					</div>
					<div class="row align-items-center mt-5">
						<div class="col-6"><button type="submit" class="btn btn-primary">MASUK</button></div>
						<div class="col-6 text-left"><h5 class="text-right">Belum punya akun? <a href="signup.php">DAFTAR</a></h5></div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
