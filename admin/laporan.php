<?php

if (empty($_SESSION['admin'])) {
	echo "	<script>
					alert('Anda belum login, silahkan login dahulu')
					location = 'login.php'
				</script>";
}



$data = [];
$tglm = '-';
$tgls = '-';
if (isset($_POST['lihat'])) {
	$tglm = htmlspecialchars($_POST['tglm']);
	$tgls = htmlspecialchars($_POST['tgls']);

	$ambil = $conn->query("SELECT * FROM pembelian pm LEFT JOIN pelanggan pl ON pm.id_pelanggan = pl.id_pelanggan WHERE tanggal_pembelian BETWEEN '$tglm' AND '$tgls' ");
	while($pecah = $ambil->fetch_assoc()){
		$data[] = $pecah;
	}


}



?>

<h2>Laporan Pembelian Dari <?php echo $tglm ?> Sampai <?php echo $tgls ?> </h2>
<br>
<form action="" method="post">
	<div class="row">
		<div class="col-md-5">
			<div class="form-group">
				<label for="tglm">Tanggal Mulai</label>
				<input type="date" name="tglm" id="tglm" class="form-control" value="<?php echo $tglm ?>">
			</div>
		</div>

		<div class="col-md-5">
			<div class="form-group">
				<label for="tgls">Tanggal Selesai</label>
				<input type="date" name="tgls" id="tgls" class="form-control" value="<?php echo $tgls ?>">
			</div>
		</div>

		<div class="col-md-2">
			<div class="form-group">
				<br>
				<button class="btn btn-primary" name="lihat">Lihat</button>
			</div>
		</div>
	</div>
</form>


<table class="table table-hover table-striped table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Pelanggan</th>
			<th>Tanggal Pembelian</th>
			<th>Status</th>
			<th>Jumlah</th>
		</tr>
	</thead>
	<?php if (empty($data)): ?>
		<tbody>
			<tr>
				<td colspan="5"><h3 class="text-center">Data Tidak Tersedia</h3></td>
			</tr>
		</tbody>
	<?php else: ?>
		<tbody>
			<?php
				$Total = 0;
				foreach ($data as $key => $value):
				$Total += $value['total_pembelian'];
			?>
			<tr>
				<td><?php echo $key+1 ?></td>
				<td><?php echo $value['nama_pelanggan'] ?></td>
				<td><?php echo $value['tanggal_pembelian'] ?></td>
				<td>
					<?php echo $value['status_pembelian'] ?><br>
					<?php if (!empty($value['resi_pengiriman'])): ?>
						Resi : <?php echo $value['resi_pengiriman'] ?>
					<?php endif ?>
				</td>
				<td>RP <?php echo number_format($value['total_pembelian']) ?></td>
			</tr>
			<?php endforeach ?>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="4">Total Pembelian</th>
				<td>Rp <?php echo number_format($Total); ?></td>
			</tr>
		</tfoot>
	<?php endif ?>
</table>