<?php 
session_start();
include 'includes/conn.php';
$user=$_POST['user'];
$lama=$_POST['lama'];
$baru=$_POST['baru'];
$ulang=$_POST['ulang'];

$cek=mysqli_query($con,"select * from pegawai where password='$lama' and username='$user'");
if(mysqli_num_rows($cek)==1){
	if($baru==$ulang){
		$b = $baru;
		mysqli_query($con,"update pegawai set password='$b' where username='$user'");
        $_SESSION['password'] = $b;
		header("location:profil.php?px=oke");
	}else{
		header("location:profil.php?px=tdksama");
	}
}else{
	header("location:profil.php?px=gagal");
}

 ?>