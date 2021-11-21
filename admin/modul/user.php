<?php 
switch (@$_GET['act']) {
	//tampil user
	default:
	echo "<h2>User</h2>
	<form method=post action='?module=user&act=tambahuser'>
		<input class='btn btn-info' type=submit value='Tambah User'>
	</form>
	<table class='table'>
		<tr>
			<th>No</th>
			<th>Username</th>
			<th>Password</th>
			<th>Aksi</th>
		<tr>
	";
	$tampil = mysqli_query($koneksi,"select * from admin order by id_user");
	$no = 1;
	while ($r=mysqli_fetch_array($tampil)){
		echo "<tr>
				<td>$no</td>
				<td>$r[id_user]</td>
				<td>$r[password]</td>
				<td><a href=?module=user&act=edituser&id=$r[id_user]>Edit</a> | 
					<a href=\"aksi_user.php?module=user&act=hapus&id=$r[id_user]\" onClick=\"return confirm('apakah anda benar akan menghapus user $r[id_user]?')\">Hapus</a></td>
			  </tr>";
			$no++;
	}
	echo "</table>";
	break;

	//tambah user
	case "tambahuser":
		echo "<h2>Tambah User</h2>
		<div class='col-md-4'>
		<form method=post action='aksi_user.php?module=user&act=input'>
		<table class='table'>
		<tr>
			<td>Username:</td>
			<td><input class='form-control' type=text name=id_user></td>
		</tr>
		<tr>
			<td>Password:</td>
			<td><input class='form-control' type=password name=password></td>
		</tr>
		<tr>
			<td colspan=2>
				<input class='btn btn-info' type=submit value=Simpan>
				<input class='btn btn-warning' type=button value=Batal onClick=self.history.back()>
			</td>
		</tr>
		</table>
		</form>
		</div>
		";
		break;

		//edit user
		case "edituser":
		$edit=mysqli_query($koneksi,"select * from admin where id_user='$_GET[id]'");
		$r=mysqli_fetch_array($edit);
		echo "<h2>Edit User</h2>
		<div class='col-md-4'>
		<form method=post action='aksi_user.php?module=user&act=update'>
			<input type=hidden name=id value='$r[id_user]'>
			<table class='table'>
				<tr>
					<td>Username:</td>
					<td><input class='form-control' type=text name=id_user value='$r[id_user]'></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input class='form-control' type=text name=password value='$r[password]'></td>
				</tr>
				<tr>
					<td colspan=2>
						<input class='btn btn-info' type=submit value='Update'>
						<input class='btn btn-warning' type=button value='Batal' onClick=self.history.back()>
					</td>
				</tr>
			</table>
		</form>
		</div>
		";
		break;

		//edit password
		case "gantipwd":
			$edit = mysqli_query($koneksi,"select * from admin where id_user='$_GET[id]'");
			$r = mysqli_fetch_array($edit);
			echo "<h2>Ganti Password</h2>
			<div class='col-md-5'>
			<form method=post action='aksi.php?module=user&act=gantipwd'>
				<input type=hidden name=id value='$r[id_user]'>
				<input type=hidden name=pwd_lama1 value='$r[password]'>
				<table class='table'>
					<tr>
						<td>Password Lama:</td>
						<td><input class='form-control' type=password name=pwd_lama2></td>
					</tr>
					<tr>
						<td>Password Baru:</td>
						<td><input class='form-control' type=password name=pwd_baru1></td>
					</tr>
					<tr>
						<td>Ulangi Password Baru:</td>
						<td><input class='form-control' type=password name=pwd_baru2></td>
					</tr>
					<tr>
						<td colspan=2>
							<input class='btn btn-info' type=submit value='Ganti Password'>
							<input class='btn btn-warning' type=button value=Batal onClick=self.history.back()>
						</td>
					</tr>
				</table>
			</form>
			</div>
			";
			break;
}
 ?>