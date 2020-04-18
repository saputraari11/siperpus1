<?php
include '../koneksi.php';

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
            <h1><i class="fas fa-plus"></i>Add Picture</h1>
        </div>
        <div class="content d-flex justify-content-center p-5" >
           
            <label for="file" class="h-content text-white"><i class="fas fa-images fa-3x" id="label-tb"></i></label>
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
                    <form method="post" action="prosestambah.php" enctype="multipart/form-data">

                        <div class="form-group d-flex justify-content-center mb-5">
                            <img src="foto/buku.png" alt="" width="200px" class="img-tb" id="im">
                            <button type="button" class="btn btn-outline-secondary tb" id="fa"><i class="fas fa-camera"></i></button>                       
                         </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Judul</label>
                            <input type="text" class="form-control tb judul" id="exampleFormControlInput1" placeholder="Example : Don Quixote oleh Miguel de Cervantes." required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Penerbit</label>
                            <input type="text"class="form-control tb penerbit" id="exampleFormControlInput1" placeholder="Example : Gramedia Widiasarana Indonesia" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Pengarang</label>
                            <input type="text" class="form-control tb pengarang" id="exampleFormControlInput1" placeholder="Example : Pramoedya Ananta Toer" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Ringkasan</label>
                            <textarea class="form-control tb ringkasan"  id="exampleFormControlTextarea1" rows="3" placeholder="Example : Harimau yang lapar bertemu dengan kancil, namun kancil yang cerdik meyakinkan harimau bahwa tubuhnya yang kecil tidak akan membuat harimau kenyang, maka kancil berniat untuk makan terlebih dahulu agar tubuhnya menjadi gemuk, tetapi harimau tidak boleh melihat karna kancil akan gugup dan membuatnya tak nyaman saat makan." required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Stok</label>
                            <input type="number"  class="form-control tb stok" id="exampleFormControlInput1 " placeholder="Example : 100" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Katagori</label>
                            <select class="form-control tb katagori" id="exampleFormControlSelect1" required>
                                <option value="">Choose..</option>
                                <?php foreach ($buku as $b) : ?>
                                    <option value="<?= $b['id_katagori'] ?>"><?= $b["katagori"] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                                       <div class="form-group d-flex justify-content-start ">
                                       <a href="index.php"><button type="button" class="btn btn-success"> <i class="fas fa-angle-double-left"></i>kembali</button></a>
         
                            <button type="button" class="btn btn-primary ml-2 tb" id="simpan">Simpan</button></div>

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