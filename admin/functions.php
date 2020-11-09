<?php 
  require_once('config.php');
  $db =mysqli_connect($db_host, $db_username, $db_password, $db_database);

   if (mysqli_connect_errno()){
    die ("Could not connect to the database: <br />".
    mysqli_connect_error( ));
  }
    function query($query){
      global $db;
        $result = mysqli_query($db, $query);
        $rows =[];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    function cari($keywords){
      $query = "SELECT idproduk, nama, deskripsi, idkategori, idsub_kategori, berat FROM produk
          WHERE 
         idproduk LIKE '%$keywords%' OR
         nama LIKE '%$keywords%' OR
         idkategori LIKE '%$keywords%' OR
         idsub_kategori LIKE '%$keywords%' OR
         berat LIKE '%$keywords%'
        ORDER BY idproduk";

        return query($query);
    }

    //  function cari($keyword){
      //  $query = "SELECT idproduk, nama, deskripsi, idkategori, idsub_kategori, berat FROM produk WHERE idproduk = '$keyword' ";

   // }

  ?>