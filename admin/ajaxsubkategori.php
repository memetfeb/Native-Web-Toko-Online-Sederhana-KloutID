<?php
$kategori = $_GET['idkategori'];
$query      = mysql_query("SELECT * FROM `sub_kategori` WHERE idkategori=".$kategori);
$subkategori  = array();
while($data = mysql_fetch_array($query)){
    $subkategori[] = array('idsub_kategori'=>$data['idsub_kategori'],'name'=>$data['namasubkategori']);
}
echo json_encode($subkategori);

?>