<?php 
	$server = "localhost";
	$username = "root";
	$password = "";
	$db_name = "coba_db";

	//koneksi dan pilih database di server
	$koneksi=mysqli_connect($server,$username,$password) 
	or die(mysqli_error());
	
	$database=mysqli_select_db($koneksi,$db_name) 
	or die("database tidak ditemukan");
?>