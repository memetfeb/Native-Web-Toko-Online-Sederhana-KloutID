    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html401/loose.dtd">
        <html lang="en">


    <?php
        session_start();
 
    // cek apakah yang mengakses halaman ini sudah login
       if($_SESSION['level']==""){
            header("location:../login.php?pesan=gagal");
        } 
    	require_once('config.php');
        $db =mysqli_connect($db_host, $db_username, $db_password, $db_database);

       if (mysqli_connect_errno()){
        die ("Could not connect to the database: <br />".mysqli_connect_error( ));
      }

      $id = $_GET["id"];


    ?>


        <head>
    	
            <!-- Required meta tags-->
            <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="au theme template">
            <meta name="author" content="Hau Nguyen">
            <meta name="keywords" content="au theme template">

            <!-- Title Page-->
            <title>Detail Produk</title>

            <!-- Fontfaces CSS-->
            <link href="css/font-face.css" rel="stylesheet" media="all">
            <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
            <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
            <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

            <!-- Bootstrap CSS-->
            <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

            <!-- Vendor CSS-->
            <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
            <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
            <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
            <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
            <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
            <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
            <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

            <!-- Main CSS-->
            <link href="css/theme.css" rel="stylesheet" media="all">
        

        </head>

        <body class="animsition">
            <div class="page-wrapper">
                <?php include('menuadmin.php'); ?>
                <!-- PAGE CONTAINER-->
                <div class="page-container">
                    <!-- HEADER DESKTOP-->
                    <?php include('headeradmin.php'); ?>
                    <!-- MAIN CONTENT-->
                    <div class="main-content" style="padding-left: 30px ; width: 100% ; padding-right: 30px " >
                        <div class="row">
                                <div class="col-md-12">
                                    <div class="overview-wrap">
                                        <h2 class="title-1">DETAIL PRODUK <?php echo $id; ?></h2>
                                    </div>
                                </div>
                        </div>
                        <br>
                        <div class="table-responsive table--no-card m-b-40">
                           
    		                  <table class="table table-borderless table-striped table-produk" style="width:100%">
    	                       <?php
                                $id = mysqli_real_escape_string($db,$_GET["id"]);
                                $query = "SELECT a.idproduk as ID, a.namaproduk as Nama, a.deskripsi as Deskripsi, b.namakategori as Kategori, c.namasubkategori as Subkategori, a.berat as Berat, a.kuantitas as Stok, a.last_update as Lastupdate, d.nama_lengkap as Pegawai, a.price as Harga, a.file_gambar as Gambar FROM produk a, kategori b, sub_kategori c, pegawai d WHERE a.idproduk = '$id' AND a.idkategori = b.idkategori AND a.idsub_kategori = c.idsub_kategori AND a.idpegawai = d.idpegawai";
                                $produk = mysqli_query($db, $query); 


                            // Fetch and display the results
                            foreach ($produk as $row ) {
                                echo '<tr>';
                                echo "<td width='30px'>ID Produk</td>
                                    <td>:</td>";
                                echo '<td width="70px">'.$row["ID"].'</td> ';
                                echo '</tr>';

                                echo '<tr>';
                                echo "<td >Nama</td>
                                    <td>:</td>";
                                echo '<td>'.$row["Nama"].'</td> ';
                                echo '</tr>';

                                echo '<tr>';
                                echo "<td width='30%'>Deskripsi</td>
                                    <td>:</td>";
                                echo '<td width="70%"><textarea disabled rows="5" cols="70">'.$row["Deskripsi"].'</textarea></td>';
                                echo '</tr>';

                                echo '<tr>';
                                echo "<td >Kategori</td>
                                    <td>:</td>";
                                echo '<td>'.$row["Kategori"].'</td>';
                                echo '</tr>';

                                echo '<tr>';
                                echo "<td >Sub Kategori</td>
                                    <td>:</td>";
                                echo '<td>'.$row["Subkategori"].'</td>';
                                echo '</tr>';

                                echo '<tr>';
                                echo "<td >Berat</td>
                                    <td>:</td>";
                                echo '<td>'.$row["Berat"].'</td>';
                                echo '</tr>';

                                echo '<tr>';
                                echo "<td >Stok</td>
                                    <td>:</td>";
                                echo '<td>'.$row["Stok"].'</td>';
                                echo '</tr>';

                                echo '<tr>';
                                echo "<td >Harga</td>
                                    <td>:</td>";
                                echo '<td>'.$row["Harga"].'</td>';
                                echo '</tr>';

                                echo '<tr>';
                                echo "<td >Las Update</td>
                                    <td>:</td>";
                                echo '<td>'.$row["Lastupdate"].'</td>';
                                echo '</tr>';

                                echo '<tr>';
                                echo "<td >Pegawai</td>
                                    <td>:</td>";
                                echo '<td>'.$row["Pegawai"].'</td>';
                                echo '</tr>';

                                echo '<tr>';
                                echo "<td >Foto Produk</td>
                                    <td>:</td>";
                                echo '<td><img src="images/produk/'.$row["Gambar"].'" alt="Foto Produk" width="142" height="162">
                                </td>';
                                echo '</tr>';
                            }
                            
                            ?>

                            <tr>
                                <?php
                                echo '<td colspan="3" align="center"><a href="editproduk.php?id='.$row["ID"].'">Edit</a>
                                </td>'
                                ?>
                            </tr>
                            <tr>
                                <td colspan="3" align="center"><a href="semua_produk.php">Kembali</a></td>
                            </tr>
    		</table>

    	  				</div>
                    </div>
                    <!-- END MAIN CONTENT-->
                    <!-- END PAGE CONTAINER-->
                </div>

            </div>


    	 <!-- Jquery JS-->
            <script src="vendor/jquery-3.2.1.min.js"></script>
            <!-- Bootstrap JS-->
            <script src="vendor/bootstrap-4.1/popper.min.js"></script>
            <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
            <!-- Vendor JS       -->
            <script src="vendor/slick/slick.min.js">
            </script>
            <script src="vendor/wow/wow.min.js"></script>
            <script src="vendor/animsition/animsition.min.js"></script>
            <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
            </script>
            <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
            <script src="vendor/counter-up/jquery.counterup.min.js">
            </script>
            <script src="vendor/circle-progress/circle-progress.min.js"></script>
            <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
            <script src="vendor/chartjs/Chart.bundle.min.js"></script>
            <script src="vendor/select2/select2.min.js"></script>
    		<script type="text/javascript"></script>
            <!-- Main JS-->
            <script src="js/main.js"></script>
            <script src="js/live-search.js"></script>
        </body>

        </html>