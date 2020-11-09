<?php

require_once('config.php');
    $db =mysqli_connect($db_host, $db_username, $db_password, $db_database);

   if (mysqli_connect_errno()){
    die ("Could not connect to the database: <br />".
    mysqli_connect_error( ));
  }

$keywords = $_GET["keywords"];
$query = " SELECT a.idproduk as ID, a.namaproduk as Nama, a.kuantitas as Kuantitas, b.namakategori as Kategori, c.namasubkategori as SubKategori, a.price as Harga FROM produk a, kategori b, sub_kategori c WHERE a.idkategori = b.idkategori and a.idsub_kategori = c.idsub_kategori and (idproduk LIKE '%$keywords%' OR
         a.namaproduk LIKE '%$keywords%' OR
         b.namakategori LIKE '%$keywords%' OR
         c.namasubkategori LIKE '%$keywords%') 
         ORDER BY a.idproduk";
$result = mysqli_query($db, $query);
if (!$result) {
    printf("Error: %s\n", mysqli_error($db));
    exit();
}

$i = 1;
                            echo '<table class="table table-borderless table-striped table-produk">
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Sub-Kategori</th>
                                <th>Kuantitas</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>';
                
                          // Execute the query
                            

                          // Fetch and display the results
                             while ($row = mysqli_fetch_array($result)) {
                                echo '<tr>';
                                echo '<td>'.$i.'</td> ';
                                echo '<td>'.$row["ID"].'</td> ';
                                echo '<td>'.$row["Nama"].'</td> ';
                                echo '<td>'.$row["Kategori"].'</td>';
                                echo '<td>'.$row["SubKategori"].'</td>';
                                echo '<td>'.$row["Kuantitas"].'</td>';
                                echo '<td>'.$row["Harga"].'</td>';
                                echo '<td>
                                        <div class="table-data-feature">                                    
                                        <a href="editproduk.php?id='.$row["ID"].'" class="klik_menu" id="edit">
                                            <button type="submit" class="item " data-toggle="tooltip" data-placement="top" title="Edit" name="edit">
                                                <i class="zmdi zmdi-edit"></i>
                                            </button>
                                        </a>';
                                ?>
                                        <a onclick="if(confirm('Apakah anda yakin ingin menghapus produk ini ?'))
                                                {location.href='hapusproduk.php?id=<?php echo $row["ID"];?>'}
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
                        echo '</table>';

 ?>
