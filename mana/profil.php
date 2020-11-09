<?php

include('includes/navbar.php');



        
?>

<script src="js/sb-admin-2.min.js"></script>
<style>
.profile-pic {
	position: relative;
	display: inline-block;
}

.profile-pic:hover .edit {
	display: block;
}

.edit {
	padding-top: 7px;	
	padding-right: 7px;
	position: absolute;
	right: 0;
	top: 0;
	display: none;
}

.edit a {
	color: white;
}
</style>
<?php 
if(isset($_GET['pesan'])){
	$pesan=mysqli_real_escape_string($con,$_GET['pesan']);
	if($pesan=="oke"){
		echo "<div class='alert alert-success'>Foto berhasil di ganti !! </div>";
	}
}
if(isset($_GET['px'])){
	$px=mysqli_real_escape_string($con,$_GET['px']);
	if($px=="gagal"){
		echo "<div class='alert alert-danger'>password nya lupa ya </div>";
	}else if($px=="tdksama"){
		echo "<div class='alert alert-warning'>konfirmasi password salah </div>";
	}else if($px=="oke"){
		echo "<div class='alert alert-success'>selamat anda benar !! </div>";
	}
}

 

  $id = $_SESSION['idpegawai'];
                            
    $query = " SELECT * FROM pegawai WHERE idpegawai LIKE '%$id%' ";
    // Execute the query
    $result = $con->query($query); 
      if (!$result){
      printf("Error: %s\n", mysqli_error($db));                
      exit();
    }else{
      while ($row = $result->fetch_object()){
      $username = $row->username;
      $namalengkap = $row->nama_lengkap;
      $email = $row->email;
      $level = $row->idlevel;
      $usernameawal = $username;
      $emailawal = $email;
      $id = $row->idpegawai;
      $password = $row->password;
      $foto = $row->foto;
      }
    }

    if($level == 1){
      $levelnama = "Manager";
    }
    elseif ($level == 2) {
      $levelnama = "Admin";
      # code...
    }



?>









<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4 text-center">
  <div class="card-header">
    Profil <?php echo $username ?> 
  </div>
  <div class="card-body">
    <div class="row justify-content-center">
    <div class="card col-md-6  text-center">
        <div class="profile-pic mx-auto"style="width:50%;">
          <img class="card-img-top"  src="/toko_baju_klout/foto/<?php echo $foto; ?>">
          <div class="edit" style="color:orange;"><i class="fas fa-pencil-alt fa-lg " data-toggle="modal" data-target="#uploadModal"></i></div>
        </div>  
        
      
      <div class="card-body">
        <h5 class="card-title">Nama : <?php echo $namalengkap; ?></h5>
    <p class="card-text">idPegawai : <?php echo $id; ?></p>
     <p class="card-text">jabatan : <?php echo $levelnama; ?></p>
      </div>
      
    </div>
    </div>
  </div>
  <div class="card-footer py-3">
    <h6 class="m-0 font-weight-bold text-primary"> 
            <a href="editprofile.php?id=<?php echo $_SESSION['idpegawai']; ?>" class="klik_menu" id="edit">
            <button type="button" class="btn btn-primary" type="submit" class="item ">
              Edit Profil 
            </button>
          </a>
            
    </h6>
  </div>

  

  </div>
</div>



<!-- /.container-fluid -->

<?php

include('includes/footer.php');
?>