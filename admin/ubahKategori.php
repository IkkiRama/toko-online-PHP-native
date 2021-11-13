<?php
$id = $_GET['id'];
if (empty($id)) {
	echo "	<script>
				alert('Jangan nakal')
				location = 'index.php?halaman=produk'
			</script>";
}

$ambil = $conn->query("SELECT * FROM kategori WHERE id_kategori = '$id' ");
$pecah = $ambil->fetch_assoc();


?>

<div class="row">
    <div class="col-md-12">
    	<h2>Ubah Kategori</h2>
    </div>
</div>


<form action="" enctype="multipart/form-data" method="post">
	<div class="form-group">
		<label for="nama">Nama</label>
		<input value="<?php echo $pecah['nama_kategori'] ?>" type="text" id="nama" class="form-control" name="nama">
	</div>
	<button type="submit" name="ubah" class="btn btn-warning">Ubah</button>
</form>


<?php

if (isset($_POST['ubah'])) {
	$nama = htmlspecialchars($_POST['nama']);


	if (empty($nama)){
		echo "	<script>
				alert('Harap isi semua formulir')
				location = 'index.php?halaman=ubahKategori&id=$id'
				</script>";die;
	}

	$conn->query("UPDATE kategori SET nama_kategori = '$nama' WHERE id_kategori = '$id' ");


	echo "	<script>
				alert('Data Berhasil Diubah')
				location = 'index.php?halaman=kategori'
			</script>";

}


?>