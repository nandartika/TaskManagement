<?php
// File ini merupakan tindakan untuk mengirim data dari formulit tugas ke database

include 'config.php';

if(isset($_POST['kirim'])){ // Jika variabel "kirim" tersedia
    foreach ($_POST['title'] as $key => $value) { // Looping untuk setiap variabel "title"
        // Mendekrasi varibel dengan value yang dikirim dari forms.php
        $fileName = $_POST['file'][$key];
        $taskTitle = $_POST['title'][$key];
        $description = $_POST['description'][$key];
        $filePath = $_POST['file-path'][$key];

        // Perintah untuk memasukan data ke database, lalu perintah tersebut dieksekusi
        $sql = "INSERT INTO tasks (file_name, file_path, title, description, status) VALUES ('".$fileName."', '".$filePath."', '".$taskTitle."', '".$description."', '1')";
        $db->exec($sql);
    }

    // mengarahkan ke halaman awal (index.php)
    header("Location: http://localhost/TaskManagement/public");
    die();
}
?>