<?php

$id = $_GET['id'];
if (empty($id)) {
		echo "	<script>
					alert('Jangan nakal')
					location = 'index.php?halaman=produk'
				</script>";
}


$conn->query("DELETE FROM produk WHERE id_produk = '$id' ");

echo "	<script>
				alert('Data Berhasil Dihapus')
				location = 'index.php?halaman=produk'
		</script>";


?>