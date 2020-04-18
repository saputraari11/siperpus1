<?php 
include '../koneksi.php';

$sql = "SELECT * FROM buku ORDER BY judul";

$res = mysqli_query($connect, $sql);

$buku = array();

while ($data = mysqli_fetch_assoc($res)) {
	$buku[] = $data;
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
			    <h2 class="card-title"><i class="fas fa-book"></i> Data Buku <a href="tambahbuku.php"><button type="button" class="btn btn-outline-info"><i class="fas fa-plus"></i></button></a></h2>
			  </div>
			  <div class="card-body">
			  	<table class="table table-dark">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Judul</th>
				      <th scope="col">Pengarang</th>
				      <th scope="col">Aksi</th>
				    </tr>
				  </thead>
				  <?php  
				  	$no = 1;
				  	foreach ($buku as $b) {?>
				  	<tr>
				      <th scope="row"><?=$no?></th>
				      <td><?=$b['judul']?></td>
				      <td><?=$b['pengarang']?></td>
				      <td>
				      	<a href="detail.php?id=<?= $b['id_buku']?>" class="badge badge-success">Detail</a>
						<a href="hapus.php?id=<?= $b['id_buku']?>" class="badge badge-danger">Hapus</a>
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