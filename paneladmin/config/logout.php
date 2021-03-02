<?php
include "koneksi.php"; 
session_start();

$id_pegawai = ($_SESSION[id_pegawai]);
date_default_timezone_set('Asia/Jakarta');
$waktu = date( 'Y-m-d H:i:s', time () );




$input = mysqli_query($connect,"UPDATE log_aktivitas SET WAKTU_LOGOUT = '$waktu' WHERE ID_PEGAWAI = '$id_pegawai'  ORDER BY ID_AKTIVITAS DESC LIMIT 1");





session_destroy();
header('location: ../index.php');


 ?>