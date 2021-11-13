<?php

session_start();
$conn = mysqli_connect('localhost', 'root', '', 'toko_online_trainit_remake_2');
if (!isset($_SESSION['admin'])) {
    echo "  <script>
                alert('Anda belum login')
                location = 'login.php'
                </script>";
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <script src="assets/js/jquery-1.10.2.js"></script>
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Binary admin</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Last access : 30 May 2014 &nbsp; <a href="#" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
                    
                    <li><a href="index.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>

                    <li><a href="index.php?halaman=kategori"><i class="fa fa-tag"></i>Kategori</a></li>

                    <li><a href="index.php?halaman=produk"><i class="fa fa-tags"></i>Produk</a></li>
                    

                    <li><a href="index.php?halaman=pembelian"><i class="fa fa-shopping-cart"></i>Pembelian</a></li>
                    
                    <li><a href="index.php?halaman=laporan"><i class="fa fa-file"></i>Laporan</a></li>

                    <li><a href="index.php?halaman=pelanggan"><i class="fa fa-users"></i>Pelanggan</a></li>

                    <li><a href="index.php?halaman=logout"><i class="fa fa-sign-out"></i>Logout</a></li>
                    
                     
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <?php
                    if (isset($_GET['halaman'])) {
                        if ($_GET['halaman'] === 'pelanggan') {
                            include 'pelanggan.php';
                        }else if($_GET['halaman'] === 'produk'){
                            include 'produk.php';
                        }else if($_GET['halaman'] === 'pembelian'){
                            include 'pembelian.php';
                        }else if($_GET['halaman'] === 'logout'){
                            include 'logout.php';
                        }else if($_GET['halaman'] === 'detailPembelian'){
                            include 'detailPembelian.php';
                        }else if($_GET['halaman'] === 'tambahProduk'){
                            include 'tambahProduk.php';
                        }else if($_GET['halaman'] === 'ubahProduk'){
                            include 'ubahProduk.php';
                        }else if($_GET['halaman'] === 'hapusProduk'){
                            include 'hapusProduk.php';
                        }else if($_GET['halaman'] === 'hapusPelanggan'){
                            include 'hapusPelanggan.php';
                        }else if($_GET['halaman'] === 'logout'){
                            include 'logout.php';
                        }else if($_GET['halaman'] === 'lihatPembayaran'){
                            include 'lihatPembayaran.php';
                        }else if($_GET['halaman'] === 'laporan'){
                            include 'laporan.php';
                        }else if($_GET['halaman'] === 'kategori'){
                            include 'kategori.php';
                        }else if($_GET['halaman'] === 'tambahKategori'){
                            include 'tambahKategori.php';
                        }else if($_GET['halaman'] === 'hapusKategori'){
                            include 'hapusKategori.php';
                        }else if($_GET['halaman'] === 'ubahKategori'){
                            include 'ubahKategori.php';
                        }

                    }else{
                        include 'home.php';
                    }
                ?>            
                 <!-- /. ROW  -->
            </div>              
        </div>              
                  
                 <!-- /. ROW  -->           
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
