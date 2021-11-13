<?php
require '../koneksi.php';

if (isset($_SESSION['admin'])) {
    echo "  <script>
                alert('Anda sudah login')
                location = 'index.php'
                </script>";
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />

    <style type="text/css">
    	.login{
    		width: 500px;
    		height: 300px;
    		padding: 20px;
    		background-color: #fff;
    		box-shadow: 2px 2px 10px 0 rgba(0,0,0,0.2);
    		border-radius: 30px;
    	}
    	.container{
    		width: 100%;
    		height: 100vh;
    		display: flex;
    		align-items: center;
    		justify-content: center;
    	}

    	h1{
    		text-align: center;
    		text-transform: uppercase;
    		font-size: 2.7em;
    	}
    </style>
</head>
<body>
		<div class="container">
	<div class="login">
			<h1>Login</h1>

			<form action="" method="post">
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" name="username" id="username" class="form-control">
				</div>

				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" class="form-control">
				</div>

				<button class="btn btn-primary" name="masuk">Masuk</button>
			</form>
		</div>
	</div>
</body>
</html>
<?php

if (isset($_POST['masuk'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    if (empty($username) && empty($password)){
        echo "  <script>
                alert('Harap isi semua formulir')
                location = 'login.php'
                </script>";
    }

    $ambil = $conn->query("SELECT * FROM admin WHERE username = '$username' AND password = '$password' ");
    $yangCocok = $ambil->num_rows;
    $pecah = $ambil->fetch_assoc();

    if ($yangCocok === 1) {
        $_SESSION['admin'] = $pecah;
         echo "  <script>
                alert('Anda Berhasil Login')
                location = 'index.php'
                </script>";
    }else{
         echo "  <script>
                alert('Anda Gagal Login')
                location = 'login.php'
                </script>";
    }
}

?>
