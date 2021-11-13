<?php
require 'koneksi.php';

if (empty($_SESSION['pelanggan'])) {
	echo "	<script>
					alert('Anda belum login, silahkan login dahulu')
					location = 'login.php'
				</script>";
}


if (!isset($_SESSION['keranjang'])) {
     echo "  <script>
                alert('Keranjang kosong, silahkan belanja terlebih dahulu')
                location = 'index.php'
                </script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Keranjang</title>
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


	<div class="container">
		<h1>Keranjang</h1>
		<table class="table table-bordered table-hover table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>Subtotal</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$i = 1; 
					foreach ($_SESSION['keranjang'] as $id => $jumlah):
					$ambil = $conn->query("SELECT * FROM produk WHERE id_produk = '$id' ");
					$pecah = $ambil->fetch_assoc();
					$subtotal = $jumlah * $pecah['harga_produk'];
				?>
				<tr>
					<td><?php echo $i ?></td>
					<td><?php echo $pecah['nama_produk'] ?></td>
					<td>RP <?php echo number_format($pecah['harga_produk']) ?></td>
					<td><?php echo $jumlah ?></td>
					<td>Rp <?php echo number_format($subtotal) ?></td>
					<td>
						<a href="hapusKeranjang.php?id=<?php echo $pecah['id_produk'] ?>" class="btn btn-danger">Hapus</a>
					</td>
				</tr>
				<?php 
					$i++;
					endforeach 
				?>
			</tbody>
		</table>

		<a href="checkout.php" class="btn btn-primary">Checkout</a>
		<a href="index.php" class="btn btn-default">Lanjut Belanja</a>
	</div>


</body>
</html>