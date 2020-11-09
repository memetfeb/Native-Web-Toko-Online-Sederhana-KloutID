<?php

require_once('config.php');
    $db =mysqli_connect($db_host, $db_username, $db_password, $db_database);

   if (mysqli_connect_errno()){
    die ("Could not connect to the database: <br />".
    mysqli_connect_error( ));
  }

$keywords = $_GET["keywords"];

$query = "SELECT a.idsub_kategori as ID, a.namasubkategori as subkategori, b.namakategori as kategori FROM sub_kategori a, kategori b WHERE a.idkategori = b.idkategori AND (a.idsub_kategori LIKE '%$keywords%' OR a.namasubkategori LIKE '%$keywords%' OR b.namakategori LIKE '%$keywords%') ORDER BY b.namakategori";
$result = mysqli_query($db, $query);
if (!$result) {
    printf("Error: %s\n", mysqli_error($db));
    exit();
}
$i = 1;

				echo '<table class="table table-borderless table-striped table-produk">';
				echo '<tr>
				<th>No</th>
                <th>ID SubKategori</th>
                <th>SubKategori</th>
                <th>Kategori</th>
                <th>Aksi</th>';
                echo '</tr>';
                
                            // Fetch and display the results
                            while ($rowsubkategori = mysqli_fetch_array($result)) {
                                echo '<tr>';
                                echo '<td>'.$i.'</td> ';
                                echo '<td>'.$rowsubkategori["ID"].'</td> ';
                                echo '<td>'.$rowsubkategori["subkategori"].'</td> ';
                                echo '<td>'.$rowsubkategori["kategori"].'</td> ';
                                echo '<td align = "center">
                                        <div class="table-data-feature">                                    
                                        <a href="editsubkategori.php?id='.$rowsubkategori["ID"].'" class="klik_menu" id="edit">
                                        <button type="submit" class="item " data-toggle="tooltip" data-placement="top" title="Edit" name="edit">
                                                <i class="zmdi zmdi-edit"></i>
                                            </button>
                                        </a>
                                        
                                        '
                                ?>
                                        <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??'))
                                                {location.href='hapussubkategori.php?id=<?php echo $rowsubkategori["ID"];?>'}
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
