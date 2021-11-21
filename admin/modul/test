<?php

switch ($_GET['act']) {
	case 'tambahbukutamu':
	?>
	<div class="row">
		<div class="col-md-12">
			<h2><i class="fa fa-plus"></i> Tambah Buku Tamu</h2>
		</div>

		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Tambah Data Buku Tamu
				</div>
				<div class="panel-body">
					<form method="POST" action="aksi_bukutamu.php?module=bukutamu&act=input">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="nama_bukutamu"> Nama Buku Tamu </label>
									<input type="text" class="form-control" id="nama_bukutamu" name="nama_bukutamu" placeholder="Masukkan Nama Buku Tamu">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="email_bukutamu"> Email </label>
									<input type="email" class="form-control" id="email_bukutamu" name="email_bukutamu" placeholder="Masukkan Email">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="tanggal_bukutamu"> Tanggal Buku Tamu</label>
									<input type="date" class="form-control" id="tanggal_bukutamu" name="tanggal_bukutamu">
								</div>
							</div>
							<div class="col-md-8">
								<div class="form-group">
									<label for="status_bukutamu"> Status </label>
									<input type="text" class="form-control" id="status_bukutamu" name="status_bukutamu" placeholder="Masukkan Status">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="alamat_bukutamu"> Alamat </label>
							<textarea class="form-control" id="alamat_bukutamu" name="alamat_bukutamu" placeholder="Masukkan Alamat" rows="5"></textarea>
						</div>
						<div class="form-group">
							<label for="komentar"> Komentar </label>
							<textarea class="form-control" id="komentar" name="komentar" placeholder="Masukkan Komentar" rows="5"></textarea>
						</div>
						<hr>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">
								<i class="fa fa-save"></i> Simpan
							</button>
							<input type="button" class="btn btn-danger" value="Batal" onclick="self.history.back()">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php
	break;

	case 'editbukutamu':
	?>

	<?php
	$id_bukutamu = $_GET['id_bukutamu'];
	$edit = mysqli_query($link, "SELECT * FROM tb_buku_tamu WHERE id_bukutamu = '$id_bukutamu' ");
	$r = mysqli_fetch_array($edit);

	?>
	<div class="row">
		<div class="col-md-12">
			<h2><i class="fa fa-pencil"></i> Edit Buku Tamu</h2>
		</div>

		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Data Edit Buku Tamu
				</div>
				<div class="panel-body">
					<form method="POST" action="aksi_bukutamu.php?module=bukutamu&act=update">
						<input type="hidden" name="id_bukutamu" value="<?php echo $r['id_bukutamu'] ?>">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="nama_bukutamu"> Nama Buku Tamu </label>
									<input type="text" class="form-control" id="nama_bukutamu" name="nama_bukutamu" placeholder="Masukkan Nama Buku Tamu" value="<?php echo $r['nama_bukutamu'] ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="email_bukutamu"> Email </label>
									<input type="email" class="form-control" id="email_bukutamu" name="email_bukutamu" placeholder="Masukkan Email" value="<?php echo $r['email_bukutamu'] ?>" readonly>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="tanggal_bukutamu"> Tanggal Buku Tamu</label>
									<input type="text" class="form-control" id="tanggal_bukutamu" name="tanggal_bukutamu" value="<?php echo $r['tanggal_bukutamu'] ?>">
								</div>
							</div>
							<div class="col-md-8">
								<div class="form-group">
									<label for="status_bukutamu"> Status </label>
									<input type="text" class="form-control" id="status_bukutamu" name="status_bukutamu" placeholder="Masukkan Status" value="<?php echo $r['status_bukutamu'] ?>">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="alamat"> Alamat </label>
							<textarea class="form-control" id="alamat" name="alamat_bukutamu" placeholder="Masukkan Alamat" rows="5"><?php echo $r['alamat_bukutamu'] ?></textarea>
						</div>
						<div class="form-group">
							<label for="komentar"> Komentar </label>
							<textarea class="form-control" id="komentar" name="komentar" placeholder="Masukkan Komentar" rows="5"><?php echo $r['komentar'] ?></textarea>
						</div>
						<hr>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">
								<i class="fa fa-save"></i> Simpan
							</button>
							<input type="button" class="btn btn-danger" value="Batal" onclick="self.history.back()">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php
	?>

	<?php
	break;

	default:
	?>
	<div class="row">
		<div class="col-md-12">
			<h2><i class="fa fa-book"></i> Data Buku Tamu</h2>
		</div>

		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a class="btn btn-primary btn-sm" href="?module=bukutamu&act=tambahbukutamu">
						<i class="fa fa-plus"></i> Tambah Data
					</a>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th class="text-center">No.</th>
									<th>Nama Buku Tamu</th>
									<th>Email</th>
									<th>Alamat</th>
									<th>Tanggal</th>
									<th class="text-center">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								$tampil = mysqli_query($link, "SELECT * FROM tb_buku_tamu ORDER BY id_bukutamu DESC");
								while ($r = mysqli_fetch_array($tampil)) {
									?>
									<tr>
										<td class="text-center"><?php echo $no++ ?>.</td>
										<td><?php echo $r['nama_bukutamu'] ?></td>
										<td><?php echo $r['email_bukutamu'] ?></td>
										<td><?php echo $r['alamat_bukutamu'] ?></td>
										<td><?php echo $r['tanggal_bukutamu'] ?></td>
										<td class="text-center">
											<a class="btn btn-warning btn-sm" href="?module=bukutamu&act=editbukutamu&id_bukutamu=<?php echo $r['id_bukutamu'] ?>">
												<i class="fa fa-pencil"></i> Edit
											</a> |
											<a class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Benar Akan Menghapus User <?php echo $r['nama_bukutamu'] ?> ? ')" href="aksi_bukutamu.php?module=bukutamu&act=hapus&id_bukutamu=<?php echo $r['id_bukutamu'] ?>">
												<i class="fa fa-trash-o"></i> Hapus
											</a>
										</td>
									</tr>
									<?php
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	break;
}	

?>