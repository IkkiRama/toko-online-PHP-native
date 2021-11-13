<div class="row">
    <div class="col-md-12">
    	<h2>Tambah Kategori</h2>
    </div>
</div>


<form action="" enctype="multipart/form-data" method="post">
	<div class="form-group">
		<label for="nama">Nama</label>
		<input type="text" id="nama" class="form-control" name="nama">
	</div>

	<button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
</form>


<?php

if (isset($_POST['tambah'])) {
	$nama = htmlspecialchars($_POST['nama']);

	if (empty($nama)){
		echo "	<script>
				alert('Harap isi semua formulir')
				location = 'index.php?halaman=tambahKategori'
				</script>";
		die;
	}


	$conn->query("INSERT INTO kategori VALUES(null, '$nama')");


	echo "	<script>
				alert('Data Berhasil Ditambahkan')
				location = 'index.php?halaman=kategori'
			</script>";

}


?>