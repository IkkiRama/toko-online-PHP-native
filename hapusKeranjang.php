<?php

session_start();
$id = $_GET['id'];
if (!isset($_SESSION['pelanggan'])) {
     echo "  <script>
                alert('Anda sudah login')
                location = 'index.php'
                </script>";
}


if (empty($id)) {
	echo "	<script>
					alert('Jangan nakal')
					location = 'index.php'
				</script>";
}

unset($_SESSION['keranjang'][$id]);

echo "	<script>
					alert('Produk berhasil dihapus dari keranjang')
					location = 'keranjang.php'
				</script>";

?>