<?php 
	include "../include/koneksi.php";
	$module=@$_GET['module'];
	$act=@$_GET['act'];

	// delete data dalam database
	if ($module=='bukutamu' AND $act=='hapus') {
		mysqli_query($koneksi,"delete from bukutamu where id_bktamu='$_GET[id]' ");
		header('location:server.php?module=bukutamu');
	}

	//input buku tamu
	elseif ($module=='bukutamu' AND $act=='input') {
		
		$status_bktamu = $_POST['status_bktamu'];
        $nama_bktamu = $_POST['nama_bktamu'];
        $email_bktamu = $_POST['email_bktamu'];
        $alamat_bktamu = $_POST['alamat_bktamu'];
        $tgl_bktamu = $_POST['tgl_bktamu'];
        $komentar = $_POST['komentar'];

		$data = mysqli_query($koneksi, "insert into bukutamu values ('', '$status_bktamu', '$nama_bktamu', '$email_bktamu', '$alamat_bktamu', '$tgl_bktamu', '$komentar') ");
		echo "<script>window.location='server.php?module=bukutamu';</script>";
		
	}

	//update bukutamu
	elseif ($module=='bukutamu' AND $act=='update') {

		$id_bktamu = $_POST['id_bktamu'];
		$status_bktamu = $_POST['status_bktamu'];
		$nama_bktamu = $_POST['nama_bktamu'];
		$email_bktamu = $_POST['email_bktamu'];
		$alamat_bktamu = $_POST['alamat_bktamu'];
		$tgl_bktamu = $_POST['tgl_bktamu'];
		$komentar = $_POST['komentar'];

		mysqli_query($koneksi, "UPDATE bukutamu SET status_bktamu = '$status_bktamu', nama_bktamu = '$nama_bktamu', email_bktamu = '$email_bktamu', alamat_bktamu = '$alamat_bktamu', tgl_bktamu = '$tgl_bktamu', komentar = '$komentar' WHERE id_bktamu = '$id_bktamu' ");

		echo "<script>window.location='server.php?module=bukutamu';</script>";
		
	}



 ?>