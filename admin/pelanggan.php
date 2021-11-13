<?php

$ambil = $conn->query("SELECT * FROM pelanggan");
$data = [];

while($pecah = $ambil->fetch_assoc()){
	$data[] = $pecah;
}



?>


<div class="row">
    <div class="col-md-12">
    	<h2>Daftar Pelanggan</h2>
    </div>
</div>

<table class="table table-bordered table-hover table-striped">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Telepon</th>
			<th>Alamat</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($data as $key => $value): ?>
		<tr>
			<td><?php echo $key+1 ?></td>
			<td><?php echo $value['nama_pelanggan'] ?></td>
			<td><?php echo $value['email_pelanggan'] ?></td>
			<td><?php echo $value['telepon_pelanggan'] ?></td>
			<td><?php echo $value['alamat_pelanggan'] ?></td>
			<td>
				<a class="btn btn-warning" href="index.php?halaman=ubahPelanggan&id=<?php echo $value['id_pelanggan'] ?>">Ubah</a>
				<a class="btn btn-danger" href="index.php?halaman=hapusPelanggan&id=<?php echo $value['id_pelanggan'] ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
			</td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>
