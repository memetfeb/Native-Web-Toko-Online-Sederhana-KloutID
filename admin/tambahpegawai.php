
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
	// Include our login information
	require_once('config.php');
	// Connect
	$db = mysqli_connect($db_host, $db_username, $db_password, $db_database); 

	if(mysqli_connect_errno()){
		die('Tidak bisa terhubung dengan database.<br>'.mysqli_connect_error());
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
        <title>Dashboard</title>

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
                                    <h2 class="title-1">TAMBAH PEGAWAI</h2>
                                </div>
                            </div>
                    </div>
                    <br>
                    <div class="row">
                       <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
		<table class="table table-borderless table-produk">
			
			<?php
				$error = 0;
				if (isset($_POST["submit"])){
					$level = test_input($_POST['level']); 
					if ($level == 0){
						$error_level = "level is required";
						$valid_level = FALSE;
					}else {
						$valid_level = TRUE;
						$error_level ="";
					}
				}else{
					$error_level = "level is required";
					$valid_level = FALSE;
					$level="";
				}
				
				if (isset($_POST["submit"])){
					$username = test_input($_POST['username']); 
					if ($username == ''){
						$error_username = "username is required";
						$valid_username = FALSE;
					}elseif (!preg_match("/^[a-zA-Z]*$/",$username)) {
						$error_username = "Only letters and white space allowed";
						$valid_username = FALSE;
					}else{
						$valid_username = TRUE;
						$error_username= "";
					}
				}else{
					$valid_username = FALSE;
					$error_username = "username is required";
					$username="";
				}


				if (isset($_POST["submit"])){
					$namalengkap = test_input($_POST['namalengkap']); 
					if ($namalengkap == ''){
						$error_namalengkap = "namalengkap is required";
						$valid_namalengkap = FALSE;
					}elseif (!preg_match("/^[a-zA-Z ]*$/",$namalengkap)) {
						$error_namalengkap = "Only letters and white space allowed";
						$valid_namalengkap = FALSE;
					}else{
						$valid_namalengkap = TRUE;
						$error_namalengkap= "";
					}
				}else{
					$valid_namalengkap = FALSE;
					$error_namalengkap = "namalengkap is required";
					$namalengkap="";
				}

				if (isset($_POST["submit"])){
					$password = test_input($_POST['password']); 
					if ($password == ''){
						$error_password = "password is required";
						$valid_password = FALSE;
					}else{
						$valid_password = TRUE;
						$error_password= "";
					}
				}else{
					$valid_password = FALSE;
					$error_password = "";
					$password="";
				}

				
				if (isset($_POST["submit"])){
					$email = test_input($_POST['email']);
					$error_email="" ;
					if ($email == ''){
						$error_email = "Email is required";
						$valid_email = FALSE;
					}elseif (!preg_match("/[a-z0-9._%+-]+@[a-z0-9.-]+.[a-z]{2,}$/",$email)) {
						$error_email = "Format email allowed";
						$valid_email = FALSE;
					}else{
						$valid_email = TRUE;
						$error_email="";}
				}else{
					$error_email = "Email is required";
					$valid_email = FALSE;
					$email="";
				}
				
			$sql="select * from pegawai where (username='$username' or email='$email');";
            $res=mysqli_query($db,$sql);
            if (mysqli_num_rows($res) > 0) {
            // output data of each row
            $row = mysqli_fetch_assoc($res);
            if ($username==$row['username'])
            {
				$error_username = "Username already exists";
				$valid_username = FALSE;
            }
            elseif($email==$row['email'])
            {
                $error_email = "Email already exists";
				$valid_email = FALSE;
            }
        }
        
				function test_input($data) {
					$data = trim($data);
					$data = stripslashes($data);
					$data = htmlspecialchars($data); 
					return $data;
				}
			?>

			<tr>
				<td valign="top">Level Pegawai</td>
				<td valign="top">:</td>
				<td valign="top"><select id="level" name="level">
					<option value=0>--Select Level--</option>
					<?php
						$query = " SELECT * FROM level_pegawai";
						$result = $db->query($query);
						
						while($row = mysqli_fetch_array($result)){
							echo '<option value='.$row['idlevel'].'>'.$row['nama_level'].'</option>';		
							}
					?>
				</select>
				<td valign="top"><span class="error">*<?php echo '' .$error_level.''; ?>*</span></td>
			</tr>
			<tr>
				<td valign="top">Username</td>
				<td valign="top">:</td>
				<td valign="top"><input type="text" name="username" size="30" maxlength="10" placeholder="Username" value="<?php echo $username;?>"></td>
				<td valign="top"><span class="error">*<?php echo '' .$error_username.''; ?>*</span></td>

			</tr>

			<tr>
				<td valign="top">Nama Lengkap</td>
				<td valign="top">:</td>
				<td valign="top"><input type="text" name="namalengkap" size="30" maxlength="40" placeholder="Nama Lengkap" value="<?php echo $namalengkap;?>"></td>
				<td valign="top"><span class="error">*<?php echo '' .$error_namalengkap.''; ?>*</span></td>

			</tr>
			<tr>
				<td valign="top">Email</td>
				<td valign="top">:</td>
				<td valign="top"><input type="email" name="email" size="30" placeholder="Email"></td>
				<td valign="top"><span class="error">*<?php echo '' .$error_email.''; ?>*</span></td>
			</tr>
			<tr>
				<td valign="top">Password</td>
				<td valign="top">:</td>
				<td valign="top"><input type="password" name="password" size="30" placeholder="password"></td>
				<td valign="top"><span class="error">*<?php echo '' .$error_password.''; ?>*</span></td>
			</tr>

			<tr>
				<td valign="top" colspan="3"><br><center>
                    <input type="submit" name="submit" value="Submit" style="padding: 7px; background-color: darkgrey">&nbsp;
				    <input type="reset" name="reset" value="Reset" onclick="document.location.reload(true)" style="padding: 7px; background-color: darkgrey">
                    </center>
                </td>
			</tr>
			<tr>
				<td><a href="semua_pegawai.php">Kembali</a></td>
			</tr>
		</table>
	</form>

	<?php
		//insert data into database
		if ($valid_level && $valid_username && $valid_namalengkap && $valid_email && $valid_password){
			// Include our login information 
			
			$idpegawai = uniqid();
			//Asign a query
			$query2 = "INSERT INTO pegawai VALUES('$idpegawai', '$username', '$namalengkap', '$email', '$level', '$password')";
			// Execute the query
			$result2 = mysqli_query($db, $query2); 
			if (!$result2) {
				printf("Error: %s\n", mysqli_error($db));
				exit();
			}else{
				echo "<script>alert('Input New Pegawai Sukses!');window.location='semua_pegawai.php'</script>";
			}
			//close db connection }
			$db->close();
			}
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
        <script src="vendor/select2/select2.min.js">
        </script>
		
		<script type="text/javascript">
		
		</script>

        <!-- Main JS-->
        <script src="js/main.js"></script>
        <script src="js/live-search.js"></script>
    </body>



    </html>
<!-- end document-->
