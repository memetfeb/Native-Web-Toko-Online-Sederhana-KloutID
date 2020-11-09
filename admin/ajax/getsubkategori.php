<?php
require_once('config.php');
    $db =mysqli_connect($db_host, $db_username, $db_password, $db_database);

   if (mysqli_connect_errno()){
    die ("Could not connect to the database: <br />".
    mysqli_connect_error( ));
  }
  
$kategori_id = $_GET['kategori_id'];
$querysubkategori = "SELECT * FROM sub_kategori WHERE idkategori LIKE '%$kategori_id%'";
$resultsubkategori = mysqli_query($db, $querysubkategori);
while($rowsubkategori = mysqli_fetch_assoc($resultsubkategori)){
	echo '<option value='.$rowsubkategori['idsub_kategori'].'>'.$rowsubkategori['namasubkategori'].'</option>';
}

?>