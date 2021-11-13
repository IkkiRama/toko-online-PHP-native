<?php

$id = $_GET['id'];
if (empty($id)) {
		echo "	<script>
					alert('Jangan nakal')
					location = 'index.php?halaman=pelanggan'
				</script>";
}


$conn->query("DELETE FROM pelanggan WHERE id_pelanggan = '$id' ");

echo "	<script>
				alert('Data Berhasil Dihapus')
				location = 'index.php?halaman=pelanggan'
		</script>";


?>