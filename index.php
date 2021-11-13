<?php

require 'koneksi.php';


if (empty($_SESSION['pelanggan'])) {
	echo "	<script>
					alert('Anda belum login, silahkan login dahulu')
					location = 'login.php'
				</script>";
}


$ambil = $conn->query("SELECT * FROM produk");

$data = [];

while($pecah = $ambil->fetch_assoc()){
	$data[] = $pecah;
}

?>

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

			<form action="pencarian.php" class="navbar-form navbar-right" method="get">
				<input type="text" class="form-control" name="keyword">
				<button class="btn btn-primary" type="submit">Cari</button>
			</form>
		</div>
	</nav>

	<!-- <pre><?php //var_dump($_SESSION['pelanggan']) ?></pre> -->

	<section class="konten">
		<div class="container">
			<h1>Produk Terbaru</h1>

			<div class="row">
				<?php foreach ($data as $key => $value): ?>
				<div class="col-md-3">
					<div class="thumbnail">
						<img src="foto produk/<?php echo $value['foto_produk'] ?>" style="width: 100%;height: 200px;">

						<div class="caption">
							<h3><?php echo $value['nama_produk'] ?></h3>
							<h5>Rp <?php echo number_format($value['harga_produk']) ?></h5>
							<a href="beli.php?id=<?php echo $value['id_produk'] ?>" class="btn btn-primary">Beli</a>
							<a href="detail.php?id=<?php echo $value['id_produk'] ?>" class="btn btn-info">Detail</a>
						</div>
					</div>
				</div>
				<?php endforeach ?>


			</div>
		</div>
	</section>



</body>
</html>