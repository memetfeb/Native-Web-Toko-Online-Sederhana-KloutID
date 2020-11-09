<?php
$keywords = $_GET["keywords"];
require_once('includes/conn.php');
$jumlah_record=mysqli_query($con,"SELECT * from produk");
$jum=mysqli_num_rows($jumlah_record);
$brg="select * from produk where idproduk LIKE '%$keywords%' OR
         namaproduk LIKE '%$keywords%' OR
         idkategori LIKE '%$keywords%' OR
         idsub_kategori LIKE '%$keywords%'
         ";

$result = mysqli_query($con, $brg);
if (!$result) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
while($b=mysqli_fetch_array($result)){

?>


<div class="col-sm-4 mb-4">
      <div class="card" style="min-height: 12rem;" >
        <img src="/toko_baju_klout/admin/images/produk/<?php echo $b['file_gambar'];  ?>" height=250px class="card-img-top" alt="gambar">
        <div class="card-body">
          <h5 class="card-title"><?php echo $b['namaproduk']; ?></h5>
          <p class="card-text">Rp.<?php echo"$b[price]"?>,-</p>
        </div>
        <div class="card-footer">
          <div id="quicklook" class="text-center"> <button pid='$pro_id'  style='float:right;'>Quick look</button></div>
          </div>
      </div>
    </div>
<?php } ?>
