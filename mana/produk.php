<?php 
require_once('includes/conn.php');
include('includes/scripts.php'); 

 session_start();
 
    // cek apakah yang mengakses halaman ini sudah login
       if($_SESSION['level']==""){
            header("location:../login.php?pesan=gagal");
        } 
     



$limit=3;
$jumlah_record=mysqli_query($con,"SELECT * from produk");
$jum=mysqli_num_rows($jumlah_record);
$halaman=ceil($jum / $limit);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;
$no = (($page - 1) * $limit)+1;
?>
<link href="css/sb-admin-2.css" rel="stylesheet">
<div class="col-md-12">
  <div class="row justify-content-between">
      
  <table class="col-md-2">
    <tr>
      <td>Jumlah Produk</td>    
      <td><?php echo $jum; ?></td>
    </tr>
  </table>
         <div class="col-xs-12 col-md-6 col-sm-6">
          <!--
          -- Input Group adalah salah satu komponen yang disediakan bootstrap
          -- Untuk lebih jelasnya soal Input Group, silahkan buka link ini : http://viid.me/qb4Mup
          -->
          <div class="input-group">
            <!-- Buat sebuah textbox dan beri id keyword -->
            <input type="text" class="form-control" placeholder="Pencarian..." id="keyword">
            
            <span class="input-group-btn">
              <!-- Buat sebuah tombol search dan beri id btn-search -->
              <button class="btn btn-primary" type="button" id="btn-search">SEARCH</button>
              <a href="" class="btn btn-warning">RESET</a>
            </span>
          </div>
        </div> 
      </div>  
  </div>

  
   
  


<br/>
  <div class="container-fluid">
 <div id="view">
  
</div>
</div>
<script>
 $(document).ready(function(){
      load_data();
      function load_data(page){
           $.ajax({
                url:"view.php",
                method:"POST",
                data:{page:page},
                success:function(data){
                     $('#view').html(data);
                }
           })
      }
      $(document).on('click', '.halaman', function(){
           var page = $(this).attr("id");
           load_data(page);
      });
 });
 </script>