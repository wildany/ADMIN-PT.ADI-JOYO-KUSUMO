<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "ajk";

$connect  = mysqli_connect($hostname, $username, $password, $database);
if(!$connect) {
     die('Koneksi Error: ' . mysqli_connect_error());
}
// else{
// 	echo "koneksi berhasil";
// }

?>