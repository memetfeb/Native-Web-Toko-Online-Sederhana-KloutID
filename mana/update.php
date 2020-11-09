<?php 
session_start();
include 'includes/conn.php';
if(isset($_POST['submit'])){
$id=$_POST['idpegawai'];
$nama=$_POST['name'];
$ema=$_POST['ema'];
$lgkp=$_POST['lgkp'];
$update_pegawai = "UPDATE pegawai set username = '$nama', email = '$ema', nama_lengkap = '$lgkp' where idpegawai ='$id'";	
if(mysqli_query($con,$update_pegawai)){
            $_SESSION['username'] = $nama;
            $_SESSION['email'] = $ema;
            $_SESSION['nama_lengkap'] = $lgkp;
            header("location:profil.php");
    }else{
    echo "gagal";
}
}

 ?>