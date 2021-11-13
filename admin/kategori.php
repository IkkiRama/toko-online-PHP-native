<?php

$ambil = $conn->query("SELECT * FROM kategori");
$data = [];

while($pecah = $ambil->fetch_assoc()){
	$data[] = $pecah;
}


?>

<h2>Daftar Kategori</h2>


<a href="index.php?halaman=tambahKategori" class="btn btn-primary">Tambah Kategori</a>
<br>
<br>
<table class="table table-hover table-striped table-bordered">

	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Aksi</th>
		</tr>
	</thead>

	<tbody>
		<?php foreach ($data as $key => $value): ?>
			
		<tr>
			<td><?php echo $key+1 ?></td>
			<td><?php echo $value['nama_kategori'] ?></td>
			<td>
				<a class="btn btn-warning" href="index.php?halaman=ubahKategori&id=<?php echo $value['id_kategori'] ?>">Ubah</a>
				<a class="btn btn-danger" href="index.php?halaman=hapusKategori&id=<?php echo $value['id_kategori'] ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
			</td>
		</tr>
		<?php endforeach ?>
	</tbody>

</table>