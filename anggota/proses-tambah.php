<?php  
include '../koneksi.php';
if(isset($_POST['simpan'])){
	$nama = $_POST['nama'];
	$kelas = $_POST['kelas'];
	$telp = $_POST['telp'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$id_level = 1;
	$sql = "INSERT INTO anggota(nama, kelas, telp, username, password, id_level) VALUES ('$nama', '$kelas', '$telp', '$username', '$password', '$id_level')";

	$res = mysqli_query($connect, $sql);
	$count = mysqli_affected_rows($connect);

	if($count==1){
		header("Location:index.php");
	}else{
		header("Location:tambah.php");
	}
}else{
	header("Location:tambah.php");
}
?>