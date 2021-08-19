<?php
// File ini berfungsi untuk menghapus session ketika user logout

session_start();

if(isset($_SESSION['status'])){ // Memastikan jika session status ada
  	session_unset();
  	session_destroy();
  	header("location: login.php");
}	
?>