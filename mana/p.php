<?php 
include('includes/scripts.php');
require_once('includes/conn.php');
 ?>
 <link href="css/sb-admin-2.css" rel="stylesheet">
<!--  <style>

body{
	background-image: linear-gradient(to top, #a18cd1 0%, #fbc2eb 100%);
	}



 </style> -->
 <!-- container -->
<div class="container">
		<br>
				<br>
					<!-- row -->
	<div class="row text-align-center">
		<!-- colom -->
		<div class="col">
			<!-- tabel -->
			<td class="align-middle">
			<table id="myTable" class="table table-bordered table-dark">

				<tr><th>Nama Kategori</th><th>Nama Subkategori</th><th>nama Kategori</th></tr>
				<?php 
				$sql = mysqli_query($con,"SELECT a.namakategori, b.namasubkategori, c.namaproduk FROM kategori a, sub_kategori b, produk c where a.idkategori = b.idkategori and c.idsub_kategori = b.idsub_kategori");
				 while($as = mysqli_fetch_array($sql)){
				 ?>
					<tr><td><?php echo $as['namakategori']; ?></td><td><?php echo $as['namasubkategori']; ?></td><td><?php echo $as['namaproduk']; ?></td></tr>
				<?php } ?>
				
				<!-- end table -->
			</table>
			</td>
			<!-- end colom -->
		</div>
		<!-- end row -->
	</div>

	<!-- end container -->
</div>


<script>
	$(function() {  
function groupTable($rows, startIndex, total){
if (total === 0){
return;
}
var i , currentIndex = startIndex, count=1, lst=[];
var tds = $rows.find('td:eq('+ currentIndex +')');
var ctrl = $(tds[0]);
lst.push($rows[0]);
for (i=1;i<=tds.length;i++){
if (ctrl.text() ==  $(tds[i]).text()){
count++;
$(tds[i]).addClass('deleted');
lst.push($rows[i]);
}
else{
if (count>1){
ctrl.attr('rowspan',count);
groupTable($(lst),startIndex+1,total-1)
}
count=1;
lst = [];
ctrl=$(tds[i]);
lst.push($rows[i]);
}
}
}
groupTable($('#myTable tr:has(td)'),0,4);
$('#myTable .deleted').remove();
});
</script>
<!-- </body> -->