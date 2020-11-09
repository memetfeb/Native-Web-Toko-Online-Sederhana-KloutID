<?php

require_once('config.php');
    $db =mysqli_connect($db_host, $db_username, $db_password, $db_database);

   if (mysqli_connect_errno()){
    die ("Could not connect to the database: <br />".
    mysqli_connect_error( ));
  }

$keywords = $_GET["keywords"];

$query = "SELECT pegawai.idpegawai, pegawai.username, pegawai.nama_lengkap, pegawai.email , level_pegawai.nama_level FROM pegawai,level_pegawai WHERE pegawai.idlevel = level_pegawai.idlevel and (pegawai.idpegawai LIKE '%$keywords%' OR pegawai.username LIKE '%$keywords%' OR pegawai.nama_lengkap LIKE '%$keywords%') ORDER BY pegawai.idpegawai";
$result = mysqli_query($db, $query);
if (!$result) {
    printf("Error: %s\n", mysqli_error($db));
    exit();
}
$i = 1;

				echo '<table class="table table-borderless table-striped table-produk">';
				echo '<tr>';
				echo '<th>No</th>';
                echo '<th>ID Pegawai</th>';
                echo '<th>Nama</th>';
                echo '<th>User Name</th>';
                echo '<th>Email</th>';
                echo '<th>Jabatan</th>';
                echo '<th>Aksi</th>';
                echo '</tr>';
                
                            // Fetch and display the results
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<tr>';
                                echo '<td>'.$i.'</td> ';
                                echo '<td>'.$row["idpegawai"].'</td> ';
                                echo '<td>'.$row["nama_lengkap"].'</td> ';
                                echo '<td>'.$row["username"].'</td>';
                                echo '<td>'.$row["email"].'</td>';
                                echo '<td>'.$row["nama_level"].'</td>';
                                echo '<td>
                                        <div class="table-data-feature">                                    
                                        <a href="editpegawai.php?id='.$row["idpegawai"].'" class="klik_menu" id="edit">
                                            <button type="submit" class="item " data-toggle="tooltip" data-placement="top" title="Edit" name="edit">
                                                <i class="zmdi zmdi-edit"></i>
                                            </button>
                                        </a>'
                                ?>
                                        <a onclick="if(confirm('Apakah anda yakin ingin menghapus pegawai ini ?'))
                                                {location.href='hapuspegawai.php?id=<?php echo $row["idpegawai"];?>'}
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
