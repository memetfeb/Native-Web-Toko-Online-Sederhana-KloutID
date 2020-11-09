var keywords = document.getElementById('keywords');
var container = document.getElementById('load_data');

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
	xhr.open('GET', 'produk.php?keywords=' +keywords.value, true);
	xhr.send();


});
