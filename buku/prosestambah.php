<?php 

if(isset($_POST["attrr"])){
    $judul=$_POST["judul"];
    $penerbit=$_POST["penerbit"];
    $pengarang=$_POST["pengarang"];
    $ringkasa=$_POST["ringkasan"];
    $stok=$_POST["stok"];
    $katagori=$_POST["katagori"];
    include '../koneksi.php';
    
    $pecah=explode("/",$_POST["attrr"]);
$nama=end($pecah);
    $folder="foto/".$nama;
    if($nama == "buku.png"){
        $url="foto/".$nama;
        mysqli_query($connect,"INSERT INTO buku VALUES('','$judul','$penerbit','$pengarang','$ringkasa','$nama','$stok','$katagori')");
echo"tersimpan";
    }
    else{
        $eks=pathinfo($nama,PATHINFO_EXTENSION);
        $namabaru=uniqid().".".$eks;
        $url="foto/".$namabaru;
    $tmp=$_POST["tmp"];
    $pindah=rename($tmp,$url);
    mysqli_query($connect,"INSERT INTO buku VALUES('','$judul','$penerbit','$pengarang','$ringkasa','$namabaru','$stok','$katagori')");
    echo "tersimpan";}
 die;
}
$nama=$_FILES["file"]["name"];
$type=$_FILES["file"]["type"];
$tmp_name=$_FILES["file"]["tmp_name"];
$er=$_FILES["file"]["error"];
$size=$_FILES["file"]["size"];


if($er==4){
echo false;
}
if($size>100000){
echo false;
}
$tempat="../asset/img/".$nama;
$ekstensi=array("jpg","jpeg","png");

$eksfot=strtolower(pathinfo($tempat,PATHINFO_EXTENSION));
if(!in_array($eksfot,$ekstensi)){
    echo false;
}

move_uploaded_file($tmp_name,$tempat);
    echo $tempat;
?>