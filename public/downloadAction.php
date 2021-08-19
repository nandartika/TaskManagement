<?php
// File ini berfungsi untuk mendownload file lokal yang diperintahkan setelah meng-klik tombol "Download" pada halaman index.php

// Mendeklarasikan variabel
$dir="../uploadFiles/"; // Alamat file
$filename=$_GET['file']; // Value didapatkan dari url yang dikirimkan oleh index.php
$file_path=$dir.$filename;
$ctype="application/octet-stream";

// Mengambil berkas, jika berkas tidak tersedia akan muncul alert
if(!empty($file_path) && file_exists($file_path)){ //check keberadaan file
    header("Pragma:public");
    header("Expired:0");
    header("Cache-Control:must-revalidate");
    header("Content-Control:public");
    header("Content-Description: File Transfer");
    header("Content-Type: $ctype");
    header("Content-Disposition:attachment; filename=\"".basename($file_path)."\"");
    header("Content-Transfer-Encoding:binary");
    header("Content-Length:".filesize($file_path));
    flush();
    readfile($file_path);
    exit();
}else{
    $message = "The File does not exist.";
    echo "<script type='text/javascript'>alert('$message');
    window.location.href='http://localhost/TaskManagement/public';
    </script>";
}
?>