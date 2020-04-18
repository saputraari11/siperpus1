<?php 
include 'koneksi.php';

$date=date("Y-m-d");
$siswa = "SELECT count(nama) as jml FROM anggota ";
$buku = "SELECT sum(stok) as jml FROM  buku ORDER BY judul";
$peminjaman = "SELECT count(id_pinjam) as jml FROM peminjaman where tgl_pinjam='$date'";
$siswa = mysqli_query($connect, $siswa);
$buku = mysqli_query($connect, $buku);
$peminjaman = mysqli_query($connect, $peminjaman);
$s=mysqli_fetch_assoc($siswa);
$b=mysqli_fetch_assoc($buku);
$p=mysqli_fetch_assoc($peminjaman);
include 'asset/header.php';
?>
<div class="container">
	<div class="row mt-4">
		<div class="col-md">
			<h2><i class="fas fa-chart-line mr-2"></i>Dashboard</h2>
			<hr class="bg-light">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 ">
			<div class="card bg-danger ml-5 " style="width: 18rem; margin-left:200px;">
  			<div class="card-body text-white">
    			<h5 class="card-title">Jumlah Buku</h5>
			    <p class="card-text" style="font-size: 60px"><?= $b["jml"];?></p>
			    <a href="http://localhost/siperpus/buku/index.php" class="text-white">Lebih detail >>> <i class="fas fa-angel-double-right"></i></a>
  			</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card bg-warning" style="width: 18rem;">
  			<div class="card-body text-white">
    			<h5 class="card-title">Jumlah Anggota</h5>
			    <p class="card-text" style="font-size: 60px"><?= $s["jml"];?></p>
			    <a href="http://localhost/siperpus/anggota/index.php" class="text-white">Lebih detail >>> <i class="fas fa-angel-double-right"></i></a>
  			</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card bg-info" style="width: 18rem;">
  			<div class="card-body text-white">
    			<h5 class="card-title">Jumlah Transaksi</h5>
			    <p class="card-text" style="font-size: 60px"><?= $p["jml"];?></p>
			    <a href="http://localhost/siperpus/transaksi/index.php" class="text-white">Lebih detail >>> <i class="fas fa-angel-double-right"></i></a>
  			</div>
			</div>
		</div>
	</div>
</div>
<?php 
include 'asset/footer.php';
?>