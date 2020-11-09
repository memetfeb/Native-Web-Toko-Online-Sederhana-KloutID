<?php
include('includes/navbar.php');
?>
 <script src="js/sb-admin-2.min.js"></script>
<link href="css/style.css" rel="stylesheet" media="all">


    <div class="container">
    <div class="card">
      <div class="container-fliud">
        <div class="wrapper row">
          <div class="preview col-md-6">
            <?php
            $id = $_GET["id"];

              $brg= "SELECT * FROM produk WHERE idproduk = '$id' ";
              $result = $con->query($brg);
              if (!$result){
                  printf("Error: %s\n", mysqli_error($db));                
                  exit();
              }else{
                  while ($row = $result->fetch_object()){
                        $namaproduk = $row->namaproduk;
                        $deskripsi = $row->deskripsi;
                        $berat = $row->berat;
                        $kuantitas = $row->kuantitas;
                        $price = $row->price;
                        $gambar = $row->file_gambar;
                    }
              }                                  
              ?>
            <div class="preview-pic tab-content">
              <div class="tab-pane active" id="pic-1"><img src="/toko_baju_klout/admin/images/produk/<?php echo $gambar; ?>" /></div>
            </div>
          </div>
          <div class="details col-md-6">
            <h3 class="product-title"><?php echo $namaproduk; ?></h3>
            <p class="product-description"><?php echo $deskripsi; ?></p>
            <h4 class="price">Harga : <span>Rp. <?php echo $price; ?></span></h4>
            <p class="vote">Berat : <?php echo $berat; ?> gram <br> Stok : <?php echo $kuantitas; ?>
            <strong></p>
                      </div>
        </div>
        </div>
      </div>
    </div>

<script src="js/live-search.js"></script>

<?php
include('includes/footer.php');
?>
