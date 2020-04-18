<?php 
include '../koneksi.php';
$id=$_GET["id"];
$query=mysqli_query($connect,"DELETE FROM anggota where id_anggota='$id'");
if(isset($query)){
    header("location: index.php");
    exit;
}
else{
    header("location : index.php");
    exit;
}
?>