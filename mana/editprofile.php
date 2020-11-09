<?php

include('includes/navbar.php');



$id = $_GET["id"];        
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


?>
<!--modal upload gambar-->


  <div class="main-content" style="padding-left: 30px ; width: 100% ; padding-right: 30px " >
                        <div class="row">
                                <div class="col-md-12">
                                    <div class="overview-wrap">
                                        <h2 class="title-1">EDIT PEGAWAI</h2>
                                    </div>
                                </div>
                        </div>
                        <br>
                        <div class="row">
                           <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?id='.$id;?>" >
                          <table class="table table-borderless table-produk">
                             <?php  
                            
                                  $query = " SELECT * FROM pegawai WHERE idpegawai LIKE '%$id%' ";
                                  // Execute the query
                                  $result = $con->query($query); 
                                  if (!$result){
                                    printf("Error: %s\n", mysqli_error($con));                
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
                                      }
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
                                              $valid_username = TRUE;
                                                        $error_username= "";
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
                                              $valid_namalengkap = TRUE;
                                                        $error_namalengkap= "";
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
                                              $valid_email = TRUE;
                                                            $error_email="";
                                                        }

                                                if (isset($_POST["submit"])){
                    $password = test_input($_POST['password']); 
                    if ($password == ''){
                        $error_password = "Kosongkan Jika Tidak Akan Mengganti Password";
                        $valid_password = TRUE;
                    }else{
                        $valid_password = TRUE;
                        $error_password= "";
                    }
                }else{
                    $valid_password = FALSE;
                    $error_password = "Kosongkan Jika Tidak Akan Mengganti Password";
                    $password="";
                }
                                            
                                          if (isset($_POST["submit"])){
                                               $sqlcekemail="select * from pegawai where (username='$username' or email='$email');";
                                                     $cekemail=mysqli_query($con,$sqlcekemail);
                                                        if (mysqli_num_rows($cekemail) > 0) {
                                                     // output data of each row
                                                      $rowcekemail = mysqli_fetch_assoc($cekemail);
                                                      if ( $username!=$usernameawal){
                                                             if ($username==$rowcekemail['username'])
                                                            {
                                                                $error_username = "Username already exists";
                                                                $valid_username = FALSE;
                                                            }else{
                                                                 $valid_username = TRUE;
                                                                 $error_username="";
                                                             }
                                                        }else{
                                                             $valid_username = TRUE;
                                                             $error_username="";
                                                        }
                                                      if ($email!=$emailawal){
                                                             if ($email==$rowcekemail['email'])
                                                            {
                                                                $error_email = "Email already exists";
                                                                $valid_email = FALSE;
                                                            }else{
                                                                $valid_email = TRUE;
                                                                $error_email="";
                                                 
                                                            }
                                                        }else{
                                                           $valid_email = TRUE;
                                                           $error_email="";
                                                        }}}

                                            function test_input($data) {
                                              $data = trim($data);
                                              $data = stripslashes($data);
                                              $data = htmlspecialchars($data); 
                                              return $data;
                                            }

            if (isset($_POST["submit"])){ 
            if ($valid_username && $valid_namalengkap && $valid_email){
            //escape inputs data
                $username = $con->real_escape_string($username);
                $namalengkap = $con->real_escape_string($namalengkap);
                $email = $con->real_escape_string($email);
            //Asign a query
                $id = $_GET["id"];
                if($password == ""){
                   $query2 = " UPDATE pegawai SET username='$username', nama_lengkap='$namalengkap', email='$email' WHERE idpegawai LIKE '%$id%' ";

                }else{
                    $query2 = " UPDATE pegawai SET username='$username', nama_lengkap='$namalengkap', email='$email', password='$password' WHERE idpegawai LIKE '%$id%' ";

                }
            // Execute the query
               $result2 = mysqli_query($con,$query2 ); 
               if (!$result2){
                    die ("Could not query the database: <br />". $con ->error);
                }else{
                    echo "<script>alert('Update Data Sukses!.');window.location='profil.php'</script>";
                }
                $con->close();
            }
            

            }

        ?>

      <tr>
            <td valign="top">Username</td>
            <td valign="top">:</td>
            <td valign="top"><input type="text" name="username" size="30" maxlength="10" placeholder="Username" value="<?php echo $username;?>"></td>
            <td valign="top"><span>*<?php echo '' .$error_username.''; ?>*</span></td>
        </tr>
        <tr>
            <td valign="top">Nama Lengkap</td>
            <td valign="top">:</td>
            <td valign="top"><input type="text" name="namalengkap" size="30" maxlength="40" placeholder="Nama Lengkap" value="<?php echo $namalengkap;?>"></td>
            <td valign="top"><span>*<?php echo '' .$error_namalengkap.''; ?>*</span></td>
        </tr>
        <tr>
            <td valign="top">Email</td>
            <td valign="top">:</td>
            <td valign="top"><input type="text" name="email" size="30" placeholder="Email" value="<?php echo $email;?>"></td>
            <td valign="top"><span>*<?php echo '' .$error_email.''; ?>*</span></td>
        </tr>
            <tr>
                <td valign="top">Password</td>
                <td valign="top">:</td>
                <td valign="top"><input type="password" name="password" size="30" placeholder="password" >
                </td>
                <td valign="top"><span >*<?php echo '' .$error_password.''; ?>*</span>
                </td>
            </tr>

        <tr>
            <td valign="top" colspan="3"><br><center>
                        <input type="submit" name="submit" value="Submit" style="padding: 7px; background-color: darkgrey">&nbsp;
                        </center>
                    </td>
        </tr>
        <tr>
            <td><a href="profil.php">Kembali</a></td>
        </tr>
        </table>
      </form>


      <?php 
      //update data into database
        

        
      
      ?>

                </div>
                    </div>


<!-- /.container-fluid -->

<?php

include('includes/footer.php');
?>