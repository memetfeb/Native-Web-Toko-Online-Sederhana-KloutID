  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" type="text/css" href="js/jquery-ui/jquery-ui.css">
<script type="text/javascript" src="js/jquery-ui/jquery-ui.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->

  <!-- Page level custom scripts -->

  <script type="text/javascript">
    $(document).ready(function(){
     $("#lihatprod").click(function(){
      $('.badan').load('produk.php');      
     });
     $("#lihatadm").click(function(){
      $('.badan').load('data_admin.php');  
      });
      $("#fau").click(function(){
      $('.badan').load('p.php');  
      });
    });
    //setInterval()
  </script>


<?php 
require_once('includes/conn.php');
$badm = mysqli_num_rows(mysqli_query($con,"select * from pegawai where idlevel = 2"));  

$bprod = mysqli_num_rows(mysqli_query($con,"select * from produk"));

$bsub = mysqli_num_rows(mysqli_query($con,"select * from sub_kategori"));

$bkat = mysqli_num_rows(mysqli_query($con,"select * from kategori"));
// untuk chart

$result = mysqli_query($con," SELECT b.namakategori as nama, COUNT(a.idproduk) as jumlah FROM produk a, kategori b WHERE a.idkategori = b.idkategori GROUP BY a.idkategori");
$result1 = mysqli_query($con," SELECT b.namakategori as nama FROM produk a, kategori b WHERE a.idkategori = b.idkategori GROUP BY a.idkategori");
$panjang = mysqli_num_rows($result);
?>

<!-- chart pie untuk produk per kategori -->
