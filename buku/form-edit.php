<?php
include '../koneksi.php';
$id = $_GET["id"];
$query = mysqli_query($connect, "SELECT * FROM buku where id_buku='$id'");
$b = mysqli_fetch_assoc($query);

$sql = "SELECT * FROM katagori";

$res = mysqli_query($connect, $sql);

$buku = array();

while ($data = mysqli_fetch_assoc($res)) {
    $buku[] = $data;
}
?>
<?php
include '../asset/header.php';
?>




<div class="modul" id="modul">
    <div id="modul-content">
        <div class="modul-header d-flex justify-content">
            <h1><i class="fas fa-edit"></i>Cover Profil</h1>
        </div>
        <div class="content d-flex justify-content-center p-5">
            <label for="trash" class="t-content text-white mr-5"><i class="fas fa-trash fa-3x" id="label-tb"></i></label>
            <input type="button" id="trash" hidden />
            <label for="file" class="h-content text-white ml-5"><i class="fas fa-images fa-3x" id="label-tb"></i></label>
            <input type="file" name="file" id="file" hidden />
        </div>
        <div class="modul-footer d-flex justify-content-end">
            <button type="button" class="btn btn-danger clos">Close</button>
            <button type="button" class="btn btn-primary ml-2  mr-3 " id="btn">Simpan</button>
        </div>
    </div>
</div>

<div class="container">
    <div class="row mt-4">
        <div class="col-md">


            <div class="card">
                <div class="card-header">
                    <h2 class="card-title"><i class="fas fa-book"></i> Add Book</h2>
                </div>
                <div class="card-body">
                    <form method="post" action="prosesedit.php" enctype="multipart/form-data">
                        <div class="form-group d-flex justify-content-center mb-5">
                            <img src="foto/<?= $b['cover']; ?>" alt="" width="200px" class="img-tb" id="im">
                            <button type="button" class="btn btn-outline-secondary tb" id="fotoedit"><i class="fas fa-camera"></i></button>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control tb id_buku" value="<?= $b['id_buku']; ?>" id="exampleFormControlInput1" hidden>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Judul</label>
                            <input type="text" class="form-control tb judul" value="<?= $b['judul']; ?>" id="exampleFormControlInput1">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Penerbit</label>
                            <input type="text" class="form-control tb penerbit" value="<?= $b['penerbit']; ?>" id="exampleFormControlInput1">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Pengarang</label>
                            <input type="text" class="form-control tb pengarang" value="<?= $b['pengarang']; ?>" id="exampleFormControlInput1">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Ringkasan</label>
                            <textarea class="form-control tb ringkasan" value="<?= $b['ringkasan']; ?>" id="exampleFormControlTextarea1" rows="1"><?= $b['ringkasan']; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Stok</label>
                            <input type="number" class="form-control tb stok" value="<?= $b['stok']; ?>" id="exampleFormControlInput1 " required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Katagori</label>
                            <select class="form-control tb katagori" id="exampleFormControlSelect1">
                                <option value="">Choose..</option>
                                <?php foreach ($buku as $b) : ?>
                                    <option value="<?= $b['id_katagori'] ?>"><?= $b["katagori"] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group d-flex justify-content-start ">
                            <a href="index.php"><button type="button" class="btn btn-success"> <i class="fas fa-angle-double-left"></i>kembali</button></a>

                            <button type="button" class="btn btn-primary ml-2 tb" id="simpanedit">Simpan</button></div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<script src="foto.js"></script>
</div>


<?php
include '../asset/footer.php';
?>