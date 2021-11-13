<?php
$id = $_GET['id'];



$ambilPembelian = $conn->query("SELECT * FROM pembelian LEFT JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan WHERE pembelian.id_pembelian = '$id' ");

$dataPembelian = $ambilPembelian->fetch_assoc();





$ambilPembelianProduk = $conn->query("SELECT * FROM pembelian_produk  WHERE id_pembelian = '$id' ");

$dataPembelianProduk = [];

while($pecahPembelianProduk = $ambilPembelianProduk->fetch_assoc()){
	$dataPembelianProduk[] = $pecahPembelianProduk;
}


?>

<div class="row">
    <div class="col-md-12">
    	<h2>Detail Pembelian</h2>
    </div>
</div>





<div class="row">
    <div class="col-md-4">
    	<h3>Pelanggan</h3>
    	<strong><?php echo $dataPembelian['nama_pelanggan'] ?></strong>
    	<p>
    		<span><?php echo $dataPembelian['email_pelanggan'] ?></span><br>
    		<span><?php echo $dataPembelian['telepon_pelanggan'] ?></span>
    	</p>
    </div>

    <div class="col-md-4">
    	<h3>Pembelian</h3>
    	<strong><?php echo $dataPembelian['tanggal_pembelian'] ?></strong>
    	<p>
    		<span>Rp <?php echo number_format($dataPembelian['total_pembelian']) ?></span><br>
    		<span><?php echo $dataPembelian['status_pembelian'] ?></span>
    	</p>
    </div>


    <div class="col-md-4">
    	<h3>Pengiriman</h3>
    	<strong><?php echo $dataPembelian['alamat_pengiriman'] ?></strong>
    	<p>
    		<span>Rp <?php echo number_format($dataPembelian['tarif']) ?></span><br>
    		<span><?php echo $dataPembelian['nama_kota'] ?></span><br>
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
			$total = 0;
			foreach ($dataPembelianProduk as $key => $value):
			$subtotal = $value['harga'] * $value['jumlah'];
			$total += $subtotal;
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
		<td>Rp <?php echo number_format($total) ?></td>
	</tfoot>
</table>