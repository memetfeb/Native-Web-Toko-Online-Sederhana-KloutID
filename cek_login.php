<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
require_once('config.php');
	// Connect
	$db = mysqli_connect($db_host, $db_username, $db_password, $db_database);

	if(mysqli_connect_errno()){
		die('Tidak bisa terhubung dengan database.<br>'.mysqli_connect_error());
	}
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($db,"select * from pegawai where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_array($login);

	// cek jika user login sebagai manager
	if($data['idlevel']==1){

		// buat session login dan username
		$_SESSION['username'] = $username;
        $_SESSION['email'] = $data['email'];
        $_SESSION['password'] = $password;
		$_SESSION['nama_lengkap'] = $data['nama_lengkap'];
		$_SESSION['level'] = "manager";
		$_SESSION['idpegawai'] = $data['idpegawai'];
		$_SESSION['foto'] = $data['foto'];
		// alihkan ke halaman dashboard admin
		header("location:mana/index.php");

	// cek jika user login sebagai admin
	}else if($data['idlevel']==2){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['nama_lengkap'] = $data['nama_lengkap'];
		$_SESSION['level'] = "admin";
		$_SESSION['idpegawai'] = $data['idpegawai'];
		// alihkan ke halaman dashboard pegawai
		header("location:admin/semua_produk.php");

	// cek jika user login sebagai pengurus
	}else{

		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}
}else{
	header("location:index.php?pesan=gagal");
}

?>
