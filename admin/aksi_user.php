<?php 
	include "../include/koneksi.php";
	$module=@$_GET['module'];
	$act=@$_GET['act'];

	// delete data dalam database
	if ($module=='user' AND $act=='hapus') {
		mysqli_query($koneksi,"delete from admin where id_user='$_GET[id]' ");
		header('location:server.php?module=user');
	}

	
	//input data user
	elseif ($module=='user' AND $act=='input') {
		
		$id_user = $_POST['id_user'];
		$password = $_POST['password'];

		$data = mysqli_query($koneksi, "insert into admin values ('$id_user', '$password') ");

		if ($data > 0) {
			echo "<script>window.location='server.php?module=user';</script>";
		} else {
			echo "<script>window.location='server.php?module=user&act=tambahuser';</script>";
		}
	}

	//update user
	elseif ($module=='user' AND $act=='update') {
		if (empty($_POST['id_user'])) {
			print "<script>alert(\"username tidak boleh kosong!!!\");
			location.href = \"javascript:history.go(-1)\";</script>";
		}
		else{
			//apabila password tidak dirubah
			if (empty($_POST['password'])) {
				mysqli_query($koneksi,"update admin set id_user='$_POST[id_user]' WHERE id_user='$_POST[id]'");
			}

			//apabila password dirubah
			else{ 
				$pass=$_POST['password']; 
				mysqli_query($koneksi,"update admin set id_user='$_POST[id_user]', 
				password='$pass' where id_user='$_POST[id]'"); 
			} 
			header('location:server.php?module=user');
		}
	}


	//Ganti Password
	elseif ($module=='user' and $act=='gantipwd') {
		$set=true;
		$msg="";

		$id = $_POST['id'];
		$lama = $_POST['pwd_lama1'];
		$lama2 = $_POST['pwd_lama2'];
		$baru = $_POST['pwd_baru1'];
		$baru2 = $_POST['pwd_baru2'];
		$baru_banget = $baru;
		if ($lama == $lama2) {
			if ($baru == $baru2) {
				if ($set) {
					mysqli_query($koneksi,"update admin set password='$baru_banget' where id_user='$id'");
					$msg = $msg.'Ganti Password Sukses..';
					print "<meta http-equiv=\"refresh\"content=\"1;URL=server.php?module=home\">";
				}
				else{
					$set = false;
					$msg = $msg.'Password Baru Tidak Sama..!!';
				}
			}
			else{
				$set = false;
				$msg = $msg.'Password Lama Tidak Sama..!!';
			}
		}
		else{
			echo "$msg";
			print "<br><br><a href = \"javascript:history.go(-1)\">Back</a>";
		}

	}

    
 ?>	