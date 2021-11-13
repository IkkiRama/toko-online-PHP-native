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


$ambil = $conn->query("SELECT * FROM pembayaran WHERE id_pembelian = '$id' ");
$pecah = $ambil->fetch_assoc();




?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Lihat Pembayaran</title>
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
			<h1>Lihat Pembayaran</h1>

			<div class="row">
				<div class="col-md-6">
					<img src="foto bukti pembayaran/<?php echo $pecah['foto_bukti_pembayaran'] ?>" class="img-thumbnail" style="width: 100%;height: 400px;">
				</div>
				<div class="col-md-6">
					<table class="table table-hover table-striped">
						<tr>
							<th>Nama Penyetor</th>
							<td>: <?php echo $pecah['nama_penyetor'] ?></td>
						</tr>

						<tr>
							<th>Bank Penyetor</th>
							<td>: <?php echo $pecah['bank_penyetor'] ?></td>
						</tr>
						
						<tr>
							<th>Jumlah Penyetor</th>
							<td>: Rp <?php echo number_format($pecah['jumlah_pembelian']) ?></td>
						</tr>
					</table>

					<a href="riwayat.php" class="btn btn-primary">Kembali</a>
				</div>
			</div>
		</div>
	</section>



</body>
</html>