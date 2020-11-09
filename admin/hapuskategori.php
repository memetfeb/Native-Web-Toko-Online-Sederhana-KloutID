
<?php
require_once('config.php');
    $db =mysqli_connect($db_host, $db_username, $db_password, $db_database);

   if (mysqli_connect_errno()){
    die ("Could not connect to the database: <br />".
    mysqli_connect_error( ));
  }

$id = $_GET["id"];

mysqli_query($db,"DELETE FROM kategori WHERE idkategori LIKE '%$id%'");
header("location:semua_kategori.php");

?>