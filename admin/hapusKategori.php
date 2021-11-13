<?php

$id = $_GET['id'];
if (empty($id)) {
		echo "	<script>
					alert('Jangan nakal')
					location = 'index.php?halaman=kategori'
				</script>";
}



$conn->query("DELETE FROM kategori WHERE id_kategori = '$id' ");

echo "	<script>
				alert('Data Berhasil Dihapus')
				location = 'index.php?halaman=kategori'
		</script>";



?>