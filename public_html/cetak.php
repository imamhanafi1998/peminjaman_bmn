<?php
session_start();
include 'connection.php';
if (empty($_SESSION['id_user'])) {
	header('location:login.php');
} else {
	if ($_SESSION['status_user'] == 'admin') {
		header('location:dashboard.php');
	} else {
		require_once 'fpdf/fpdf.php';
		$pdf = new FPDF();
		$now = date('d M Y');
		$id_user = $_SESSION['id_user'];
		$id_peminjaman = $_GET['id_peminjaman'];
		$query = "select * from data_peminjaman_bmn inner join user on id_peminjam = id where id = '$id_user' and id_peminjaman = '$id_peminjaman'";
		$hasil = mysqli_query($connection, $query);
		$baris = mysqli_fetch_array($hasil, MYSQLI_ASSOC);
		if ($baris['status_peminjaman'] != 'DISETUJUI') {
			header('location:dashboard.php');
		}

		$pdf->AddPage();
		$pdf->SetFont('Arial', '', 12);
		$pdf->Write(1,'Panton Labu, '.$now);
		$pdf->Ln(14);
		$pdf->Write(1,'Kepada Yth,');
		$pdf->Ln(7);
		$pdf->Write(1,'Manager PT. PLN PERSERO Panton Labu');
		$pdf->Ln(7);
		$pdf->Write(1,'Di Panton Labu');
		$pdf->Ln(14);
		$pdf->Write(1,'Hal : Surat Peminjaman Barang Milik Negara');
		$pdf->Ln(28);
		$pdf->Write(1,'Dengan Hormat,');
		$pdf->Ln(14);
		$pdf->Write(1,'Yang bertanda tangan dibawah ini,');
		$pdf->Ln(14);
		$pdf->Cell(21, 7, 'Nama', 0, 0, 'L');
		$pdf->Cell(7, 7, ':', 0, 0, 'C');
		$pdf->Cell(70, 7, $baris['nama_lengkap'], 0, 1, 'L');
		$pdf->Cell(21, 7, 'NIP', 0, 0, 'L');
		$pdf->Cell(7, 7, ':', 0, 0, 'C');
		$pdf->Cell(70, 7, $baris['nip'], 0, 1, 'L');
		$pdf->Cell(21, 7, 'Jabatan', 0, 0, 'L');
		$pdf->Cell(7, 7, ':', 0, 0, 'C');
		$pdf->Cell(70, 7, $baris['jabatan'], 0, 1, 'L');
		$pdf->Cell(21, 7, 'No. Telp', 0, 0, 'L');
		$pdf->Cell(7, 7, ':', 0, 0, 'C');
		$pdf->Cell(70, 7, $baris['no_telp'], 0, 1, 'L');
		$pdf->Ln(14);
		$pdf->Write(1,'Melalui surat ini saya bermaksud untuk mengajukan peminjaman BMN,');
		$pdf->Ln(7);
		$pdf->Write(1,'yaitu, '.$baris['nama_bmn']);
		$pdf->Ln(7);
		$pdf->Write(1,'dikarenakan '.$baris['alasan_peminjaman']);
		$pdf->Ln(7);
		$pdf->Write(1,'mulai dari '.$baris['tgl_mulai_peminjaman'].' sampai dengan '.$baris['tgl_selesai_peminjaman']);
		$pdf->Ln(14);
		$pdf->Write(1,'Demikian surat peminjaman BMN ini,');
		$pdf->Ln(7);
		$pdf->Write(1,'atas kebijakannya dari Bapak/Ibu saya mengucapkan terimakasih.');
		$pdf->Ln(28);
		$pdf->Write(1,'Hormat saya,');
		$pdf->Ln(28);
		$pdf->Write(1,'Ttd.');
		$pdf->Ln(7);
		$pdf->Write(1,'('.$baris['nama_lengkap'].')');
		$pdf->Output();
	}
}
?>