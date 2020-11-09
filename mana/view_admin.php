<?php 

 session_start();
 
    // cek apakah yang mengakses halaman ini sudah login
       if($_SESSION['level']==""){
            header("location:../login.php?pesan=gagal");
        } 

include('includes/scripts.php');?>  
  <div class="card ">
    <div class="card-header">
      <center>
        Semua Admin
      </center>
    </div>
    <div class="card-body">
<div class="row justify-content-center">   
<?php
    require_once('includes/conn.php');
    $page = (isset($_POST['page']))? $_POST['page'] : 1;
              $limit = 3; 
              $limit_start = ($page - 1) * $limit;
              $no = $limit_start + 1;
              $jumlah_record=mysqli_query($con,"SELECT * from pegawai where idlevel = 2");
              $jum=mysqli_num_rows($jumlah_record);
        $brg=mysqli_query($con,"SELECT * from pegawai where idlevel = 2 limit $limit_start, $limit");
        $get_jumlah = mysqli_num_rows($brg);       
        while($b=mysqli_fetch_array($brg)){
            ?>
        <div class="col-sm-3 mb-3">
          <div class="card" style="min-height: 14rem;" >
            <img src=".." class="card-img-top" alt="gambar">
            <div class="card-body">
              <h6 class="card-title"><?php echo $b['nama_lengkap']; ?></h6>
              <p class="card-text"><?php echo $b['idpegawai']?></p>
            </div>
            <div class="card-footer">
              <button pid='$pro_id' class='quicklook btn btn-danger btn-xs' style='float:right;'>Quick look</button>
              </div>
          </div>
        </div>
      <?php   
        } ?>
</div>
</div>


<div class="card-footer">
<nav class="mb-5">
          <ul class="pagination justify-content-center">
            <?php
              $jumlah_page = ceil($jum / $limit);
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
        </nav>
        </div>
</div>