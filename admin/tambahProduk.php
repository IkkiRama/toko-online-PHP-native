<?php

$data = [];
$ambil = $conn->query("SELECT * FROM kategori");
while($pecah = $ambil->fetch_assoc()){
	$data[] = $pecah;
}


?>


<div class="row">
    <div class="col-md-12">
    	<h2>Tambah Produk</h2>
    </div>
</div>


<form action="" enctype="multipart/form-data" method="post">
	<div class="form-group">
		<label for="nama">Nama</label>
		<input type="text" id="nama" class="form-control" name="nama">
	</div>

	<div class="form-group">
		<label for="kategori">Kategori</label>
		<select name="kategori" class="form-control">
			<option>Pilih Kategori</option>
			<?php foreach ($data as $key => $value): ?>
			<option value="<?php echo $value['id_kategori'] ?>"><?php echo $value['nama_kategori'] ?></option>
			<?php endforeach ?>
		</select>
	</div>

	<div class="form-group">
		<label for="sampul">Sampul</label>
		<input type="file" id="sampul" class="form-control" name="sampul">
	</div>

	<div class="form-group">
		<label for="harga">Harga</label>
		<input type="number" id="harga" class="form-control" name="harga">
	</div>

	<div class="form-group">
		<label for="berat">Berat</label>
		<input type="number" id="berat" class="form-control" name="berat">
	</div>

	<div class="form-group">
		<label for="stok">Stok</label>
		<input type="number" id="stok" class="form-control" name="stok">
	</div>

	<div class="form-group">
		<label for="foto">Foto</label>
		<div class="letak-input">
			<input type="file" id="foto" class="form-control" name="foto[]" style="margin-bottom: 10px;">
		</div>
		<span class="btn btn-primary btn-tambah">
			<i class="fa fa-plus"></i>
		</span>
	</div>

	<div class="form-group">
		<label for="deskripsi">Deskripsi</label>
		<textarea name="deskripsi" class="form-control" rows="10" cols="5"></textarea>
	</div>

	<button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
</form>

<script type="text/javascript">
	$(document).ready(function() {
		$('.btn-tambah').on('click', function () {
			$('.letak-input').append(`<input type="file" id="foto" class="form-control" name="foto[]" style="margin-bottom: 10px;">`)
		})
	});
</script>


<?php

if (isset($_POST['tambah'])) {
	$nama = htmlspecialchars($_POST['nama']);
	$kategori = htmlspecialchars($_POST['kategori']);
	$harga = htmlspecialchars($_POST['harga']);
	$berat = htmlspecialchars($_POST['berat']);
	$stok = htmlspecialchars($_POST['stok']);
	$deskripsi = htmlspecialchars($_POST['deskripsi']);

	$namaFotoSampul = $_FILES['sampul']['name'];
	$lokasiSampul = $_FILES['sampul']['tmp_name'];
	$typeSampul = $_FILES['sampul']['type'];
	$sizeSampul = $_FILES['sampul']['size'];

	if (empty($nama) ||empty($kategori) || empty($harga) || empty($berat) || empty($stok) ||empty($deskripsi)){
		echo "	<script>
				alert('Harap isi semua formulir')
				location = 'index.php?halaman=tambahProduk'
				</script>";
		die;
	}

	if (empty($lokasiSampul)) {
		echo "	<script>
				alert('Harap upload foto')
				location = 'index.php?halaman=tambahProduk'
				</script>";
		die;
	}

	if ($sizeSampul > 5000000) {
		echo "	<script>
				alert('Size foto terlalu besar')
				location = 'index.php?halaman=tambahProduk'
				</script>";
		die;
	}


	$daftar_ekstensi = ['jpg', 'jpeg', 'png'];
	$ekstensi_file = explode('.', $namaFotoSampul);
	$ekstensi_file = strtolower(end($ekstensi_file));



	if (!in_array($ekstensi_file, $daftar_ekstensi)) {
		echo "	<script>
					alert('Yang anda upload bukan foto')
					location = 'index.php?halaman=tambahProduk'
				</script>";
		die;
	}



	if ($typeSampul !== "image/jpeg" && $typeSampul !==  "image/png" ) {
		echo "	<script>
					alert('Yang anda pilih bukan foto')
					location = 'index.php?halaman=tambahProduk'
				</script>";
		die;
	}

	$namaFiks = uniqid();
	$namaFiks .= '.';
	$namaFiks .= $ekstensi_file;
	move_uploaded_file($lokasiSampul, '../foto sampul/'.$namaFiks);



	$conn->query("INSERT INTO produk VALUES(null, '$kategori', '$nama', '$harga', '$stok', '$berat', '$deskripsi', '$namaFiks')");

	$id_produk = $conn->insert_id;


	$namaFoto = $_FILES['foto']['name'];
	$lokasi = $_FILES['foto']['tmp_name'];
	$type = $_FILES['foto']['type'];
	$size = $_FILES['foto']['size'];



	foreach ($namaFoto as $key => $tiap_namaFoto) {
		$tiap_lokasi = $lokasi[$key];
		$tiap_type = $type[$key];
		$tiap_size = $size[$key];


		if (empty($tiap_lokasi)) {
			echo "	<script>
					alert('Harap upload foto')
					location = 'index.php?halaman=tambahProduk'
					</script>";
			die;
		}

		if ($tiap_size > 5000000) {
			echo "	<script>
					alert('Size foto terlalu besar')
					location = 'index.php?halaman=tambahProduk'
					</script>";
			die;
		}


		$daftar_ekstensi = ['jpg', 'jpeg', 'png'];
		$ekstensi_file = explode('.', $tiap_namaFoto);
		$ekstensi_file = strtolower(end($ekstensi_file));



		if (!in_array($ekstensi_file, $daftar_ekstensi)) {
			echo "	<script>
						alert('Yang anda upload bukan foto')
						location = 'index.php?halaman=tambahProduk'
					</script>";
			die;
		}



		if ($tiap_type !== "image/jpeg" && $tiap_type !==  "image/png" ) {
			echo "	<script>
						alert('Yang anda pilih bukan foto')
						location = 'index.php?halaman=tambahProduk'
					</script>";
			die;
		}

		$namaFiksFoto = uniqid();
		$namaFiksFoto .= '.';
		$namaFiksFoto .= $ekstensi_file;
		move_uploaded_file($tiap_lokasi, '../foto produk/'.$namaFiksFoto);

		$conn->query("INSERT INTO foto_produk VALUES(null, '$id_produk', '$namaFiksFoto')");



	}


	echo "	<script>
				alert('Data Berhasil Ditambahkan')
				location = 'index.php?halaman=produk'
			</script>";



}


?>