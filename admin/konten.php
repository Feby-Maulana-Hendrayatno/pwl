<?php 
	include "../include/koneksi.php";
	include "../include/konversi_tgl.php";
	//bagian home admin
	if ($_GET['module']=='home') {
		echo "<h2>Halaman Utama</h2>
		<p class=welcome>Selamat Datang <b>$_SESSION[namauser]</b>,
		Silahkan klik menu pilihan disebelah kiri untuk mengelola konten website<br>
		Terima Kasih </p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p class=jam align=right>Login Hari Ini: ";
			echo tgl_indo(date("Ymd"));
			echo " | ";
			echo gmdate("H:i:s", time()+ 60*60*7);
			echo "</p>";
		}
	// bagian user
		elseif ($_GET['module']=='user') {
			include "modul/user.php";
		}
	// bagian galeri
		elseif ($_GET['module']=='galeri') {
			include "modul/galeri.php";
		}
	// bagian user
	elseif ($_GET['module']=='album') {
		include "modul/album.php";
	}
	// bagian user
		elseif ($_GET['module']=='bukutamu') {
			include "modul/bukutamu.php";
		}

	// Apabila modul tidak ditemukan
		else{
			echo "<p><b>MODUL BELUM ADA</b</p>";
		}
 ?>