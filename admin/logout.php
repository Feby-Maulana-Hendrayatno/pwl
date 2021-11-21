
<?php
	// (error_reporting(0);
    session_start();
	include "../include/koneksi.php";
    if(!isset($_SESSION['namauser'])) {
        echo "<script>alert('Login dahulu');</script>";
        echo "<script>window.location.replace('index.php');</script>";
    }
    session_destroy();

    echo "<script>alert('Berhasil Logout');</script>";
    echo "<script>window.location.replace('index.php');</script>";
    
?>