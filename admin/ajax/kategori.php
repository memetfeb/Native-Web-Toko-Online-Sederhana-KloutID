<?php

require_once('config.php');
    $db =mysqli_connect($db_host, $db_username, $db_password, $db_database);

   if (mysqli_connect_errno()){
    die ("Could not connect to the database: <br />".
    mysqli_connect_error( ));
  }

$keywords = $_GET["keywords"];

$query = "SELECT * FROM kategori WHERE idkategori LIKE '%$keywords%' OR namakategori LIKE '%$keywords%' ";
$result = mysqli_query($db, $query);
if (!$result) {
    printf("Error: %s\n", mysqli_error($db));
    exit();
}
$i = 1;

				echo '<table class="table table-borderless table-striped table-produk">';
				echo '<tr>
				<th>No</th>
                <th>ID Kategori</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>';
                echo '</tr>';
                
                            // Fetch and display the results
                            while ($rowkategori = mysqli_fetch_array($result)) {
                                echo '<tr>';
                                echo '<td>'.$i.'</td> ';
                                echo '<td>'.$rowkategori["idkategori"].'</td> ';
                                echo '<td>'.$rowkategori["namakategori"].'</td> ';
                                echo '<td>
                                        <div class="table-data-feature">                                    
                                        <a href="editkategori.php?id='.$rowkategori["idkategori"].'" class="klik_menu" id="edit">
                                        <button type="submit" class="item " data-toggle="tooltip" data-placement="top" title="Edit" name="edit">
                                                <i class="zmdi zmdi-edit"></i>
                                            </button>
                                        </a>
                                        
                                        '
                                ?>
                                        <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??'))
                                                {location.href='hapuskategori.php?id=<?php echo $rowkategori["idkategori"];?>'}
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
