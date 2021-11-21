<?php 
switch (@$_GET['act']) {
			
	//tampil user
	default:
	echo "<h2>Album Photo</h2>
	<form method=post action='?module=album&act=tambahalbum'>
		<input class='btn btn-info' type=submit value='Tambah Album'>
	</form>
	<table class='table'>
		<tr>
			<th>No</th>
			<th>Nama Album</th>
			<th>Status</th>
			<th>Aksi</th>
		<tr>
	";
	$tampil = mysqli_query($koneksi,"select * from album order by nm_album");
	$no = 1;
	while ($r=mysqli_fetch_array($tampil)){
		echo "<tr>
				<td>$no</td>
				<td>$r[nm_album]</td>
				<td>$r[status]</td>
				<td><a href=?module=album&act=editalbum&id=$r[id_album]>Edit</a> | 
					<a href=\"aksi.php?module=album&act=hapus&id=$r[id_album]\" onClick=\"return confirm('apakah anda benar akan menghapus Album $r[nm_album]?')\">Hapus</a></td>
			  </tr>";
			$no++;
	}
	echo "</table>";
	break;

	//tambah album
	case "tambahalbum":
		echo "<h2>Tambah Album</h2>
		<div class='col-md-4'>
		<form method='post' action='aksi.php?module=album&act=input'>
		<table class='table'>
		<tr>
			<td>Nama Album:</td>
			<td><input class='form-control' type='text' name='nm_album'></td>
		</tr>
		<tr>
		<td>Status:</td>
		<td>
			<select class='form-control' id='status' name='status' >
			<option value=''> - pilih -</option>
			<option value='1'>1</option> 
			<option value='0'>0</option>   
			</select>
		</td>
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

		//edit album
		case "editalbum":
		$edit=mysqli_query($koneksi,"select * from album where id_album='$_GET[id]'");
		$r=mysqli_fetch_array($edit);
		echo "<h2>Edit albumr</h2>
		<div class='col-md-4'>
		<form method=post action='aksi.php?module=album&act=update'>
			<input type=hidden name=id value='$r[id_album]'>
			<table class='table'>
				<tr>
					<td>Nama Album:</td>
					<td><input class='form-control' type=text name=nm_album value='$r[nm_album]'></td>
				</tr>
				<tr>
					<td>Status:</td>
					<td>
						<select class='form-control' id='status' name='status' >
						<option value=''> - pilih -</option>
						<option value='1'>1</option> 
						<option value='0'>0</option>   
						</select>
					</td>	
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
			$edit = mysqli_query($koneksi,"select * from admin where id_album='$_GET[id]'");
			$r = mysqli_fetch_array($edit);
			echo "<h2>Ganti Password</h2>
			<div class='col-md-5'>
			<form method=post action='aksi.php?module=user&act=gantipwd'>
				<input type=hidden name=id value='$r[id_album]'>
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