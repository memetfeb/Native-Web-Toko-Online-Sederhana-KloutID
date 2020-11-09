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
            <title>Edit Kategori</title>

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
                                        <h2 class="title-1">EDIT KATEGORI</h2>
                                    </div>
                                </div>
                        </div>
                        <br>
                        <div class="row">
                           <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?id='.$id;?>" >
    		                  <table class="table table-borderless table-produk">
    	                       <?php  
    				                
                                  $query = " SELECT * FROM kategori WHERE idkategori LIKE '%$id%' ";
                                  // Execute the query
                                  $result = $db->query($query); 
                                  if (!$result){
                                  	printf("Error: %s\n", mysqli_error($db));                
                                    exit();
                                  }else{
                                  	while ($row = $result->fetch_object()){
                                  		$namakategori = $row->namakategori;
                                        $idkategori = $row->idkategori;
                                        $namakategoriawal = $row->namakategori;
                                  		}
                                  }
                                    if (isset($_POST["submit"])){
                                    	$namakategori = test_input($_POST['namakategori']); 
                                    	if ($namakategori == ''){
                                    		$error_namakategori = "nama kategori is required";
                                        	$valid_namakategori = FALSE;
                                    	}elseif (!preg_match("/^[a-zA-Z ]*$/",$namakategori)) {
                                    		$error_namakategori = "Only letters and white space allowed";
                                    		$valid_namakategori = FALSE;
                                        }else{
                                    		$valid_namakategori = TRUE;
                                    		$error_namakategori= "";
                                    	}
                                    }else{
                                    		$valid_namakategori = TRUE;
                                            $error_namakategori= "";
                                    }
                                    				
                                    				
                                    				
                    if (isset($_POST["submit"])){
                        $sql="select * from kategori where namakategori='$namakategori';";
                        $res=mysqli_query($db,$sql);
                        if (mysqli_num_rows($res) > 0) {
                            // output data of each row
                            $row = mysqli_fetch_assoc($res);
                            if (($namakategori==$row['namakategori']) && ($namakategori!=$namakategoriawal)  )
                            {
                                $error_namakategori = "Nama kategori already exists";
                                $valid_namakategori = FALSE;
                            }
                        }
                    }else{
                        $valid_email = TRUE;
                        $error_email="";
                    }

                   function test_input($data) {
                        $data = trim($data);
                        $data = stripslashes($data);
                        $data = htmlspecialchars($data); 
                        return $data;
                    }

            if (isset($_POST["submit"])){ 
            if ($valid_namakategori){
            //escape inputs data
                
                $namakategori = $db->real_escape_string($namakategori);
               
            //Asign a query
                $id = $_GET["id"];
                   $query2 = " UPDATE kategori SET namakategori='$namakategori' WHERE idkategori LIKE '%$id%'";
                // Execute the query
               $result2 = mysqli_query($db,$query2 ); 
               if (!$result2){
                    die ("Could not query the database: <br />". $db ->error);
                }else{
                    echo "<script>alert('Update Data Sukses!.');window.location='semua_kategori.php'</script>";
                }
                $db->close();
            }
            

            }

        ?>

        
    		<tr>
    				<td valign="top">Nama Kategori</td>
    				<td valign="top">:</td>
    				<td valign="top"><input type="text" name="namakategori" size="30" maxlength="40" placeholder="Nama Kategori" value="<?php echo $namakategori;?>"></td>
    				<td valign="top"><span class="error">*<?php echo '' .$error_namakategori.''; ?>*</span></td>
    		</tr>
    		

    		<tr>
    				<td valign="top" colspan="3"><br><center>
                        <input type="submit" name="submit" value="Submit" style="padding: 7px; background-color: darkgrey">&nbsp;
                        </center>
                    </td>
    		</tr>
    		<tr>
    				<td><a href="semua_kategori.php">Kembali</a></td>
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
        </body>

        </html>