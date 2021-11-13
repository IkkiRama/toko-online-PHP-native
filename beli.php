<?php

require 'koneksi.php';

if (empty($_SESSION['pelanggan'])) {
	echo "	<script>
					alert('Anda belum login, silahkan login dahulu')
					location = 'login.php'
				</script>";
}


$id = $_GET['id'];

if (empty($id)) {
	echo "	<script>
					alert('Jangan nakal')
					location = 'index.php'
				</script>";
}

if (isset($_SESSION['keranjang'][$id])) {
	$_SESSION['keranjang'][$id]+=1;
}else{
	$_SESSION['keranjang'][$id]=1;
}



		echo "	<script>
					alert('Produk berhasil ditambahkan ke keranjang')
					location = 'keranjang.php'
				</script>";

?>
