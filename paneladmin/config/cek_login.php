<?php 
include "koneksi.php";


function anti_injection($data){
	$filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
	return $filter;
}

$username = $_POST['username'];
$password = md5($_POST['password']);
 
// $sql = "select * from users where username='".$username."' and password='".$password."' ";
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($connect,"SELECT * FROM pegawai WHERE username='$username' AND password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
// $ketemu = mysqli_num_rows($login);
$data = mysqli_fetch_array($login);





if ($cek > 0) {
	session_start();
	date_default_timezone_set('Asia/Jakarta');
	$waktu = date("d-m-Y h:i:s");


	$_SESSION[username] = $data['USERNAME'];
	$_SESSION[password] = md5($data['PASSWORD']);
	$_SESSION[nama_pegawai] = $data['NAMA_PEGAWAI'];
	$_SESSION[id_pegawai] = $data['ID_PEGAWAI'];
	$_SESSION[id_jabatan] = $data['ID_JABATAN'];
	$_SESSION[foto_profil] = $data['FOTO_PROFIL'];
	
	$id_lama = session_id();
	session_regenerate_id();
	$sid_baru = session_id();

	$id_pegawai = $_SESSION[id_pegawai];

	$log_masuk = mysqli_query($connect,"INSERT INTO log_aktivitas(ID_PEGAWAI) VALUES ('$id_pegawai')" ); 
	//insert ke database dengan waktu default
    
    
	

	echo "<script>alert('Selamat Datang $_SESSION[nama_pegawai]; window.location=../media.php
	</script>";
	header('location: ../media.php');

}

else{
	echo "<script><alert('Username dan Password anda salah'>; window.location=../login.php
	</script>";
	header('location: ../index.php');
}
 ?>





