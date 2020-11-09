<?php 
    session_start();    // cek apakah yang mengakses halaman ini sudah login
if(!isset($_SESSION['username'])&!isset($_SESSION['level'])=="manager"){
            header("location:../login.php?pesan=gagal");
        }
    
     ?>
