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



$ambil = $conn->query("SELECT * FROM produk WHERE id_produk = '$id' ");
$pecah = $ambil->fetch_assoc();

?>

<!-- <pre><?php //print_r($pecah) ?></pre> -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Kimak Mebel</title>
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
			<h1>Detail Produk</h1>
			<div class="row">
				<div class="col-md-6">
					<img src="foto produk/<?php echo $pecah['foto_produk'] ?>" class="img-responsive img-thumbnail">
				</div>

				<div class="col-md-6">
					<h2><?php echo $pecah['nama_produk'] ?></h2>
					<h4>Rp <?php echo number_format($pecah['harga_produk']) ?></h4>

					<h5>Stok : <?php echo $pecah['stok_produk'] ?></h5>
					
					<form action="" method="post">
						<div class="form-group">
							<div class="input-group">
								<input type="number" class="form-control" name="jumlah" min="1" max="<?php echo $pecah['stok_produk'] ?>">
								<div class="input-group-btn">
									<button class="btn btn-primary" name="beli">Beli</button>
								</div>
							</div>
						</div>
					</form>

				</div>

				<div class="col-md-12" style="margin-top: 30px;">
					<p><?php echo $pecah['deskripsi_produk'] ?></p>
				</div>
			</div>
		</div>
	</section>



</body>
</html>

<?php

if (isset($_POST['beli'])) {
	$jumlah = htmlspecialchars($_POST['jumlah']);
	$id_produk = $pecah['id_produk'];
	if (empty($jumlah)) {
	echo "	<script>
					alert('Harap masukkan jumlah')
					location = 'detail.php?id=$id'
				</script>";
	}

	$_SESSION['keranjang'][$id_produk] += $jumlah;

		echo "	<script>
					alert('Produk berhasil ditambahkan ke keranjang')
					location = 'keranjang.php'
				</script>";
}

?>