
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html401/loose.dtd">
    <html lang="en">

    <head>
        <?php 
        session_start();
 
    // cek apakah yang mengakses halaman ini sudah login
       if($_SESSION['level']==""){
            header("location:../login.php?pesan=gagal");
        }


    require_once('config.php');
    $db =mysqli_connect($db_host, $db_username, $db_password, $db_database);

   if (mysqli_connect_errno()){
    die ("Could not connect to the database: <br />".
    mysqli_connect_error( ));
  }
?>

    

        <!-- Required meta tags-->
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="au theme template">
        <meta name="author" content="Hau Nguyen">
        <meta name="keywords" content="au theme template">

        <!-- Title Page-->
        <title>Data Produk</title>

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
         <link href="css/style.css" rel="stylesheet" media="all">
    

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
                                    <h2 class="title-1">Data Semua Produk</h2>
                                   
                                </div>
                            </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="overview-wrap">
                                 <form action="" method="POST">
                                    <input class="au-input au-input--xl" type="text" name="keywords" placeholder="Search for produk " id="keywords" />
                                     <button class="au-btn--search" type="submit"  name="cari" id="tombol-cari">
                                    <i class="zmdi zmdi-search"></i>
                                    </button>
                                </form>
                                <form action="tambahproduk.php" method="POST">
                                <button class="au-btn au-btn-icon au-btn--blue" >
                                        <i class="zmdi zmdi-plus"></i>add item</button>
                                </form>
                            </div>
                        </div>
                     </div>
                    <br>
                    <div id="container">
                        <div class="table-responsive table--no-card m-b-40">
                        <table class="table table-borderless table-striped table-produk">
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Sub-Kategori</th>
                                <th width="10%">Kuantitas</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                
                            <?php

                            //pagination
                            $halaman = 10;
                            $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
                            $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
                            $result = mysqli_query($db, "SELECT * FROM produk");
                            $total = mysqli_num_rows($result);
                            $pages = ceil($total/$halaman);

                            // Execute the query
                            $produk = " SELECT a.idproduk as ID, a.namaproduk as Nama, a.kuantitas as Kuantitas, b.namakategori as Kategori, c.namasubkategori as SubKategori, a.price as Harga FROM produk a, kategori b, sub_kategori c WHERE a.idkategori = b.idkategori and a.idsub_kategori = c.idsub_kategori ORDER BY b.namakategori, c.namasubkategori LIMIT $mulai, $halaman";
                             
                            $resultproduk = mysqli_query($db, $produk);   


                               // if(isset($_POST["cari"])){
                               //      $produk = cari($_POST["keywords"]);
                               //  }
                           
                            $no =$mulai+1;

                            // Fetch and display the results
                            while ($rowproduk = mysqli_fetch_array($resultproduk)) {
                                echo '<tr>';
                                echo '<td>'.$no++.'</td> ';
                                echo '<td>'.$rowproduk["ID"].'</td> ';
                                echo '<td>'.$rowproduk["Nama"].'</td> ';
                                echo '<td>'.$rowproduk["Kategori"].'</td>';
                                echo '<td>'.$rowproduk["SubKategori"].'</td>';
                                echo '<td width="10%">'.$rowproduk["Kuantitas"].'</td>';
                                echo '<td>'.$rowproduk["Harga"].'</td>';
                                echo '<td>
                                        <div class="table-data-feature">                                    
                                        
                                        <a href="detailproduk.php?id='.$rowproduk["ID"].'" class="klik_menu" id="edit">
                                                <button type="submit" class="item" data-toggle="tooltip" data-placement="top" title="detail" id="detail" name="detail" >
                                                <i class="fas fa-book"></i>
                                                </button>
                                        </a>

                                        <a href="editproduk.php?id='.$rowproduk["ID"].'" class="klik_menu" id="edit">
                                            <button type="submit" class="item " data-toggle="tooltip" data-placement="top" title="Edit" name="edit">
                                                <i class="zmdi zmdi-edit"></i>
                                            </button>
                                        </a>
                                        
                                        '
                                ?>
                                        <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??'))
                                                {location.href='hapusproduk.php?id=<?php echo $rowproduk["ID"];?>'}
                                            else
                                                {location.href=window.location.href}"
                                        >
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete" name="delete" id="delete">
                                           <i class="zmdi zmdi-delete"></i> 
                                        </button>
                                        </a>
                                    </div>
    
                                <?php


                                echo '</td></tr>';
                            }
                            $db->close();
                            ?>
                        </table>
                        <center>
                        <div class="pagination" >
                           
                                <?php for ($i=1; $i<=$pages ; $i++){ ?>
                                  <a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
                                <?php } ?>
                            
                        </div>
                        </center>
                        </div>
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
        <script src="vendor/select2/select2.min.js">
        </script>

        <!-- Main JS-->
        <script src="js/main.js"></script>
        <script src="js/live-search-produk.js"></script>
    </body>



    </html>
<!-- end document-->
