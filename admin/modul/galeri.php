<?php 

switch (@$_GET['act']) {
	//tampil galeri
	default:
	echo "<h2>Galeri</h2>
	<form method='post' action='server.php?module=galeri&act=tambahgaleri'>
	<input class='btn btn-info' type='submit' value='Tambah Galeri'>
	</form>
	<table class='table' border='0'>
	<tr>
	<th>No</th>
	<th>Nama Galeri</th>
	<th>Keterangan</th>
	<th>Tanggal</th>
	<th>Gambar</th>
	<th>Aksi</th>
	</tr>";
	$tampil=mysqli_query($koneksi,"select * from galeri order by id_galeri");
	$no=1;
	while ($r=mysqli_fetch_array($tampil)) {
		echo "<tr>
		<td>$no</td>
		<td>$r[nm_galeri]</td>
		<td>$r[ket]</td>
		<td>$r[tgl_galeri]</td>
		<td><img src='galeri/$r[gambar]' width='50'></td>
		<td><a href=?module=galeri&act=editgaleri&id_galeri=$r[id_galeri]>Edit</a> | 
		<a href=\"aksi.php?module=galeri&act=hapus&id=$r[id_galeri]\" onClick=\"return confirm('apakah anda benar akan menghapus galeri $r[id_galeri]?')\">Hapus</a>
		</td>
		</tr>";
		$no++;
	}

	echo "</table>";
	break;

	//tambah galeri
	case "tambahgaleri":
	?>
	<h2>Tambah galeri</h2>
	<form name='form1' method='post'
	action='aksi.php?module=galeri&act=input' enctype='multipart/form-data'>
	<table>
		<tr>
			<td>Album:</td>
			<td>
				<select class='form-control' id='id_album' name='id_album'> 
					<option value=''>- Pilih -</option>
					<?php
					$data = mysqli_query($koneksi, 'SELECT * FROM album ORDER BY nm_album DESC');
					while ($query = mysqli_fetch_array($data)) {
						?>
						<option value='<?php echo $query['id_album'] ?>'>
							<?php echo $query['nm_album'] ?>
						</option>
						<?php
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Nama Galeri:</td>
			<td><input class='form-control' name='nm_galeri' type='text' size='35' /></td>
		</tr>
		<tr>
			<td>Keterangan:</td>
			<td><textarea class='form-control' name='ket' cols='35' rows='4'></textarea></td>
		</tr>
		<tr>
			<td>File Gambar:</td>
			<td><input class='btn btn-success' name='gam' type='file' size='30' /></td>
		</tr>
		<tr>
			<td colspan='2'>
				<input class='btn btn-info' type='submit' value='Simpan'>
				<input class='btn btn-warning' type='button' value='Batal' onClick='self.history.back()'>
			</td>
		</tr>
	</table>
</form>

<?php
break;



	//edit galeri
case "editgaleri":

?>
<?php
$id_galeri = $_GET['id_galeri'];
$edit = mysqli_query($koneksi, "SELECT * FROM galeri LEFT JOIN album ON galeri.id_album = album.id_album WHERE id_galeri = '$id_galeri' ");
$r = mysqli_fetch_array($edit);

?>
<h2>Edit galeri</h2>
<form name='form1' method='post'
action='aksi.php?module=galeri&act=update' enctype='multipart/form-data'>
<input type='hidden' name='id_galeri' value='<?php echo $r['id_galeri'] ?>'>

<table>
	<tr>
		<td>Album:</td>
		<td>
			<select class="form-control" id="nama_album" name="id_album">
				<option value="">- Pilih -</option>
				<?php
				$query = mysqli_query($koneksi, "SELECT * FROM album ORDER BY nm_album DESC");
				while ($data = $query->fetch_array()) {
					?>
					<?php $edit_status = $r['id_album']; ?>
					<?php if ($edit_status == $data['id_album']) : ?>
						<option value="<?php echo $data['id_album'] ?>" selected>
							<?php echo $data['nm_album'] ?>
						</option>
						<?php else : ?>
							<option value="<?php echo $data['id_album'] ?>">
								<?php echo $data['nm_album'] ?>
							</option>
						<?php endif ?>
						<?php
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Nama Galeri:</td>
			<td><input class='form-control' name='nm_galeri' type='text' size='35' value="<?php echo $r['nm_galeri'] ?>"></td>
		</tr>
		<tr>
			<td>Keterangan:</td>
			<td><textarea class='form-control' name='ket' cols='35' rows='4'><?php echo $r['ket'] ?></textarea></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>Gambar</td>
			<td>
				<img src="galeri/<?php echo $r['gambar'] ?>" width="300">
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>File Gambar:</td>
			<td><input class='btn btn-success' name='gam_baru' type='file' size='30' /></td>
		</tr>
		<tr>
			<td colspan='2'>
				<input class='btn btn-info' type='submit' value='Simpan'>
				<input class='btn btn-warning' type='button' value='Batal' onClick='self.history.back()'>
			</td>
		</tr>
	</table>
</form>

<?php
break;
}
?>