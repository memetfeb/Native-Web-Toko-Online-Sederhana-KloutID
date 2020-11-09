<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Dashboard Manager</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<?php require_once('includes/conn.php');
include('includes/scripts.php'); 
?>
<?php 
$per_hal=3;
$jumlah_record=mysqli_query($con,"SELECT * from produk");
$jum=mysqli_num_rows($jumlah_record);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>
<div class="col-md-12">
  <table class="col-md-2">
    <tr>
      <td>Jumlah Record</td>    
      <td><?php echo $jum; ?></td>
    </tr>
    <tr>
      <td>Jumlah Halaman</td> 
      <td><?php echo $halaman; ?></td>
    </tr>
  </table>
</div>

<br/>
  <div class="container-fluid">
 
  <div class="card ">
    <div class="card-header">
      <center>
        Semua Produk
      </center>
    </div>
    <div class="card-body">
<div class="row" id ="load_data">   
    <?php 
            $brg=mysqli_query($con,"select * from produk limit $start, $per_hal");
            $no=1;
            while($b=mysqli_fetch_array($brg)){
            ?>


<div class="col-sm-3 mb-3">
          <div class="card" style="min-height: 12rem;" >
            <img src=".." class="card-img-top" alt="gambar">
            <div class="card-body">
              <h5 class="card-title"><?php echo $b['namaproduk']; ?></h5>
              <p class="card-text">Rp.<?php echo"$b[price]"?>,-</p>
            </div>
            <div class="card-footer">
              <button pid='$pro_id' class='quicklook btn btn-danger btn-xs' style='float:right;'>Quick look</button>
              </div>
          </div>
        </div>
<?php } ?>
</div>
</div>
<div class="card-footer"><nav class="mb-5">
          <ul class="pagination justify-content-end">
            <?php
              $jumlah_page = $halaman;
              $jumlah_number = 1; //jumlah halaman ke kanan dan kiri dari halaman yang aktif
              $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1;
              $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page;
              if($page == 1){
                echo '<li class="page-item disabled"><a class="page-link" href="#">First</a></li>';
                echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&laquo;</span></a></li>';
              } else {
                $link_prev = ($page > 1)? $page - 1 : 1;
                echo '<li class="page-item halaman" id="1"><a class="page-link" href="#">First</a></li>';
                echo '<li class="page-item halaman" id="'.$link_prev.'"><a class="page-link" href="#"><span aria-hidden="true">&laquo;</span></a></li>';
              }
 
              for($i = $start_number; $i <= $end_number; $i++){
                $link_active = ($page == $i)? ' active' : '';
                echo '<li class="page-item halaman '.$link_active.'" id="'.$i.'"><a class="page-link" href="#">'.$i.'</a></li>';
              }
 
              if($page == $jumlah_page){
                echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
                echo '<li class="page-item disabled"><a class="page-link" href="#">Last</a></li>';
              } else {
                $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
                echo '<li class="page-item halaman" id="'.$link_next.'"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
                echo '<li class="page-item halaman" id="'.$jumlah_page.'"><a class="page-link" href="#">Last</a></li>';
              }
            ?>
          </ul>
        </nav></div>
</div>
</div>
<script>
 $(document).ready(function(){
      load_data();
      function load_data(page){
           $.ajax({
                url:"load.php",
                method:"POST",
                data:{page:page},
                success:function(data){
                     $('#data').html(data);
                }
           })
      }
      $(document).on('click', '.halaman', function(){
           var page = $(this).attr("id");
           load_data(page);
      });
 });
 </script>
