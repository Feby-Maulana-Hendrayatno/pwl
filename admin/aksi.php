<?php 
	include "../include/koneksi.php";
	$module=@$_GET['module'];
	$act=@$_GET['act'];

	// delete data dalam database
	if ($module=='album' AND $act=='hapus') {
		mysqli_query($koneksi,"delete from album where id_album='$_GET[id]' ");
		header('location:server.php?module=album');
	}

	//bagian album
	//input album
	elseif ($module=='album' AND $act=='input') {
		
		$nm_album = $_POST['nm_album'];
		$status = $_POST['status'];

		$data = mysqli_query($koneksi, "insert into album values ('', '$nm_album', '$status') ");

		if ($data > 0) {
			echo "<script>window.location='server.php?module=album';</script>";
		} else {
			echo "<script>window.location='server.php?module=album&act=tambahalbum';</script>";
		}
	}

	//update album
	elseif ($module=='album' AND $act=='update') {
		if (empty($_POST['nm_album'])) {
			print "<script>alert(\"album tidak boleh kosong!!!\");
			location.href = \"javascript:history.go(-1)\";</script>";
		}
		else{
			//apabila album tidak dirubah
			if (empty($_POST['status'])) {
				mysqli_query($koneksi,"update album set nm_album='$_POST[nm_album]' WHERE nm_album='$_POST[id]'");
			}

			//apabila status dirubah
			else{ 
				$nm_album=$_POST['nm_album']; 
				$status = $_POST['status'];

				mysqli_query($koneksi,"update album set nm_album='$nm_album', status = '$status' where id_album ='$_POST[id]'"); 
			} 
			header('location:server.php?module=album');
		}
	}


	//script tambahan diketik di paling bawah
	//BAGIAN GALERI
	//upload photo
	elseif ($module=='galeri' and $act=='input'){
		$set=true;
		$msg="";
		//tentukan variabel file yang diupload dan tipe file
		$tipe_file = $_FILES['gam']['type'];
		$lokasi_file = $_FILES['gam']['tmp_name'];
		$nama_file = $_FILES['gam']['name'];
		$save_file = move_uploaded_file($lokasi_file, "galeri/$nama_file");

		if (empty($lokasi_file)) {
			$set=false;
			$msg = $msg. 'Upload gagal, Anda Lupa Mengambil Gambar..';
		}
		else{
			//tentukan tipe file harus image
			if ($tipe_file != "image/gif" and
				$tipe_file != "image/jpeg" and
				$tipe_file != "image/jpg" and
				$tipe_file != "image/pjpeg" and 
				$tipe_file != "image/png") {
				
				$set = false;
				$msg = $msg. 'Upload gagal, tipe file harus image..';
			}
			else{
				isset($save_file);
			}

			//replace di server 
			if ($save_file) {
				chmod("galeri/$nama_file", 0777);
			}
			else{
				$msg = $msg.'Upload Image Gagal..';
				$set = false;
			}

		}
		if ($set) {
			$id_album = $_POST['id_album'];
			$nm_galeri = $_POST['nm_galeri'];
			$ket = $_POST['ket'];
			$tgl_galeri = date('d n Y');
			$sql = mysqli_query($koneksi,"insert into galeri(id_album, nm_galeri,ket,tgl_galeri,gambar) values('$id_album', '$nm_galeri','$ket','$tgl_galeri','$nama_file')");
			$msg = $msg.'Upload Galeri Sukses..';
			print "<meta http-equiv=\"refresh\"content=\"1;URL=server.php?module=galeri\">";
		}
		echo "$msg";
	}

		//Update galeri
		elseif ($module=='galeri' and $act=='update') {
			$set = true;
			$msg = "";

			//tentukan variabel file yg  diupload

			$tipe_file = $_FILES['gam_baru']['type'];
			$lokasi_file = $_FILES['gam_baru']['tmp_name'];
			$nama_file = $_FILES['gam_baru']['name'];
			$save_file = move_uploaded_file($lokasi_file,"galeri/$nama_file");

			if (empty($lokasi_file)) {
				isset($set);
			}
			else{

				//tentukan tipe file harus image
				if ($tipe_file != "image/gif" and
					$tipe_file != "image/jpeg" and
					$tipe_file != "image/jpg" and
					$tipe_file != "image/pjpeg" and 
					$tipe_file != "image/png")
				{
					$set = false;
					$msg = $msg.'Upload gagal, tipe file harus image..';
				}
				else
				{
					$unlink = mysqli_query($koneksi,"select * from galeri where id_galeri='$_POST[id]'");
					$CekLink=mysqli_fetch_array($unlink);
					if (!empty($CekLink['gambar'])) {
						unlink("galeri/$CekLink[gambar]");
					}
					isset($save_file);
				}

				//replace di server
				if ($save_file) {
					chmod("galeri/$nama_file", 0777);
				}
				else{
					$msg = $msg.'Upload Image Gagal..';
					$set = false;
				}
			}
			
			if ($set) {
				$id = $_POST['id'];
				$nm_galeri = $_POST['nm_gal'];
				$ket = $_POST['ket'];

			if (empty($lokasi_file)) {
				mysqli_query($koneksi,"update galeri set nm_galeri='$nm_galeri', ket='$ket' where id_galeri='$id' ");
			}
			else{
				mysqli_query($koneksi,"update galeri set nm_galeri='$nm_galeri', ket='$ket', gambar='$nama_file' where id_galeri='$id' ");
			}
			$msg = $msg.'Update Galeri Sukses..';
			print "<meta http-equiv=\"refresh\"content=\"1;URL=server.php?module=galeri\">";
		}
		echo "$msg";
	}	


	
	//hapus record galeri
	elseif ($module=='galeri' and $act=='hapus') 
	{
		$unlink=mysqli_query($koneksi,"select * from galeri where id_galeri='$_GET[id]'");
		$CekLink=mysqli_fetch_array($unlink);
		if (!empty($CekLink['gambar'])) 
		{
			unlink("galeri/$CekLink[gambar]");
		}
		mysqli_query($koneksi,"delete from galeri where id_galeri='$_GET[id]'");
		header('location:server.php?module=galeri');
	}

	

	//BAGIAN BUKU TAMU
	

 ?>