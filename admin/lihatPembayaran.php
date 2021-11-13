<?php
$id = $_GET['id'];
if (empty($_SESSION['admin'])) {
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

$ambilPembelian = $conn->query("SELECT * FROM pembelian WHERE id_pembelian = '$id' ");
$pecahPembelian = $ambilPembelian->fetch_assoc();




?>

<div class="row">
	<div class="col-md-12">	
		<h2>Lihat Pembayaran</h2>

		<div class="row">
			<div class="col-md-6">
				<img src="../foto bukti pembayaran/<?php echo $pecah['foto_bukti_pembayaran'] ?>" class="img-thumbnail" style="width: 100%;height: 400px;margin-bottom: 20px;">
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

			</div>
		</div>
	</div>
	
	<div class="col-md-12">
		<form action="" method="post">
			<div class="form-group">
				<label for="resi">No Resi</label>
				<input type="text" class="form-control" name="resi" id="resi" value="<?php echo $pecahPembelian['resi_pengiriman'] ?>">
			</div>

			<div class="form-group">
				<label for="status">Pilih Status Pembelian</label>
				<select class="form-control" name="status" id="status">
					<option value="SEDANG DIKEMAS" <?php if($pecahPembelian['resi_pengiriman'] === 'SEDANG DIKEMAS'){ echo "selected"; } ?> >Sedang Dikemas</option>
					<option value="SEDANG DIKIRIM">Sedang Dikirim</option>
					<option value="BATAL">Batal</option>
				</select>
			</div>
		
			<button class="btn btn-warning" name="ubah">Ubah</button>
		</form>
	</div>
</div>
<?php

if (isset($_POST['ubah'])) {
	$status = htmlspecialchars($_POST['status']);
	$resi = htmlspecialchars($_POST['resi']);


	$conn->query("UPDATE pembelian SET  resi_pengiriman = '$resi',
										status_pembelian = '$status'
										WHERE id_pembelian = '$id' ");

	 echo "  <script>
                alert('Data berhasil diupdate')
                location = 'index.php?halaman=pembelian'
                </script>";

}

?>