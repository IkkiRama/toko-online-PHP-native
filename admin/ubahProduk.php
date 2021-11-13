<?php
$id = $_GET['id'];
if (empty($id)) {
	echo "	<script>
				alert('Jangan nakal')
				location = 'index.php?halaman=produk'
			</script>";
}

$ambil = $conn->query("SELECT * FROM produk WHERE id_produk = '$id' ");
$pecah = $ambil->fetch_assoc();


$data = [];
$ambilKategori = $conn->query("SELECT * FROM kategori");
while($pecahKategori = $ambilKategori->fetch_assoc()){
	$data[] = $pecahKategori;
}

?>

<div class="row">
    <div class="col-md-12">
    	<h2>Ubah Produk</h2>
    </div>
</div>


<form action="" enctype="multipart/form-data" method="post">
	<div class="form-group">
		<label for="nama">Nama</label>
		<input value="<?php echo $pecah['nama_produk'] ?>" type="text" id="nama" class="form-control" name="nama">
	</div>

	<div class="form-group">
		<label for="kategori">Kategori</label>
		<select name="kategori" class="form-control">
			<option>Pilih Kategori</option>
			<?php foreach ($data as $key => $value): ?>
			<option value="<?php echo $value['id_kategori'] ?>" <?php if($pecah['id_kategori'] === $value['id_kategori']){ echo "selected"; } ?>><?php echo $value['nama_kategori'] ?></option>
			<?php endforeach ?>
		</select>
	</div>

	<div class="form-group">
		<label for="harga">Harga</label>
		<input value="<?php echo $pecah['harga_produk'] ?>" type="number" id="harga" class="form-control" name="harga">
	</div>

	<div class="form-group">
		<label for="berat">Berat</label>
		<input value="<?php echo $pecah['berat_produk'] ?>" type="number" id="berat" class="form-control" name="berat">
	</div>

	<div class="form-group">
		<label for="stok">Stok</label>
		<input value="<?php echo $pecah['stok_produk'] ?>" type="number" id="stok" class="form-control" name="stok">
	</div>

	<div class="form-group">
		<label for="foto">Foto</label><br>
		<img src="../foto produk/<?php echo $pecah['foto_produk'] ?>"style="width: 100px;height: 100px;">
		<input type="file" id="foto" class="form-control" name="foto">
	</div>

	<div class="form-group">
		<label for="deskripsi">Deskripsi</label>
		<textarea name="deskripsi" class="form-control" rows="10" cols="5"><?php echo $pecah['deskripsi_produk'] ?></textarea>
	</div>

	<button type="submit" name="ubah" class="btn btn-warning">Ubah</button>
</form>


<?php

if (isset($_POST['ubah'])) {
	$nama = htmlspecialchars($_POST['nama']);
	$kategori = htmlspecialchars($_POST['kategori']);
	$harga = htmlspecialchars($_POST['harga']);
	$berat = htmlspecialchars($_POST['berat']);
	$stok = htmlspecialchars($_POST['stok']);
	$deskripsi = htmlspecialchars($_POST['deskripsi']);

	$namaFoto = $_FILES['foto']['name'];
	$lokasi = $_FILES['foto']['tmp_name'];
	$type = $_FILES['foto']['type'];
	$size = $_FILES['foto']['size'];


	if (empty($kategori) ||empty($nama) || empty($harga) || empty($berat) || empty($stok) ||empty($deskripsi)){
		echo "	<script>
				alert('Harap isi semua formulir')
				location = 'index.php?halaman=ubahProduk&id=$id'
				</script>";die;
	}




	if (empty($lokasi)) {

		$conn->query("UPDATE produk SET id_kategori = '$kategori',
										nama_produk = '$nama',
										harga_produk = '$harga',
										stok_produk = '$stok',
										berat_produk = '$berat',
										deskripsi_produk = '$deskripsi'
										WHERE id_produk = '$id'
		");

	}else{

		if ($size > 5000000) {
			echo "	<script>
					alert('Size foto terlalu besar')
					location = 'index.php?halaman=ubahProduk&id=$id'
					</script>";die;
		}


		$daftar_ekstensi = ['jpg', 'jpeg', 'png'];
		$ekstensi_file = explode('.', $namaFoto);
		$ekstensi_file = strtolower(end($ekstensi_file));



		if (!in_array($ekstensi_file, $daftar_ekstensi)) {
			echo "	<script>
						alert('Yang anda upload bukan foto')
						location = 'index.php?halaman=ubahProduk&id=$id'
					</script>";die;
		}



		if ($type !== "image/jpeg" && $type !==  "image/png" ) {
			echo "	<script>
						alert('Yang anda pilih bukan foto')
						location = 'index.php?halaman=ubahProduk&id=$id'
					</script>";die;
		}


		$namaFiks = uniqid();
		$namaFiks .= '.';
		$namaFiks .= $ekstensi_file;
		move_uploaded_file($lokasi, '../foto produk/'.$namaFiks);

		$conn->query("UPDATE produk SET id_kategori = '$kategori',
										nama_produk = '$nama',
										harga_produk = '$harga',
										stok_produk = '$stok',
										berat_produk = '$berat',
										deskripsi_produk = '$deskripsi',
										foto_produk = '$namaFiks'
										WHERE id_produk = '$id'
		");
		
	}


	echo "	<script>
				alert('Data Berhasil Diubah')
				location = 'index.php?halaman=produk'
			</script>";

}


?>