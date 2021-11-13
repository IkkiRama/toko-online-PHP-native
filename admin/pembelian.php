<?php

$ambil = $conn->query("SELECT * FROM pembelian LEFT JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan ");
$data = [];

while($pecah = $ambil->fetch_assoc()){
	$data[] = $pecah;
}

?>
<div class="row">
    <div class="col-md-12">
    	<h2>Daftar Pembelian</h2>
    </div>
</div>


<table class="table table-bordered table-hover table-striped">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Pelanggan</th>
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
			<td><?php echo $value['nama_pelanggan'] ?></td>
			<td><?php echo $value['tanggal_pembelian'] ?></td>
			<td>Rp <?php echo number_format($value['total_pembelian']) ?></td>
			<td>
				<?php echo $value['status_pembelian'] ?><br>
					<?php if (!empty($value['resi_pengiriman'])): ?>
					Resi : <?php echo $value['resi_pengiriman'] ?>
					<?php endif ?>

			</td>
			<td>
				<a class="btn btn-primary" href="index.php?halaman=detailPembelian&id=<?php echo $value['id_pembelian'] ?>">Detail</a>
				<?php if ($value['status_pembelian'] !== 'PENDING'){ ?>
					<a class="btn btn-success" href="index.php?halaman=lihatPembayaran&id=<?php echo $value['id_pembelian'] ?>">Lihat Pembayaran</a>
				<?php }?>
			</td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>

