Task Management
=============================

![Build Status](https://api.travis-ci.org/freeman-lab/pixel-grid.svg?branch=master&status=passed)
![Latest Stable Version](https://poser.pugx.org/antkaz/intercom-bot/v)

Program ini merupakan aplikasi berbasis web untuk melakukan managemen tugas. Pengguna dapat menambahkan dan menghapus tugas, serta dapat melakukan reservasi dan membatalkan reservasi tugas. Pengguna dapat lebih mudah dalam memanagemen tugas, sehingga pengguna tidak perlu takut melawatkan tugas.


Requirments
=======================
* PHP >= 5.6
* HTML5
* SQLite 3.12.2


Installation
=======================
Download
[Program](https://github.com/nandartika/TaskManagement)
[XAMPP](https://www.apachefriends.org/download.html)

Install aplikasi XAMPP
Jalankan XAMPP, lalu start Apache

Download program dalam bentuk zipper (.zip).
Hasil download program simpan dalam folder htdoc (biasanya C:/xampp/htdoc).
Unzip file TaskManagement.rar.


Usage
=========================
```bash
start chrome
```
insert address in browser
```
http://localhost/TaskManagement/public/
```

Lakukan login dengan memasukan username dan password yang benar.
Username = "Admin",
Password = "Admin123"

Menambahkan tugas dengan menekan tombol "Add New Task". Upload file dengan menekan tombol "Choose File". File yang diupload bisa lebih dari satu file, file yang diupload hanya dapat dalam bentuk zipper (.zip). Selanjutnya lengkapi formulir isi judul da deskripsi tugas. Kirim formulir dengan menekan tombol "Submit".

Pada halaman beranda terdapat daftar tugas yang sudah ditambahkan. Pengguna dapat melakukan reservasi tugas dengan menekan tombol "Booking" pada tugas yang ingin direservasi, pembatalan reservasi juga dapat dilakukan dengan menekan tombol "Cancel". Tugas yang telah ditambahkan dapat dihapus dengan menekan tombol "Delete".

Pengguna dapat melakukan logout dengan menekan tombol "Log Out" pada sidebar.


License & Credit
=========================
* Kartika Ananda Putri
* Tailwind Admin untuk template dapat diakses https://tailwindadmin.netlify.app/
