<?php
require 'koneksi.php';
session_destroy();
echo "	<script>
					alert('Anda Berhasil Logout')
					location = 'login.php'
				</script>";

?>