<?php  
include '../asset/header.php';
include '../koneksi.php';
$id=$_GET["id"];
$query=mysqli_query($connect,"SELECT * FROM buku where id_buku='$id'");
$b=mysqli_fetch_assoc($query);
?>

<div class="container">
	<div class="row mt-4">
		<div class="col-md-7">
			<h2>Detail Buku</h2>
			<hr class="bg-ligth">
			<table class="table table-bordered">
            <tr>
					<td><strong>Cover</strong></td>
					<td><img src="foto/<?= $b['cover']?>" alt="" width="200px"></td>
                </tr>
                <tr>
					<td><strong>judul</strong></td>
					<td><?= $b['judul']?></td>
				</tr>
				<tr>
					<td><strong>Penerbit</strong></td>
					<td><?= $b['penerbit']?></td>
				</tr>
				<tr>
					<td><strong>Pengarang</strong></td>
					<td><?= $b['pengarang']?></td>
				</tr>
				<tr>
					<td><strong>Ringkasan</strong></td>
					<td><?= $b['ringkasan']?></td>
				</tr>
				<tr>
					<td><strong>Stok</strong></td>
					<td>
                    <?= $b['stok']?>
					</td>
				</tr>
				
				<tr>
					<td class="text-rigth" colspan="2">
                    <a href="index.php" class="btn btn-success"><i class="fas fa-angle-double-left"></i>Kembali</a>
						<a class="btn btn-primary" href="form-edit.php?id=<?= $b['id_buku']?>" role="button">Form Edit</a>
				
							</td>
				</tr>
			</table>
		</div>
	</div>
</div>

<?php  
include '../asset/footer.php';
?>