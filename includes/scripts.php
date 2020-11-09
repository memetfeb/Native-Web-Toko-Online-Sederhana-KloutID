  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
      <script src="https://d3js.org/d3-color.v1.min.js"></script>
    <script src="https://d3js.org/d3-interpolate.v1.min.js"></script>
    <script src="https://d3js.org/d3-scale-chromatic.v1.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
     $("#lihatprod").click(function(){
      $('.badan').load('load.php');
     });  
      //
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
<script src="utils/color-generator.js">
  </script>

  