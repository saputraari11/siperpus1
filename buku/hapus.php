<?php 
include '../koneksi.php';
$id=$_GET["id"];
$query=mysqli_query($connect,"SELECT cover FROM buku where id_buku=$id");
$cover=mysqli_fetch_assoc($query);
if($cover["cover"] != 'buku.png'){
    unlink('foto/'.$cover["cover"]);
}
$query=mysqli_query($connect,"DELETE FROM buku where id_buku=$id");
$count=mysqli_affected_rows($connect);
if(isset($count)==1){
    header("Location:index.php");
}
else{
    header("location : index.php");
}
?>