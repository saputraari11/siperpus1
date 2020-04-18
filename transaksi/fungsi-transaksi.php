<?php
function ambilBuku($connect)
{
	$sql = "SELECT id_buku, judul FROM buku";
	$res = mysqli_query($connect, $sql);

	$data_buku = array();

	while ($data = mysqli_fetch_assoc($res)) {
		$data_buku[] = $data;
	}
	return $data_buku;
}
?>

<?php
function ambilAnggota($connect)
{
	$sql = "SELECT id_anggota, nama FROM anggota";
	$res = mysqli_query($connect, $sql);

	$data_anggota = array();

	while ($data = mysqli_fetch_assoc($res)) {
		$data_anggota[] = $data;
	}
	return $data_anggota;
}
?>

<?php
function ambilPeminjaman($connect, $id_pinjam)
{
	$sql = "SELECT * FROM peminjaman p INNER JOIN anggota a ON p.id_anggota=a.id_anggota INNER JOIN detail_pinjam dp USING(id_pinjam) INNER JOIN buku b ON dp.id_buku=b.id_buku where id_pinjam='$id_pinjam'";
	$res = mysqli_query($connect, $sql);
	$data = mysqli_fetch_assoc($res);

	return $data;
}
?>

<?php
function ambilStok($connect, $id_buku)
{
	$sql = "SELECT stok FROM buku WHERE id_buku=$id_buku";
	$res = mysqli_query($connect, $sql);

	$data = mysqli_fetch_assoc($res);
	return $data['stok'];
}
?>

<?php
function cekPinjam($connect, $id_anggota)
{
	$sql = "SELECT * FROM peminjaman inner join detail_pinjam using(id_pinjam)  WHERE id_anggota=$id_anggota AND status='Dipinjam'";
	$res = mysqli_query($connect, $sql);

	$pinjam = mysqli_affected_rows($connect);

	if ($pinjam == 0) {
		return true;
	} else {
		return false;
	}
}
?>

<?php
function updateStok($connect, $id_buku, $stok_update)
{
	$sql = "UPDATE buku SET stok=$stok_update WHERE id_buku=$id_buku";
	$res = mysqli_query($connect, $sql);
}
?>

<?php
function prosesdenda($denda)
{
	$denda = round($denda);
	$denda = number_format($denda);
	$denda2 = round($denda);
	$denda1 = $denda2;
	if (explode(',', $denda) >= 500) {
		$denda1 += 1;
		$denda1 .= '000';
		return $denda1;
	} elseif (explode(',', $denda) < 500) {
		$denda1 -= 1;
		$denda1 .= '000';
		return $denda1;
	}
}
?>
<?php
function hitungDenda($connect, $id_pinjam, $tgl_kembali)
{
	$denda = 0;

	$sql = "SELECT tgl_pinjam_tempo FROM peminjaman WHERE id_pinjam=$id_pinjam";
	$res = mysqli_query($connect, $sql);

	$data = mysqli_fetch_assoc($res);
	$tgl_jatuh_tempo = $data['tgl_pinjam_tempo'];
	if ($tgl_kembali == null) {
		return '0';
	}
	$hari_denda = (strtotime($tgl_kembali) - strtotime($tgl_jatuh_tempo)) / 60 / 60 / 24;
	if ($hari_denda < 0) {
		return '0';
	}

	if ($hari_denda >= 1) {
		$denda = $hari_denda * 1000;
	}

	return prosesdenda($denda);
}
?>