<?php
require 'functions.php';
if (isset($_POST['btn-simpan'])) {
    $nama     = $_POST['namamenu'];
    $harga = $_POST['harga'];
    $query = "INSERT INTO menu (namamenu,harga) values ('$nama','$harga')";

    $execute = bisa($conn, $query);
    if ($execute == 1) {
        $success = 'true';
        $title = 'Berhasil';
        $message = 'Berhasil menambahkan menu baru';
        $type = 'success';
        header('location: barang.php?crud=' . $success . '&msg=' . $message . '&type=' . $type . '&title=' . $title);
    } else {
        echo "Gagal Tambah Data";
    }
}
require 'header.php';
?>
<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row  justify-content-center">
                <div class="col-lg-7 ">
                    <div class="p-5 ">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Tambah Barang</h1>
                        </div>
                        <form class="user" method="post" action="">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label>Nama Barang</label>
                                    <input type="text" name="namamenu" class="form-control form-control-user" placeholder="Nama Menu">
                                </div>
                                <div class=" col-sm-6">
                                    <label>Harga</label>
                                    <input type="text" name="harga" class="form-control form-control-user" placeholder="Harga">
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="reset" class="btn btn-dark"><i class="fas fa-fw fa-retweet"></i> Reset</button>
                                <button type="submit" name="btn-simpan" class="btn btn-success"><i class="fas fa-fw fa-save"></i> Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php
require 'footer.php';
?>