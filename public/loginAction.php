<?php
// File ini merupakan tindakan untuk melakukan authentication user
session_start();
include 'config.php';

if(isset($_POST['submit'])){ // Memastikan jika tombol submit di tekan
    // Mendeklarasikan variabel yang dikirim dari form login.php
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Perintah untuk mengambil data jika username dan passwordnya sama
    $result = $db->querySingle("SELECT * FROM user WHERE username='$username' AND password='$password'");
    if ($result == 1) { // Memastikan jika datanya ada
        $_SESSION['status']="login"; // Set seession status menjadi login
        header('location: index.php'); // Mengarahkan halaman ke index.php
    }else{
        // jika data tidak ada munculkan alert
        $message = "The username and password you entered did not match our records. Please double-check and try again.";
        echo "<script type='text/javascript'>alert('$message');
        window.location.href='http://localhost/TaskManagement/public/login.php';
        </script>";
    }
}
?>