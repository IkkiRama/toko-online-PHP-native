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

$data = [];
$ambilPembelianProduk = $conn->query("SELECT * FROM pembelian_produk WHERE id_pembelian = '$id' ");
while($pecahPembelianProduk = $ambilPembelianProduk->fetch_assoc()){
	$data[] = $pecahPembelianProduk;
}


if ($_SESSION['pelanggan']['id_pelanggan'] !== $pecah['id_pelanggan']) {
	echo "	<script>
					alert('Jangan nakal')
					location = 'index.php'
				</script>";
}


?>
<!-- <pre><?php //var_dump($pecah) ?></pre>
<pre><?php //var_dump($_SESSION['pelanggan']) ?></pre> -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Nota Pembelian</title>
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
			<h1>Nota Pembelian</h1>

			<div class="row">
			    <div class="col-md-4">
			    	<h3>Pelanggan</h3>
			    	<strong><?php echo $_SESSION['pelanggan']['nama_pelanggan'] ?></strong>
			    	<p>
			    		<span><?php echo $_SESSION['pelanggan']['email_pelanggan'] ?></span><br>
			    		<span><?php echo $_SESSION['pelanggan']['telepon_pelanggan'] ?></span>
			    	</p>
			    </div>

			    <div class="col-md-4">
			    	<h3>Pembelian</h3>
			    	<strong><?php echo $pecah['tanggal_pembelian'] ?></strong>
			    	<p>
			    		<span>Rp <?php echo number_format($pecah['total_pembelian']) ?></span><br>
			    		<span>PENDING</span>
			    	</p>
			    </div>


			    <div class="col-md-4">
			    	<h3>Pengiriman</h3>
			    	<strong><?php echo $pecah['alamat_pengiriman'] ?></strong>
			    	<p>
			    		<span><?php echo $pecah['nama_kota'] ?></span><br>
			    		<span>Rp <?php echo number_format($pecah['tarif']) ?></span>
			    	</p>
			    </div>
			</div>

			<table class="table table-bordered table-hover table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Produk</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Subtotal</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($data as $key => $value):
						$subtotal = $value['harga'] * $value['jumlah'];
					?>	
					<tr>
						<td><?php echo $key+1 ?></td>
						<td><?php echo $value['nama'] ?></td>
						<td>Rp <?php echo number_format($value['harga']) ?></td>
						<td><?php echo $value['jumlah'] ?></td>
						<td>Rp <?php echo number_format($subtotal) ?></td>
					</tr>
					<?php endforeach ?>
				</tbody>
				<tfoot>
					<th colspan="4">Total Pembelian</th>
					<td>Rp <?php echo number_format($pecah['total_pembelian']) ?></td>
				</tfoot>
			</table>

			<div class="alert alert-info">
				Silahkan Bayar Tagihan Anda Sebesar <strong>Rp <?php echo number_format($pecah['total_pembelian'])?></strong> ke <br>
				<strong>BCA 21130330120321 AN. RIFKI ROMADHAN</strong><BR>
				<strong>BRI 43453234325253 AN. RIFKI ROMADHAN</strong><BR>
			</div>

			<a href="riwayat.php" class="btn btn-success">Riwayat Belanja</a>
		</div>
	</section>



</body>
</html>