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

      $query = " SELECT * FROM produk WHERE idproduk LIKE '%$id%' ";
        // Execute the query
        $result = $db->query($query);
        if (!$result){
            printf("Error: %s\n", mysqli_error($db));
        exit();
        }else{
            while ($row = $result->fetch_object()){
                $name = $row->namaproduk;
                $deskripsi = $row->deskripsi;
                $kategori = $row->idkategori;
                $subkategori = $row->idsub_kategori;
                $gambarawal = $row->file_gambar;
                $gambar = $row->file_gambar;
                $berat = $row->berat;
                $kuantitas = $row->kuantitas;
                $lastupdate = $row->last_update;
                $pegawai = $row->idpegawai;
                $harga = $row->price;
            }
        }

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
            <title>Edit Produk</title>

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
                                        <h2 class="title-1">EDIT PRODUK <?php echo $name;?> </h2>
                                    </div>
                                </div>
                        </div>
                        <br>
                        <div class="row">
                           <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?id='.$id;?>" enctype="multipart/form-data" >
    		                  <table class="table table-borderless table-produk">
    	                       <?php



                if (isset($_POST["submit"])){
                    $name = test_input($_POST['name']);
                    if ($name == ''){
                        $error_name = "Name is required";
                        $valid_name = FALSE;
                    }elseif (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                        $error_name = "Only letters and white space allowed";
                        $valid_name = FALSE;
                    }else{
                        $valid_name = TRUE;
                        $error_name= "";
                    }
                }else{
                    $valid_name = TRUE;
                    $error_name = "";
                }

                if (isset($_POST["submit"])){
                    $deskripsi = test_input($_POST['deskripsi']);
                    if ($deskripsi == ''){
                        $error_deskripsi = "deskripsi is required";
                        $valid_deskripsi = FALSE;
                    }else{
                        $valid_deskripsi = TRUE;
                        $error_deskripsi="";
                    }
                }else{
                    $error_deskripsi = "";
                    $valid_deskripsi = TRUE;
                }

                if (isset($_POST["submit"])){
                    $kategori = test_input($_POST['kategori']);
                    $valid_kategori = TRUE;
                    $error_kategori="";
                }else{
                    $error_kategori = "";
                    $valid_kategori = TRUE;

                }

                if (isset($_POST["submit"])){
                     $subkategori = test_input($_POST['subkategori']);
                     $valid_subkategori = TRUE;
                     $error_subkategori="";
                }else{
                     $error_subkategori = "";
                     $valid_subkategori = TRUE;
                }

                if (isset($_POST["submit"])){
                    $berat = test_input($_POST['berat']);
                    if ($berat == ''){
                        $error_berat = "Berat is required";
                        $valid_berat = FALSE;
                    }elseif (!preg_match("/^[0-9]*$/",$berat)) {
                        $error_berat = "Only number";
                        $valid_berat = FALSE;
                    }else{
                        $valid_berat = TRUE;
                        $error_berat= "";
                    }
                }else{
                    $valid_berat = TRUE;
                    $error_berat = "";
                }

                if (isset($_POST["submit"])){
                    $kuantitas = test_input($_POST['kuantitas']);
                    if ($kuantitas == ''){
                        $error_kuantitas = "kuantitas is required";
                        $valid_kuantitas = FALSE;
                    }elseif (!preg_match("/^[0-9]*$/",$kuantitas)) {
                        $error_kuantitas = "Only number";
                        $valid_kuantitas = FALSE;
                    }else{
                        $valid_kuantitas = TRUE;
                        $error_kuantitas= "";
                    }
                }else{
                    $valid_kuantitas = TRUE;
                    $error_kuantitas = "";
                }

                if (isset($_POST["submit"])){
                    $harga = test_input($_POST['harga']);
                    if ($harga == ''){
                        $error_harga = "Harga is required";
                        $valid_harga = FALSE;
                    }elseif (!preg_match("/^[0-9]*$/",$harga)) {
                        $error_harga = "Only number";
                        $valid_harga = FALSE;
                    }else{
                        $valid_harga = TRUE;
                        $error_harga = "";
                    }
                }else{
                    $valid_harga = TRUE;
                    $error_harga = "";
                }

                if (isset($_POST["submit"])){
                    $ekstensi_diperbolehkan = array('png','jpg','jpeg');
                    $gambar = $_FILES['uploadedit']['name'];
                    $x = explode('.', $gambar);
                    $ekstensi = strtolower(end($x));
                    $ukuran = $_FILES['uploadedit']['size'];
                    $file_tmp = $_FILES['uploadedit']['tmp_name'];

                    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                        if($ukuran < 1044070){
                            move_uploaded_file($file_tmp, 'images/produk/'.$gambar);
                            $valid_gambar = TRUE;
                        }else{
                            $error_gambar = 'UKURAN FILE TERLALU BESAR';
                            $valid_gambar = FALSE;
                        }
                    }else{
                        $error_gambar = 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
                        $valid_gambar = FALSE;
                    }
                }else{
                    $error_gambar = "";
                    $valid_gambar = TRUE;
                }

                function test_input($data) {
                    $data = trim($data);
                	$data = stripslashes($data);
                	$data = htmlspecialchars($data);
                    return $data;
                }

            if (isset($_POST["submit"])){
            if ($valid_name && $valid_deskripsi && $valid_kategori && $valid_subkategori && $valid_berat && $valid_kuantitas && $valid_harga && $valid_gambar){
            //escape input data
            $name = $db->real_escape_string($name);
            $deskripsi = $db->real_escape_string($deskripsi);


            $berat = $db->real_escape_string($berat);
            $kuantitas = $db->real_escape_string($kuantitas);
            $harga = $db->real_escape_string($harga);

            $filegambar = $gambar;
            $last_update = strval(date("Y-m-d H:i:s"));
            $idpegawai = $_SESSION['idpegawai'];
            //Asign a query
            $id = $_GET["id"];


            $query2 = " UPDATE produk SET namaproduk='$name', deskripsi='$deskripsi', idkategori='$kategori', idsub_kategori='$subkategori', berat='$berat', kuantitas='$kuantitas', last_update='$last_update', idpegawai='$idpegawai', price='$harga', file_gambar='$filegambar' WHERE idproduk LIKE '%$id%' ";
            // Execute the query
               $result2 = mysqli_query($db,$query2 );
               if (!$result2){
                    die ("Could not query the database: <br />". $db ->error);
                }else{
                    echo "<script>alert('Update Data Sukses!.');window.location='semua_produk.php'</script>";
                }
                $db->close();
            }


            }
        ?>

                <tr>
                    <td valign="top">Kategori</td>
                    <td valign="top">:</td>
                    <td valign="top">
                        <select id="kategori" name="kategori">

                    <?php
                        $querykategori = " SELECT * FROM kategori";
                        $resultkategori = $db->query($querykategori);

                        while($rowkategori = mysqli_fetch_array($resultkategori)){
                            if ((isset($kategori)) && ($kategori==$rowkategori['idkategori'])) {
                                echo '<option value='.$rowkategori['idkategori'].' selected="true" >'.$rowkategori['namakategori'].'</option>';
                            }
                            else
                            {
                                echo '<option value='.$rowkategori['idkategori'].'>'.$rowkategori['namakategori'].'</option>';
                            }
                        }
                    ?>
                    </select>
                    </td>
                    <td valign="top">
                        <span class="error">*<?php echo '' .$error_kategori.''; ?>*</span>
                    </td>
                </tr>

                <tr>
                    <td valign="top">Sub Kategori</td>
                    <td valign="top">:</td>
                    <td valign="top"><select id="subkategori" name="subkategori">
                        <?php
                            $querysubkategori = " SELECT * FROM sub_kategori WHERE idkategori LIKE '%$kategori%'";
                            $resultsubkategori = $db->query($querysubkategori);

                            while($rowsubkategori = mysqli_fetch_array($resultsubkategori)){
                                if ((isset($subkategori)) && ($subkategori==$rowsubkategori['idsub_kategori'])) {
                                    echo '<option value='.$rowsubkategori['idsub_kategori'].' selected="true">'.$rowsubkategori['namasubkategori'].'</option>';
                                }
                                else{
                                    echo '<option value='.$rowsubkategori['idsub_kategori'].'>'.$rowsubkategori['namasubkategori'].'</option>';
                                }
                            }
                        ?>

                    </select>
                    </td>
                    <td valign="top"><span class="error">*<?php echo '' .$error_subkategori.''; ?>*</span>
                    </td>
                </tr>

                <tr>
                <td valign="top">Nama Produk</td>
                <td valign="top">:</td>
                <td valign="top"><input type="text" name="name" size="30" maxlength="50" placeholder="Name Produk" value="<?php echo $name;?>"></td>
                <td valign="top"><span class="error">*<?php echo '' .$error_name.''; ?>*</span></td>

            </tr>

            <tr>
                <td valign="top">Deskripsi</td>
                <td valign="top">:</td>
                <td valign="top"><textarea name="deskripsi" rows="5" cols="30" placeholder="Deskripsi Produk" value=""><?php echo $deskripsi;?></textarea></td>
                <td valign="top"><span class="error">*<?php echo '' .$error_deskripsi.''; ?>*</span></td>
            </tr>

            <tr>
                <td valign="top">Berat</td>
                <td valign="top">:</td>
                <td valign="top"><input type="text" name="berat" size="10" maxlength="20" placeholder="Berat (Gram)" value="<?php echo $berat;?>"></td>
                <td valign="top"><span class="error">*<?php echo '' .$error_berat.''; ?>*</span></td>
            </tr>

            <tr>
                <td valign="top">Stok Produk</td>
                <td valign="top">:</td>
                <td valign="top"><input type="text" name="kuantitas" size="10" maxlength="20" placeholder="Stok Produk" value="<?php echo $kuantitas;?>"></td>
                <td valign="top"><span class="error">*<?php echo '' .$error_kuantitas.''; ?>*</span></td>
            </tr>

            <tr>
                <td valign="top">Harga Produk</td>
                <td valign="top">:</td>
                <td valign="top"><input type="text" name="harga" size="10" maxlength="20" placeholder="Harga Produk (Rp)" value="<?php echo $harga;?>"></td>
                <td valign="top"><span class="error">*<?php echo '' .$error_harga.''; ?>*</span></td>
            </tr>

           <tr>
                <td valign="top">Foto Produk</td>
                <td valign="top">:</td>
                <td valign="top">
                    <input type="file" name="uploadedit" value="<?php echo $gambar;?>">
                </td>
                <td valign="top"><span class="error">*<?php echo '' .$error_gambar.''; ?>*</span></td>

            </tr>


    		<tr>
    				<td valign="top" colspan="3"><br><center>
                        <input type="submit" name="submit" value="Submit" style="padding: 7px; background-color: darkgrey">&nbsp;
                        </center>
                    </td>
    		</tr>
    		<tr>
    				<td><a href="semua_produk.php">Kembali</a></td>
    		</tr>
    		</table>
    	</form>


    	<?php
    	//update data into database






    	?>

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
            <script type="text/javascript">
        function getSubKategori(){
            var kategori_select = document.getElementById("kategori");

            var kategori_id = kategori_select.options[kategori.selectedIndex].value;
            console.log('KategoriId : ' + kategori_id);


            var xhr = new XMLHttpRequest();
            var url = 'ajax/getsubkategori.php?kategori_id=' + kategori_id;
            // open function
            xhr.open('GET', url, true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            // check response is ready with response states = 4
            xhr.onreadystatechange = function(){
                if(xhr.readyState == 4 && xhr.status == 200){
                    var text = xhr.responseText;
                    //console.log('response from ajax/getsubkategori.php : ' + xhr.responseText);
                    var subkategori_select = document.getElementById("subkategori");
                    subkategori_select.innerHTML = text;
                    subkategori_select.style.display='inline';
                }
            }

            xhr.send();
        }

        var kategori_select = document.getElementById("kategori");
        kategori_select.addEventListener("change", getSubKategori);
        </script>

        <!-- Main JS-->
        <script src="js/main.js"></script>
        <script src="js/live-search.js"></script>


        </body>

        </html>