<?php
require 'koneksi.php';

if (empty($_SESSION['pelanggan'])) {
	echo "	<script>
					alert('Anda belum login, silahkan login dahulu')
					location = 'login.php'
				</script>";
}


$id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
$ambil = $conn->query("SELECT * FROM pembelian WHERE id_pelanggan = '$id_pelanggan' ");
$hitungRiwayat = $ambil->num_rows;



$data = [];
while($pecah = $ambil->fetch_assoc()){
	$data[] = $pecah;
}
?>
<!-- <pre><?php //var_dump($data) ?></pre> -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Riwayat Pembelian</title>
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
			<h1>Riwayat Pembelian</h1>

			<?php if ($hitungRiwayat === 0) { ?>
				<h3>Anda belum mempunyai riwayat belanja, silahkan belanja terlebih dahulu</h3>
			<?php }else{ ?>
				<table class="table table-bordered table-hover table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Tanggal</th>
							<th>Total</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($data as $key => $value): ?>
						<tr>
							<td><?php echo $key+1 ?></td>
							<td><?php echo $value['tanggal_pembelian'] ?></td>
							<td>Rp <?php echo number_format($value['total_pembelian']) ?></td>
							<td>
								<?php echo $value['status_pembelian'] ?><br>
								<?php if (!empty($value['resi_pengiriman'])): ?>
									Resi : <?php echo $value['resi_pengiriman'] ?>
								<?php endif ?>
							</td>
							
							<td>
								<a href="nota.php?id=<?php echo $value['id_pembelian'] ?>" class="btn btn-primary">Nota</a>
			
								<?php if ($value['status_pembelian'] === 'PENDING'){ ?>
									<a href="kirimPembayaran.php?id=<?php echo $value['id_pembelian'] ?>" class="btn btn-danger">Kirim Pembayaran</a>
								<?php }else{ ?>
									<a href="lihatPembayaran.php?id=<?php echo $value['id_pembelian'] ?>" class="btn btn-success">Lihat Pembayaran</a>
								<?php } ?>
			
							</td>
						</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			<?php } ?>
		</div>
	</section>



</body>
</html>