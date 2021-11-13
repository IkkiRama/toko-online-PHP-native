<?php
require 'koneksi.php';

if (!isset($_SESSION['keranjang'])) {
     echo "  <script>
                alert('Keranjang kosong, silahkan belanja terlebih dahulu')
                location = 'index.php'
                </script>";
}

if (empty($_SESSION['pelanggan'])) {
	echo "	<script>
					alert('Anda belum login, silahkan login dahulu')
					location = 'login.php'
				</script>";
}


$data = [];
$ambil = $conn->query("SELECT * FROM ongkir");
while($pecah = $ambil->fetch_assoc()){
	$data[] = $pecah;
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Checkout</title>
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



	<div class="container">
		<h1>Checkout</h1>
		<table class="table table-bordered table-hover table-striped" style="margin-top: 20px;">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>Subtotal</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$i = 1;
					$total = 0;
					foreach ($_SESSION['keranjang'] as $id => $jumlah):
					$ambil = $conn->query("SELECT * FROM produk WHERE id_produk = '$id' ");
					$pecah = $ambil->fetch_assoc();
					$subtotal = $jumlah * $pecah['harga_produk'];
					$total += $subtotal;
				?>
				<tr>
					<td><?php echo $i ?></td>
					<td><?php echo $pecah['nama_produk'] ?></td>
					<td>RP <?php echo number_format($pecah['harga_produk']) ?></td>
					<td><?php echo $jumlah ?></td>
					<td>Rp <?php echo number_format($subtotal) ?></td>
				</tr>
				<?php 
					$i++;
					endforeach 
				?>
			</tbody>

			<tfoot>
				<tr>
					<th colspan="4">Total Pembelian</th>
					<td>Rp <?php echo number_format($total) ?></td>
				</tr>
			</tfoot>
		</table>

		<div class="row">

			<form action="" method="post">
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" value="<?php echo $_SESSION['pelanggan']['nama_pelanggan'] ?>" class="form-control" readonly>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" value="<?php echo $_SESSION['pelanggan']['telepon_pelanggan'] ?>" class="form-control" readonly>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<select class="form-control" name="ongkir">
							<option>Pilih Ongkos Kirim</option>
							<?php foreach ($data as $key => $value): ?>
								<option value="<?php echo $value['id_ongkir'] ?>">
									<?php echo $value['nama_kota'] ?>		
									Rp <?php echo number_format($value['tarif']) ?>		
								</option>
							<?php endforeach ?>
						</select>
					</div>
				</div>

				<div class="col-md-12">
					<div class="form-group">
						<label for="alamat">Alamat Pengiriman <span class="text-danger">( Termasuk Kode Pos )</span></label>
						<textarea class="form-control" rows="5" cols="5" placeholder="Tulis Alamat Pengiriman Lengkap Dengan Kode Pos...." name="alamat" id="alamat"></textarea>
					</div>
				</div>

				<div class="col-md-12">
					<button name="checkout" class="btn btn-primary">Checkout</button>
				</div>
			</form>

		</div>
	</div>

<!-- <pre><?php //print_r($_SESSION) ?></pre> -->



</body>
</html>

<?php

if (isset($_POST['checkout'])) {
	$ongkir = htmlspecialchars($_POST['ongkir']);
	$alamat = htmlspecialchars($_POST['alamat']);
	$tanggal_pembelian = date("Y-m-d");
	$id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
	
	if (empty($alamat)) {
		 echo "  <script>
                alert('Isi semua formulir dengan benar')
                location = 'checkout.php'
                </script>";
	}

	// ongkir
	$ambilOngkir = $conn->query("SELECT * FROM ongkir WHERE id_ongkir = '$ongkir' ");
	$arrayOngkir = $ambilOngkir->fetch_assoc();
	$nama_kota = $arrayOngkir['nama_kota'];
	$tarif = $arrayOngkir['tarif'];

	$total_pembelian = $total + $tarif;
	$status_pembelian = 'PENDING';
	$resi_pengiriman = '0';


	// insert tabel pembelian
	$conn->query("INSERT INTO pembelian VALUES(null, '$id_pelanggan', '$tanggal_pembelian', '$alamat','$nama_kota', '$tarif', '$total_pembelian', '$resi_pengiriman', '$status_pembelian') ");

	$id_pembelian = $conn->insert_id;

	foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {

		// ambil produk tiap id
		$amiblProdukKeranjang = $conn->query("SELECT * FROM produk WHERE id_produk = '$id_produk' ");
		$pecahProdukKeranjang = $amiblProdukKeranjang->fetch_assoc();
		$nama_produk = $pecahProdukKeranjang['nama_produk'];
		$harga_produk = $pecahProdukKeranjang['harga_produk'];
		$stok_produk = $pecahProdukKeranjang['stok_produk'];
		$stok_terkini = $stok_produk - $jumlah;
		$berat_produk = $pecahProdukKeranjang['berat_produk'];

		// insert tabel pembelian_produk
		$conn->query("INSERT INTO pembelian_produk VALUES(null, '$id_produk', '$id_pembelian', '$jumlah', '$nama_produk', '$harga_produk', '$stok_produk', '$berat_produk')");


		// Update stok
		$conn->query("UPDATE produk SET stok_produk = '$stok_terkini' WHERE id_produk = '$id_produk' ");

	}


	unset($_SESSION['keranjang']);

	 echo "  <script>
                alert('Checkout Berhasil')
                location = 'nota.php?id=$id_pembelian'
                </script>";
}


?>