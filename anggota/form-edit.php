<?php
include '../koneksi.php';
include '../asset/header.php';
$id=$_GET["id"];

$query=mysqli_query($connect,"SELECT * FROM anggota where id_anggota='$id'");
$s=mysqli_fetch_assoc($query);
$i = 1;
$x = 1;
?>

<div class="container">
    <div class="row mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Peminjaman</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="proses-edit.php">
                    <div class="form-group">
                            <input type="text" value="<?= $id; ?>" name="id"class="form-control" hidden>
                        </div>
                        <div class="form-group">
                            <label for="anggota">Nama Anggota</label>
                            <input type="text" name="nama"value="<?= $s['nama'] ?>" class="form-control">
                        </div>
                        <div class="form-group">
                        <div class="input-group mb-3">
								<div class="input-group-prepend">
									<label class="input-group-text" for="inputGroupSelect01">kelas</label>
								</div>
								<select class="custom-select" id="inputGroupSelect01"name="kelas">
									<option value="<?= $s['kelas'] ?>" selected><?= $s['kelas'] ?></option>
									<?php for ($i; $i < 8; $i++) { 
                                        $p=explode('L',$s["kelas"]);
                                        $angka=end($p);
                                        if($angka != $i){ 
                                        ?>
										<option value="<?= 'XRPL' . $i; ?>"><?= 'XRPL' . $i; ?></option>
                                        <?php }} ?>
                                    <?php for ($x; $x < 7; $x++) { 
                                         $p=explode('J',$s["kelas"]);
                                         $angka=end($p);
                                         if($angka != $x){ 
                                        ?>
										<option value="<?= 'XTKJ' . $x; ?>"><?= 'XTKJ' . $x; ?></option>
									<?php }} ?>
								</select>
                          
                        </div>
                        <div class="form-group">
                            <label for="datepicker">Telp</label>
                            <input type="text" name="telp" value="<?= $s['telp'] ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="datepicker">Username</label>
                            <input type="text" name="username" value="<?= $s['username'] ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="datepicker">Password</label>
                            <input type="password" name="password" value="<?= $s['password'] ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <button type="submit" name="btnPinjam" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include '../asset/footer.php';
?>