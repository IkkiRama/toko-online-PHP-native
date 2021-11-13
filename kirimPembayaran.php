<?php
require 'koneksi.php';
$id = $_GET['id'];

if (empty($_SESSION['pelanggan'])) {
	echo "	<script>
					alert('Anda belum login, silahkan login dahulu')
					location = 'login.php'
				</script>";
}

if (empty($id)) {
	echo "	<script>
					alert('Jangan nakal')
					location = 'index.php'
				</script>";
}


$ambil = $conn->query("SELECT * FROM pembelian WHERE id_pembelian = '$id' ");
$pecah = $ambil->fetch_assoc();



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Kirim Pembayaran</title>
    <link href="admin/assets/css/bootstrap.css" rel="stylesheet" />
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container">
			<ul class="nav navbar-nav">
				<li><a href="index.php">Home</a></li>
				<li><a href="keranjang.php">Keranjang</a></li>
				<li><a href="checkout.php">Checkout</a></li>
				<li><a href="riwayat.php">Riwayat</a></li>
				<?php if (isset($_SESSION['pelanggan'])){ ?>
				<li><a href="logout.php">Logout</a></li>
				<?php }else{ ?>
				<li><a href="login.php">Login</a></li>
				<?php } ?>
			</ul>
		</div>
	</nav>

	<!-- <pre><?php //var_dump($_SESSION['pelanggan']) ?></pre> -->

	<section class="konten">
		<div class="container">
			<h1>Kirim Pembayaran</h1>

			<div class="alert alert-info">
				Silahkan Kirim pembayaran sebesar <strong>Rp <?php echo number_format($pecah['total_pembelian']) ?></strong>
			</div>

			<form action="" method='post' enctype="multipart/form-data">
				<div class="form-group">
					<label for="penyetor">Nama Pengirim</label>
					<input type="text" class="form-control" name="penyetor" id="penyetor">
				</div>

				<div class="form-group">
					<label for="bank">Nama Bank</label>
					<input type="text" class="form-control" name="bank" id="bank">
				</div>

				<div class="form-group">
					<label for="foto">Foto Bukti</label>
					<input type="file" class="form-control" name="foto" id="foto">
				</div>

				<button name="kirim" class="btn btn-primary">Kirim</button>
			</form>
		</div>
	</section>



</body>
</html>

<?php

if (isset($_POST['kirim'])) {
	$penyetor = htmlspecialchars($_POST['penyetor']);
	$bank = htmlspecialchars($_POST['bank']);
	$id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
	$jumlah_pembelian = $pecah['total_pembelian'];

	$namaFoto = $_FILES['foto']['name'];
	$lokasi = $_FILES['foto']['tmp_name'];
	$error = $_FILES['foto']['error'];
	$type = $_FILES['foto']['type'];
	$size = $_FILES['foto']['size'];


	if (empty($penyetor) && empty($bank)) {
			echo "	<script>
					alert('Harap isi semua formulir')
					location = 'kirimPembayaran.php?id=$id'	
				</script>";
	}

	if (empty($lokasi)) {
		echo "	<script>
					alert('Upload Struk Terlebih dahulu')
					location = 'kirimPembayaran.php?id=$id'	
				</script>";
	}

	if ($size > 5000000) {
		echo "	<script>
				alert('Size foto terlalu besar')
				location = 'kirimPembayaran.php?id=$id'
				</script>";
	}


	$daftar_ekstensi = ['jpg', 'jpeg', 'png'];
	$ekstensi_file = explode('.', $namaFoto);
	$ekstensi_file = strtolower(end($ekstensi_file));



	if (!in_array($ekstensi_file, $daftar_ekstensi)) {
		echo "	<script>
					alert('Yang anda upload bukan foto')
					location = 'kirimPembayaran.php?id=$id'
				</script>";
	}



	if ($type !== "image/jpeg" && $type !==  "image/png" ) {
		echo "	<script>
					alert('Yang anda pilih bukan foto')
					location = 'kirimPembayaran.php?id=$id'
				</script>";
	}

	$namaFiks = uniqid();
	$namaFiks .= '.';
	$namaFiks .= $ekstensi_file;
	move_uploaded_file($lokasi, 'foto bukti pembayaran/'.$namaFiks);

	$status_pembelian = "MENUNGGU KONFIRMASI";

	$conn->query("INSERT INTO pembayaran VALUES(null, '$id_pelanggan', '$id', '$penyetor', '$bank', '$jumlah_pembelian', '$namaFiks')");

	$conn->query("UPDATE pembelian SET status_pembelian = '$status_pembelian' WHERE id_pembelian = '$id' ");

	echo "	<script>
			alert('Pembayaran berhasil. Silahkan tunggu, admin akan mengkonfirmasi dalam waktu 1 * 24 jam')
			location = 'riwayat.php'
		</script>";




}

?>