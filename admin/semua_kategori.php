
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
        <title>Data Kategori</title>

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
                                    <h2 class="title-1">Data Semua Kategori</h2>
                                   
                                </div>
                            </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="overview-wrap">
                                 <form action="" method="POST">
                                    <input class="au-input au-input--xl" type="text" name="keywords" placeholder="Search for produk " id="keywords" />
                                     <button class="au-btn--search" disabled="disabled" type="submit"  name="cari" id="tombol-cari">
                                    <i class="zmdi zmdi-search"></i>
                                    </button>
                                </form>
                                <form action="tambahkategori.php" method="POST">
                                <button class="au-btn au-btn-icon au-btn--blue" >
                                        <i class="zmdi zmdi-plus"></i>add kategori</button>
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
                                <th>ID Kategori</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                            </tr>
                
                            <?php

                            // Execute the query
                            $kategori = " SELECT * FROM kategori ORDER BY idkategori";
                                //tombol cari ditekan
                            $resultkategori = mysqli_query($db, $kategori);   


                               // if(isset($_POST["cari"])){
                               //      $produk = cari($_POST["keywords"]);
                               //  }
                           

                            $i = 1;

                            // Fetch and display the results
                            while ($rowkategori = mysqli_fetch_array($resultkategori)) {
                                echo '<tr>';
                                echo '<td>'.$i.'</td> ';
                                echo '<td>'.$rowkategori["idkategori"].'</td> ';
                                echo '<td>'.$rowkategori["namakategori"].'</td> ';
                                echo '<td align = "center">
                                        <div class="table-data-feature">                                    
                                        <a href="editkategori.php?id='.$rowkategori["idkategori"].'" class="klik_menu" id="edit">
                                        <button type="submit" class="item " data-toggle="tooltip" data-placement="top" title="Edit" name="edit">
                                                <i class="zmdi zmdi-edit"></i>
                                            </button>
                                        </a>
                                        
                                        '
                                ?>
                                        <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??'))
                                                {location.href='hapuskategori.php?id=<?php echo $rowkategori["idkategori"];?>'}
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
                                $i++;
                            }
                            $db->close();
                            ?>
                        </table>
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
        <script src="js/live-search-kategori.js"></script>
    </body>



    </html>
<!-- end document-->
