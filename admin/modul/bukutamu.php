<?php 
switch (@$_GET['act']) {
	//tampil bukutamu
	default:
	echo "<h2>Buku Tamu</h2>
	<form method=post action='?module=bukutamu&act=tambahbukutamu'>
		<input class='btn btn-info' type=submit value='Tambah Buku Tamu'>
	</form>
	<table class='table'>
		<tr>
			<th>No</th>
			<th>Status</th>
			<th>Id</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Alamat</th>
			<th>Tanggal</th>
			<th>Komentar</th>
			<th>Aksi</th>
		<tr>
	";
	$tampil = mysqli_query($koneksi, "select * from bukutamu order by id_bktamu");
	$no = 1;
	while ($r=mysqli_fetch_array($tampil)){
		echo "<tr>
				<td>$no</td>
				<td>$r[id_bktamu]</td>
				<td>$r[status_bktamu]</td>
				<td>$r[nama_bktamu]</td>
				<td>$r[email_bktamu]</td>
				<td>$r[alamat_bktamu]</td>
				<td>$r[tgl_bktamu]</td>
				<td>$r[komentar]</td>
				<td><a href=?module=bukutamu&act=editbukutamu&id_bktamu=$r[id_bktamu]>Edit</a> | 
					<a href=\"aksi_bukutamu.php?module=bukutamu&act=hapus&id=$r[id_bktamu]\" onClick=\"return confirm('apakah anda benar akan menghapus user $r[id_bktamu]?')\">Hapus</a></td>
			  </tr>";
			$no++;
	}
	echo "</table>";
	break;

	//tambah user
	case "tambahbukutamu":
		echo "<h2>Tambah Buku Tamu</h2>
		<div class='col-md-5'>
		<form method=post action='aksi_bukutamu.php?module=bukutamu&act=input'>
		<table class='table'>
		<tr>
			<td>Status:</td>
			<td><input class='form-control' type=text name=status_bktamu></td>
		</tr>
		<tr>
			<td>Nama:</td>
			<td><input class='form-control' type=text name=nama_bktamu></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><input class='form-control' type=text name=email_bktamu></td>
		</tr>
		<tr>
			<td>Alamat:</td>
			<td><input class='form-control' type=text name=alamat_bktamu></td>
		</tr>
		<tr>
			<td>Tanggal:</td>
			<td><input class='form-control' type=date name=tgl_bktamu></td>
		</tr>
		<tr>
			<td>Komentar:</td>
			<td><textarea class='form-control' type=text name=komentar></textarea></td>
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
		case "editbukutamu":
		$edit=mysqli_query($koneksi, "select * from bukutamu where id_bktamu='$_GET[id_bktamu]'");
		$r=mysqli_fetch_array($edit);
		echo "<h2>Edit Buku Tamu</h2>
		<div class='col-md-4'>
		<form method=post action='aksi_bukutamu.php?module=user&act=update'>
			<input type=hidden name=id value='$r[id_bktamu]'>
			<table class='table'>				
				<tr>
					<td>Status:</td>
					<td><input class='form-control' type=text name=status_bktamu value='$r[status_bktamu]'></td>
				</tr>
				<tr>
					<td>Nama:</td>
					<td><input class='form-control' type=text name=nama_bktamu value='$r[nama_bktamu]'></td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><input class='form-control' type=text name=email_bktamu value='$r[email_bktamu]'></td>
				</tr>
				<tr>
					<td>Alamat:</td>
					<td><input class='form-control' type=text name=alamat_bktamu value='$r[alamat_bktamu]'></td>
				</tr>
				<tr>
					<td>Tanggal:</td>
					<td><input class='form-control' type=date name=tgl_bktamu value='$r[tgl_bktamu]'></td>
				</tr>
				<tr>
					<td>Komentar:</td>
					<td><textarea class='form-control' type=text name=komentar value='$r[komentar]'></textarea></td>
				</tr>
				<tr>
					<td colspan=2>
						<input class='btn btn-info' type=submit value=Simpan>
						<input class='btn btn-warning' type=button value=Batal onClick=self.history.back()>
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
			$edit = mysqli_query($koneksi, "select * from galeri where id_user='$_GET[id]'");
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