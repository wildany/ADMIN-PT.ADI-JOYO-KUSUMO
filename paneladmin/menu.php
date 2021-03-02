<?php 
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  include "file/404.html";
}
else{

include 'config/koneksi.php';

$nama = $_SESSION['nama_pegawai'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>PT.Adi Joyo Kusumo</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <script src="lib/chart-master/Chart.js"></script>

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <!-- sidebar -->
   <li class="sub-menu">
            
            <a href="javascript:;">
              <i class="fa fa-th"></i>
              <span>Master Produk</span>
              </a>
            <ul class="sub">
              <li><a href="?p=daftarproduk">Daftar Produk</a></li>
              <li><a href="?p=kategori">Kategori Produk</a></li>
              <li><a href="?p=sub">Riwayat</a></li>
              
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-cogs"></i>
              <span>Pengguna</span>
              </a>
            <ul class="sub">
              <li><a href="grids.html">Edit Profil</a></li>

              <li><a href="calendar.html">Kelola Pengguna</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-book"></i>
              <span>Laporan</span>
              </a>
            <ul class="sub">
              <li><a href="blank.html">Laporan Harian</a></li>
              <li><a href="login.html">Laporan Bulanan</a></li>
            </ul>
          </li>
        
          <li class="sub-menu">
            
              <hr>
              
          </li>
         
  <!-- akhir sidebar -->

</body>


</html>

<?php } ?>
