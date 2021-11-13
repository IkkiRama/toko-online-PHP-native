<?php

$ambil = $conn->query("SELECT * FROM produk LEFT JOIN kategori ON produk.id_kategori = kategori.id_kategori");
$data = [];

while($pecah = $ambil->fetch_assoc()){
	$data[] = $pecah;
}



?>


<div class="row">
    <div class="col-md-12">
    	<h2>Daftar Produk</h2>
    </div>
</div>

<a href="index.php?halaman=tambahProduk" class="btn btn-primary">Tambah Produk</a>
<br>
<br>
<table class="table table-bordered table-hover table-striped">
	<thead>
		<tr>
			<th>No</th>
			<th>Foto</th>
			<th>Nama</th>
			<th>Kategori</th>
			<th>Harga</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($data as $key => $value): ?>
		<tr>
			<td><?php echo $key+1 ?></td>
			<td>
				<img src="../foto sampul/<?php echo $value['foto_produk'] ?>" style="width: 100px;height: 100px;">
			</td>
			<td><?php echo $value['nama_produk'] ?></td>
			<td><?php echo $value['nama_kategori'] ?></td>
			<td>Rp <?php echo number_format($value['harga_produk']) ?></td>
			<td>
				<a class="btn btn-warning" href="index.php?halaman=ubahProduk&id=<?php echo $value['id_produk'] ?>">Ubah</a>
				<a class="btn btn-danger" href="index.php?halaman=hapusProduk&id=<?php echo $value['id_produk'] ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
			</td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>
