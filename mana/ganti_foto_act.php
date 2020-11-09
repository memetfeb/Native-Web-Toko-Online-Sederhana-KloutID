<?php 
session_start();
include 'includes/conn.php';
$user=$_POST['user'];
$foto=$_FILES['foto']['name'];

// move_uploaded_file($_FILES['foto']['tmp_name'], "foto/".$_FILES['foto']['name'])or die();
// 	mysql_query("update admin set foto='$foto' where uname='$user'");


$u=mysqli_query($con,"select * from pegawai where username= '$user'");
$us=mysqli_fetch_array($u);
if(file_exists("../foto/".$us['foto'])){
	unlink("../foto/".$us['foto']);
	move_uploaded_file($_FILES['foto']['tmp_name'], "../foto/".$_FILES['foto']['name']);
	mysqli_query($con,"update pegawai set foto='$foto' where username='$user'");
	$_SESSION['foto']=$_FILES['foto']['name'];
    header("location:profil.php?pesan=oke");
    
}else{
	move_uploaded_file($_FILES['foto']['tmp_name'], "../foto/".$_FILES['foto']['name']);
	mysqli_query($con,"update pegawai set foto='$foto' where username='$user'");
	$_SESSION['foto']=$_FILES['foto']['name'];
    header("location:profil.php?pesan=oke");
    
}
?>