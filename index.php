<?php
require_once('includes/conn.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/scripts.php');
include('includes/chartjs.php');
?>

<div class="badan">
  <?php
  //pagination
                          $halaman = 9;
                          $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
                          $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
                          $result = mysqli_query($con, "SELECT * FROM produk");
                          $total = mysqli_num_rows($result);
                          $pages = ceil($total/$halaman);
  ?>

  <br/>
    <div class="container-fluid">

    <div class="card ">
      <div class="card-header">
        <center>
          Semua Produk
        </center>
      </div>
      <div class="card-body" id="badan">
  <div class="row" id ="load_data">
      <?php
              $brg=mysqli_query($con,"select * from produk limit $mulai, $halaman");
              $no=1;
              while($b=mysqli_fetch_array($brg)){
              ?>


  <div class="col-sm-4 mb-4">
            <div class="card" style="min-height: 12rem;" >
              <img src="/toko_baju_klout/admin/images/produk/<?php echo $b['file_gambar'];  ?>" height=250px class="card-img-top" alt="gambar">
              <div class="card-body">
                <h5 class="card-title"><?php echo $b['namaproduk']; ?></h5>
                <p class="card-text">Rp.<?php echo"$b[price]"?>,-</p>
              </div>
              <div class="card-footer">
                <div id="quicklook" class="text-center"> 
                <a href="data_produk.php?id=<?php echo $b["idproduk"]; ?>" class="klik_menu" id="edit">
                  <button pid='$pro_id'  style='float:right;'>Quick look</button></div>                        </a>

                
                </div>
            </div>
          </div>
  <?php } ?>
  </div>
  </div>
  <div class="card-footer"><nav class="mb-5">
    <ul class="pagination justify-content-end">
    <?php
      $jumlah_page = $pages;
      $jumlah_number = 1; //jumlah halaman ke kanan dan kiri dari halaman yang aktif
      $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1;
      $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page;
      if($page == 1){
        echo '<li class="page-item disabled"><a class="page-link" href="#">First</a></li>';
        echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&laquo;</span></a></li>';
      } else {
        $link_prev = ($page > 1)? $page - 1 : 1;
        echo '<li class="page-item halaman" id="1"><a class="page-link" href="?halaman=1">First</a></li>';
        echo '<li class="page-item halaman" id="'.$link_prev.'"><a class="page-link" href="?halaman='.$link_prev.'"><span aria-hidden="true">&laquo;</span></a></li>';
      }

      for($i = $start_number; $i <= $end_number; $i++){
        $link_active = ($page == $i)? ' active' : '';
        echo '<li class="page-item halaman '.$link_active.'" id="'.$i.'"><a class="page-link" href="?halaman='.$i.'">'.$i.'</a></li>';
      }

      if($page == $jumlah_page){
        echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
        echo '<li class="page-item disabled"><a class="page-link" href="#">Last</a></li>';
      } else {
        $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
        echo '<li class="page-item halaman" id="'.$link_next.'"><a class="page-link" href="?halaman='.$link_next.'"><span aria-hidden="true">&raquo;</span></a></li>';
        echo '<li class="page-item halaman" id="'.$jumlah_page.'"><a class="page-link" href="?halaman='.$jumlah_page.'">Last</a></li>';
      }
    ?>
  </ul>
          </nav></div>
  </div>
  </div>
</div>
<?php
include('includes/footer.php');
?>
<script src="js/live-search.js"></script>
