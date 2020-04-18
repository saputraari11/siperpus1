<?php
include '../asset/header.php';
$i = 1;
$x = 1;
?>
<div class="container">
	<div class="row mt-4">
		<div class="col-md-9">
			<div class="card">
				<div class="card-header">
					<h2><i class="fas fa-user-plus"></i> Tambah Data Anggota</h2>
				</div>
				<div class="card-body">
					<form method="post" action="proses-tambah.php">
						<div class="form-group">
							<label for="anggota">Nama Lengkap</label>
							<input type="text" class="form-control" name="nama" id="anggota" placeholder="Masukkan Nama Lengkap">
						</div>
						<div class="form-group">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<label class="input-group-text" for="inputGroupSelect01">kelas</label>
								</div>
								<select class="custom-select" id="inputGroupSelect01"name="kelas">
									<option selected>pilihan</option>
									<?php for ($i; $i < 8; $i++) { ?>
										<option value="<?= 'XRPL' . $i; ?>"><?= 'XRPL' . $i; ?></option>
									<?php } ?>
									<?php for ($x; $x < 7; $x++) { ?>
										<option value="<?= 'TKJ' . $x; ?>"><?= 'TKJ' . $x; ?></option>
									<?php } ?>
								</select>
							</div>
							
						
							<small class="form-text text-muted">Contoh:XRPL7</small>
						</div>
						<div class="form-group">
							<label for="telp">No.Telepon</label>
							<input type="text" class="form-control" name="telp" id="telp" placeholder="Masukkan No.Telepon">
							<small class="form-text text-muted">Contoh:111-222-3333</small>
						</div>
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Username">
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="text" class="form-control" name="password" id="password" placeholder="Masukkan Password">
						</div>
						<button type="submit" class="btn btn-primary" name="simpan"> Simpan </button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include '../asset/footer.php';
?>