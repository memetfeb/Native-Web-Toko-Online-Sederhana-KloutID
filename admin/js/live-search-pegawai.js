var keywords = document.getElementById('keywords');
var tombolCari = document.getElementById('tombol-cari');
var container = document.getElementById('container');

//add event ketika keyword ditulis
keywords.addEventListener('keyup', function() {


	// buat objek ajax
	var xhr = new XMLHttpRequest();

	//cek kesiapan ajax

	xhr.onreadystatechange = function(){
		if(xhr.readyState == 4 && xhr.status == 200) {
			container.innerHTML = xhr.responseText;
		}
	}
	
	


	//ekseskusi ajax
	xhr.open('GET', 'ajax/pegawai.php?keywords=' +keywords.value, true);
	xhr.send();


});

