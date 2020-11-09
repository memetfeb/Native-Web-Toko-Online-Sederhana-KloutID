    <?php
          require_once("includes/conn.php");
            $per_hal=3;
            $jumlah_record=mysqli_query($con,"SELECT * from produk");
            $jum=mysqli_num_rows($jumlah_record);
            $halaman=ceil($jum / $per_hal);
            $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
            $start = ($page - 1) * $per_hal; 
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