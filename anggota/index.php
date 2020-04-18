 <?php 
include '../koneksi.php';

$sql = "SELECT * FROM anggota ORDER BY nama";

$res = mysqli_query($connect, $sql);

$anggota = array();

while ($data = mysqli_fetch_assoc($res)) {
	$anggota[] = $data;
}
?>
<?php 
include '../asset/header.php';
?>
<div class="container">
	<div class="row mt-4">
		<div class="col-md">
			<div class="card">
  			  <div class="card-header">
			    <h2 class="card-title"><i class="fas fa-user"></i> Data Anggota <a href="tambah.php"><button type="button" class="btn btn-outline-info"><i class="fas fa-plus"></i></button></a></h2>
			  </div>
			  <div class="card-body">
			  	<table class="table table-dark">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Nama</th>
				      <th scope="col">Kelas</th>
				      <th scope="col">Aksi</th>
				    </tr>
				  </thead>
				  <?php  
				  	$no = 1;
				  	foreach ($anggota as $a) {?>
				  	<tr>
				      <th scope="row"><?=$no?></th>
				      <td><?=$a['nama']?></td>
				      <td><?=$a['kelas']?></td>
				      <td>
				      	<a href="detaip.php?id=<?= $a['id_anggota'];?>" class="badge badge-success">Detail</a>
						<a href="hapus.php?id=<?= $a['id_anggota'];?>" class="badge badge-danger">Hapus</a>
				      </td>
				    </tr>
				    <?php
				    	$no++;
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
include '../asset/footer.php';
?>