<?php
// File ini merupakan tindakan untuk mengupdate status dari aksi yang dilakukan dari tabel to-do list dihalaman index.php
include 'config.php';

$id=$_GET['id'];
$status=$_GET['status'];

if($status != 3){ // Memastikan jika value dari variabel status bukan 3
    // Melakukan update status
    $query = $db->exec('UPDATE tasks SET status="'.$status.'" WHERE id_task="'.$id.'"');
    if ($query) {
        echo 'Number of rows modified: ', $db->changes();
    }
} else {
    // Melakukan soft delete, dengan memindahkan data dari tabel tasks ke tabel soft_delete
    $sql = "INSERT INTO soft_delete SELECT * FROM tasks WHERE id_task=".$id;
    if($db->exec($sql)){
        $query = $db->exec('DELETE FROM tasks WHERE id_task="'.$id.'"');
        if ($query) {
            echo 'Number of rows modified: ', $db->changes();
        }
    }
}

header("Location: http://localhost/TaskManagement/public");
die();
?>