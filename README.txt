SPESIFIKASI WEB TOKO ONLINE

Contoh Struktur Tabel
• kategori (idkategori, nama)
• sub_kategori (idsub_kategori, nama)
• produk (idproduk, nama, deskripsi, idkategori, idsub_kategori, file_gambar, …, last_update, idpegawai)
• pegawai(idpegawai, username, nama_lengkap, email, password,level)
Keterangan: 
• Titik-titik pada tabel produk dapat ditambahkan field-field lainnya sesuai dengan
kebutuhan, misalnya ukuran, warna, harga, dsb.
• Level pegawai ada 2, yaitu admin atau manager
• Produk yang dibuat bisa bervariasi, misalnya buku, barang elektronik, baju, content blog (postingan), dsb … (usahakan bervariasi antar kelompok)

Kebutuhan fungsional:
A. Pengunjung
1. Melihat data produk berdasarkan kategori dan sub kategori (dalam bentuk grid)
2. Melihat informasi detail produk
3. Melakukan pencarian data produk
B. Admin
1. CRUD (create, read, update, delete) data kategori
2. CRUD (create, read, update, delete) data sub kategori
3. CRUD (create, read, update, delete) data produk
4. CRUD (create, read, update, delete) data pegawai
5. Edit profil dan password admin
C. Manager
1. Melihat data produk
2. Melihat rekap data produk per kategori dan sub kategori (dalam bentuk tabel)
3. Melihat grafik data produk per kategori (misalnya, sumbu x menyatakan kategori,
sumbu y menyatakan jumlah produk dalam kategori tersebut)
4. Edit profil dan password manager
